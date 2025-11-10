<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectService
{
    /**
     * Create a new project.
     *
     * @param array $data
     * @param int $userId
     * @return Project
     */
    public function createProject(array $data, int $userId): Project
    {
        DB::beginTransaction();

        try {
            // معالجة الملفات المرفقة
            $attachments = $this->handleAttachments($data['attachments'] ?? []);

            // إنشاء المشروع
            $project = Project::create([
                'user_id' => $userId,
                'title' => $data['title'],
                'description' => $data['description'],
                'budget_type' => $data['budget_type'],
                'budget_amount' => $data['budget_type'] === 'fixed' ? $data['budget_amount'] : null,
                'hourly_rate' => $data['budget_type'] === 'hourly' ? $data['hourly_rate'] : null,
                'duration' => $data['duration'],
                'skills' => $data['skills'],
                'attachments' => $attachments,
                'status' => $data['status'] ?? 'draft',
            ]);

            DB::commit();

            // تسجيل في السجل
            Log::info('Project created successfully', [
                'project_id' => $project->id,
                'user_id' => $userId
            ]);

            return $project;

        } catch (\Exception $e) {
            DB::rollBack();

            // حذف الملفات في حالة الفشل
            if (!empty($attachments)) {
                $this->deleteAttachments($attachments);
            }

            Log::error('Failed to create project', [
                'user_id' => $userId,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Update an existing project.
     *
     * @param Project $project
     * @param array $data
     * @return Project
     */
    public function updateProject(Project $project, array $data): Project
    {
        DB::beginTransaction();

        try {
            $oldAttachments = $project->attachments ?? [];

            // معالجة الملفات الجديدة
            $newAttachments = $this->handleAttachments($data['attachments'] ?? []);

            // دمج الملفات القديمة مع الجديدة
            $allAttachments = array_merge($oldAttachments, $newAttachments);

            // تحديث المشروع
            $project->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'budget_type' => $data['budget_type'],
                'budget_amount' => $data['budget_type'] === 'fixed' ? $data['budget_amount'] : null,
                'hourly_rate' => $data['budget_type'] === 'hourly' ? $data['hourly_rate'] : null,
                'weekly_hours' => $data['budget_type'] === 'hourly' ? $data['weekly_hours'] : null,
                'duration' => $data['duration'],
                'skills' => $data['skills'],
                'attachments' => $allAttachments,
            ]);

            DB::commit();

            Log::info('Project updated successfully', ['project_id' => $project->id]);

            return $project->fresh();

        } catch (\Exception $e) {
            DB::rollBack();

            // حذف الملفات الجديدة في حالة الفشل
            if (!empty($newAttachments)) {
                $this->deleteAttachments($newAttachments);
            }

            Log::error('Failed to update project', [
                'project_id' => $project->id,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Delete a project and its attachments.
     *
     * @param Project $project
     * @return bool
     */
    public function deleteProject(Project $project): bool
    {
        DB::beginTransaction();

        try {
            // حذف الملفات المرفقة
            if (!empty($project->attachments)) {
                $this->deleteAttachments($project->attachments);
            }

            // حذف المشروع
            $project->delete();

            DB::commit();

            Log::info('Project deleted successfully', ['project_id' => $project->id]);

            return true;

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Failed to delete project', [
                'project_id' => $project->id,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    /**
     * Publish a draft project.
     *
     * @param Project $project
     * @return Project
     */
    public function publishProject(Project $project): Project
    {
        if ($project->status !== 'draft') {
            throw new \Exception('يمكن نشر المشاريع المسودة فقط');
        }

        $project->update(['status' => 'published']);

        Log::info('Project published', ['project_id' => $project->id]);

        return $project->fresh();
    }

    /**
     * Handle file attachments upload.
     *
     * @param array $files
     * @return array
     */
    private function handleAttachments(array $files): array
    {
        $attachments = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                $path = $file->store('projects/attachments', 'public');

                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $file->getSize(),
                    'type' => $file->getClientMimeType(),
                    'extension' => $file->getClientOriginalExtension(),
                    'uploaded_at' => now()->toDateTimeString(),
                ];
            }
        }

        return $attachments;
    }

    /**
     * Delete attachments from storage.
     *
     * @param array $attachments
     * @return void
     */
    private function deleteAttachments(array $attachments): void
    {
        foreach ($attachments as $attachment) {
            if (isset($attachment['path'])) {
                Storage::disk('public')->delete($attachment['path']);
            }
        }
    }

    /**
     * Remove a specific attachment from a project.
     *
     * @param Project $project
     * @param int $index
     * @return Project
     */
    public function removeAttachment(Project $project, int $index): Project
    {
        $attachments = $project->attachments ?? [];

        if (isset($attachments[$index])) {
            // حذف الملف من التخزين
            Storage::disk('public')->delete($attachments[$index]['path']);

            // إزالة من المصفوفة
            array_splice($attachments, $index, 1);

            // تحديث المشروع
            $project->update(['attachments' => $attachments]);
        }

        return $project->fresh();
    }

    /**
     * Get projects statistics.
     *
     * @param int $userId
     * @return array
     */
    public function getProjectStatistics(int $userId): array
    {
        return [
            'total' => Project::where('user_id', $userId)->count(),
            'published' => Project::where('user_id', $userId)->where('status', 'published')->count(),
            'drafts' => Project::where('user_id', $userId)->where('status', 'draft')->count(),
            'in_progress' => Project::where('user_id', $userId)->where('status', 'in_progress')->count(),
            'completed' => Project::where('user_id', $userId)->where('status', 'completed')->count(),
        ];
    }

    /**
     * Search projects.
     *
     * @param string $query
     * @param array $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchProjects(string $query = '', array $filters = [])
    {
        $projects = Project::query()
            ->published()
            ->with('user');

        // البحث في العنوان والوصف
        if (!empty($query)) {
            $projects->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            });
        }

        // فلترة حسب المهارات
        if (!empty($filters['skills'])) {
            $projects->where(function($q) use ($filters) {
                foreach ($filters['skills'] as $skill) {
                    $q->orWhereJsonContains('skills', $skill);
                }
            });
        }

        // فلترة حسب نوع الميزانية
        if (!empty($filters['budget_type'])) {
            $projects->where('budget_type', $filters['budget_type']);
        }

        // فلترة حسب المدة
        if (!empty($filters['duration'])) {
            $projects->where('duration', $filters['duration']);
        }

        // الترتيب
        $sortBy = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';
        $projects->orderBy($sortBy, $sortOrder);

        return $projects->paginate($filters['per_page'] ?? 10);
    }
}
