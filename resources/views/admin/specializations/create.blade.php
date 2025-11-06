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
                            <li class="breadcrumb-item active" aria-current="page">اضافة تخصص</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')
            </div>
            <!--end breadcrumb-->

            <h2 class="mb-3 text-uppercase" dir="rtl">اضافة تخصص</h2>

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('specializations.store') }}" class="row g-3" id="mainForm">
                            @csrf

                            <!-- حقل التخصص الرئيسي -->
                            <div class="col-md-6">
                                <label for="title" class="form-label">اسم التخصص</label>
                                <input type="text" class="form-control" id="title" name="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary" type="submit">حفظ التخصص</button>
                                <a href="{{ route('specializations.index') }}" class="btn btn-secondary">إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('myjobs.store') }}" class="row g-3" id="mainForm">
                            @csrf

                            <!-- حقل التخصص الرئيسي -->
                            <div class="col-md-6">
                                <label for="title" class="form-label">اسم التخصص</label>
                                <select name="specialization_id" id="title" class="form-select" required>
                                    <option value="" disabled selected>اختر التخصص</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- قسم إضافة الوظائف الفرعية -->
                            <div class="col-12">
                                <div class="border p-3 rounded">
                                    <h5 class="mb-3">إضافة الوظائف الفرعية</h5>

                                    <!-- حقل إضافة الوظائف -->
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="newJobName"
                                                       placeholder="أدخل اسم الوظيفة الجديدة" value="{{ old('new_jobs.0') }}">
                                                @error('new_jobs.*')
                                                    <div class="text-danger mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-success w-100" id="addJobBtn">
                                                    <i class='bx bx-plus'></i> إضافة وظيفة
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- الوظائف المضافة -->
                                    <div class="mb-3">
                                        <h6 class="text-primary">الوظائف المضافة:</h6>
                                        <div id="jobsContainer" class="d-flex flex-wrap gap-2">
                                            @if(old('new_jobs'))
                                                @foreach(old('new_jobs') as $index => $jobName)
                                                    @if($jobName)
                                                        <div class="job-item badge bg-light-primary text-primary p-2 d-flex align-items-center">
                                                            <span class="job-name">{{ $jobName }}</span>
                                                            <button type="button" class="btn-remove-job btn btn-sm text-danger ms-2 p-0">
                                                                <i class='bx bx-x'></i>
                                                            </button>
                                                            <input type="hidden" name="new_jobs[]" value="{{ $jobName }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <!-- رسالة عندما لا توجد وظائف -->
                                    <div id="noJobsMessage" class="text-muted text-center py-3 {{ old('new_jobs') ? 'd-none' : '' }}">
                                        <i class='bx bx-info-circle me-1'></i>
                                        لم يتم إضافة أي وظائف بعد
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary" type="submit">حفظ الوظائف</button>
                                <a href="{{ route('specializations.index') }}" class="btn btn-secondary">إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const newJobNameInput = document.getElementById('newJobName');
    const addJobBtn = document.getElementById('addJobBtn');
    const jobsContainer = document.getElementById('jobsContainer');
    const noJobsMessage = document.getElementById('noJobsMessage');
    let jobCounter = {{ old('new_jobs') ? count(old('new_jobs')) : 0 }};

    // إضافة وظيفة جديدة
    addJobBtn.addEventListener('click', function() {
        const jobName = newJobNameInput.value.trim();

        if (jobName === '') {
            alert('يرجى إدخال اسم الوظيفة');
            newJobNameInput.focus();
            return;
        }

        // إنشاء عنصر الوظيفة الجديدة
        const jobElement = document.createElement('div');
        jobElement.className = 'job-item badge bg-light-primary text-primary p-2 d-flex align-items-center';
        jobElement.innerHTML = `
            <span class="job-name">${jobName}</span>
            <button type="button" class="btn-remove-job btn btn-sm text-danger ms-2 p-0">
                <i class='bx bx-x'></i>
            </button>
            <input type="hidden" name="new_jobs[]" value="${jobName}">
        `;

        jobsContainer.appendChild(jobElement);
        newJobNameInput.value = '';
        jobCounter++;

        // إخفاء رسالة عدم وجود وظائف
        noJobsMessage.classList.add('d-none');

        // إضافة حدث الحذف للعنصر الجديد
        const removeBtn = jobElement.querySelector('.btn-remove-job');
        removeBtn.addEventListener('click', function() {
            jobElement.remove();
            jobCounter--;

            // إظهار رسالة عدم وجود وظائف إذا لم يعد هناك وظائف
            if (jobCounter === 0) {
                noJobsMessage.classList.remove('d-none');
            }
        });
    });

    // إضافة حدث للحذف للوظائف الموجودة (في حالة old input)
    document.querySelectorAll('.btn-remove-job').forEach(btn => {
        btn.addEventListener('click', function() {
            const jobItem = this.closest('.job-item');
            jobItem.remove();
            jobCounter--;

            if (jobCounter === 0) {
                noJobsMessage.classList.remove('d-none');
            }
        });
    });

    // السماح بإضافة الوظيفة بالضغط على Enter
    newJobNameInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addJobBtn.click();
        }
    });

    // التحقق من وجود وظائف عند التحميل
    if (jobCounter > 0) {
        noJobsMessage.classList.add('d-none');
    }
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
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-remove-job:hover {
    background: rgba(255,0,0,0.1);
    border-radius: 50%;
}

#noJobsMessage {
    border: 1px dashed #dee2e6;
    border-radius: 5px;
}
</style>
@endpush
