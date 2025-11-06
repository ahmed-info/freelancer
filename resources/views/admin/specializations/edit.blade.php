@extends('admin.layout.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">فري لانسر</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">تعديل التخصص</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')
            </div>
            <!--end breadcrumb-->

            <h2 class="mb-3 text-uppercase" dir="rtl">تعديل التخصص</h2>

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('specializations.update', $specialization) }}" class="row g-3" id="mainForm">
                            @csrf
                            @method('PUT')

                            <!-- حقل التخصص الرئيسي -->
                            <div class="col-md-6">
                                <label for="title" class="form-label">اسم التخصص</label>
                                <input type="text" class="form-control" id="title" name="name"
                                    value="{{ old('name', $specialization->name) }}" required>
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- قسم إدارة الوظائف الفرعية -->
                            <div class="col-12">
                                <div class="border p-3 rounded">
                                    <h5 class="mb-3">إدارة الوظائف الفرعية</h5>

                                    <!-- الوظائف الحالية -->
                                    <div class="mb-4">
                                        <h6 class="text-primary">الوظائف الحالية:</h6>
                                        <div id="currentJobs" class="d-flex flex-wrap gap-2 mb-3">
                                            @foreach($specialization->myjobs as $job)
                                                <div class="job-item badge bg-light-primary text-primary p-2 d-flex align-items-center">
                                                    <span class="job-name">{{ $job->name }}</span>
                                                    <button type="button" class="btn-remove-job btn btn-sm text-danger ms-2 p-0"
                                                            data-job-id="{{ $job->id }}">
                                                        <i class='bx bx-x'></i>
                                                    </button>
                                                    <input type="hidden" name="existing_jobs[]" value="{{ $job->id }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- إضافة وظائف جديدة -->
                                    <div class="mb-3">
                                        <h6 class="text-success">إضافة وظائف جديدة:</h6>
                                        <div class="row g-2">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="newJobName"
                                                       placeholder="أدخل اسم الوظيفة الجديدة">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-success w-100" id="addJobBtn">
                                                    <i class='bx bx-plus'></i> إضافة
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- الوظائف المضافة حديثاً -->
                                    <div id="newJobsContainer" class="d-flex flex-wrap gap-2">
                                        <!-- سيتم إضافة الوظائف الجديدة هنا عبر JavaScript -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary" type="submit">حفظ التعديلات</button>
                                <a href="{{ route('specializations.index') }}" class="btn btn-secondary">إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const newJobNameInput = document.getElementById('newJobName');
    const addJobBtn = document.getElementById('addJobBtn');
    const newJobsContainer = document.getElementById('newJobsContainer');
    const currentJobsContainer = document.getElementById('currentJobs');
    let newJobCounter = 0;

    // إضافة وظيفة جديدة
    addJobBtn.addEventListener('click', function() {
        const jobName = newJobNameInput.value.trim();

        if (jobName === '') {
            alert('يرجى إدخال اسم الوظيفة');
            return;
        }

        // إنصراف عنصر الوظيفة الجديدة
        const jobId = 'new_job_' + newJobCounter++;
        const jobElement = document.createElement('div');
        jobElement.className = 'job-item badge bg-light-success text-success p-2 d-flex align-items-center';
        jobElement.innerHTML = `
            <span class="job-name">${jobName}</span>
            <button type="button" class="btn-remove-job btn btn-sm text-danger ms-2 p-0">
                <i class='bx bx-x'></i>
            </button>
            <input type="hidden" name="new_jobs[]" value="${jobName}">
        `;

        newJobsContainer.appendChild(jobElement);
        newJobNameInput.value = '';

        // إضافة حدث الحذف للعنصر الجديد
        const removeBtn = jobElement.querySelector('.btn-remove-job');
        removeBtn.addEventListener('click', function() {
            jobElement.remove();
        });
    });

    // إضافة حدث للحذف للوظائف الحالية
    document.querySelectorAll('.btn-remove-job').forEach(btn => {
        btn.addEventListener('click', function() {
            const jobItem = this.closest('.job-item');
            const jobId = this.getAttribute('data-job-id');

            if (jobId) {
                // إذا كانت وظيفة موجودة، نضيف حقل مخفي للحذف
                const deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = 'deleted_jobs[]';
                deleteInput.value = jobId;
                document.getElementById('mainForm').appendChild(deleteInput);
            }

            jobItem.remove();
        });
    });

    // السماح بإضافة الوظيفة بالضغط على Enter
    newJobNameInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addJobBtn.click();
        }
    });
});
</script>

<style>
.job-item {
    font-size: 14px;
    transition: all 0.3s ease;
}

.job-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.btn-remove-job {
    border: none;
    background: none;
    font-size: 16px;
    line-height: 1;
}

.btn-remove-job:hover {
    background: rgba(255,0,0,0.1);
    border-radius: 50%;
}
</style>
