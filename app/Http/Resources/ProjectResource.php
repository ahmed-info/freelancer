<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,

            // معلومات الميزانية
            'budget' => [
                'amount' => $this->budget_amount,
                'hourly_rate' => $this->hourly_rate,
                'weekly_hours' => $this->weekly_hours,
                'display' => $this->budget_display,
            ],

            // التفاصيل
            'duration' => [
                'value' => $this->duration,
                'display' => $this->duration_display,
            ],

            'status' => $this->status,
            'status_ar' => $this->getStatusInArabic(),

            // المهارات والملفات
            'skills' => $this->skills ?? [],
            'attachments' => $this->formatAttachments(),
            'attachments_count' => count($this->attachments ?? []),

            // معلومات صاحب المشروع
            'owner' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'avatar' => $this->user->avatar ?? null,
            ],

            // العروض
            'proposals_count' => $this->when(
                $this->relationLoaded('proposals'),
                fn() => $this->proposals->count()
            ),

            // التواريخ
            'created_at' => $this->created_at?->toIso8601String(),
            'created_at_human' => $this->created_at?->diffForHumans(),
            'updated_at' => $this->updated_at?->toIso8601String(),

            // روابط
            'links' => [
                'self' => route('api.projects.show', $this->id),
                'edit' => $this->when(
                    $this->user_id === auth()->id(),
                    fn() => route('api.projects.update', $this->id)
                ),
                'delete' => $this->when(
                    $this->user_id === auth()->id(),
                    fn() => route('api.projects.destroy', $this->id)
                ),
            ],
        ];
    }

    /**
     * Format attachments for output.
     *
     * @return array
     */
    private function formatAttachments(): array
    {
        if (empty($this->attachments)) {
            return [];
        }

        return array_map(function ($attachment) {
            return [
                'name' => $attachment['name'],
                'size' => $this->formatFileSize($attachment['size']),
                'size_bytes' => $attachment['size'],
                'type' => $attachment['type'],
                'extension' => $attachment['extension'] ?? null,
                'url' => asset($attachment['path']),
                'uploaded_at' => $attachment['uploaded_at'] ?? null,
            ];
        }, $this->attachments);
    }

    /**
     * Format file size to human readable.
     *
     * @param int $bytes
     * @return string
     */
    private function formatFileSize(int $bytes): string
    {
        if ($bytes === 0) return '0 Bytes';

        $k = 1024;
        $sizes = ['Bytes', 'KB', 'MB', 'GB'];
        $i = floor(log($bytes) / log($k));

        return round($bytes / pow($k, $i), 2) . ' ' . $sizes[$i];
    }

    /**
     * Get status in Arabic.
     *
     * @return string
     */
    private function getStatusInArabic(): string
    {
        $statuses = [
            'draft' => 'مسودة',
            'published' => 'منشور',
            'in_progress' => 'قيد التنفيذ',
            'completed' => 'مكتمل',
            'cancelled' => 'ملغي',
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @return array<string, mixed>
     */
    public function with(Request $request): array
    {
        return [
            'meta' => [
                'version' => '1.0',
                'timestamp' => now()->toIso8601String(),
            ],
        ];
    }
}
