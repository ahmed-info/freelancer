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
                            <li class="breadcrumb-item active" aria-current="page">اسم المشروع</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">

                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="بحث"> <span
                                class="position-absolute top-50 product-show translate-middle-y"><i
                                    class="bx bx-search"></i></span>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>المشاريع</th>
                                    <th>وصف المشروع</th>
                                    <th>مبلغ المشروع</th>
                                    <th>ملفات</th>
                                    <th>حالة المشروع</th>
                                    <th>المهارات</th>
                                    <th>الحدث</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($freelancers->count() > 0)
                                    @foreach ($freelancers as $index => $freelancer)
                                        <tr>

                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="badge rounded-pill text-success bg-light-success p-2 px-3">
                                                    <i class='bx bxs-circle me-1'></i>{{ $freelancer->title }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="text-black p-2 px-3">
                                                    {{ $freelancer->description }}
                                                </div>
                                            </td>


                                            <td>
                                                <div class="text-black">
                                                    {{ $freelancer->budget_amount }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="text-black">
                                                    @if ($freelancer->attachments)
                                                        @foreach (json_decode($freelancer->attachments) as $attachmentPath)
                                                            @php
                                                                $fileExtension = strtolower(
                                                                    pathinfo($attachmentPath, PATHINFO_EXTENSION),
                                                                );
                                                                $imageExtensions = [
                                                                    'jpg',
                                                                    'jpeg',
                                                                    'png',
                                                                    'gif',
                                                                    'bmp',
                                                                    'svg',
                                                                    'webp',
                                                                ];
                                                                $fileExists = file_exists(public_path($attachmentPath));
                                                            @endphp

                                                            @if (in_array($fileExtension, $imageExtensions) && $fileExists)
                                                                <img src="{{ asset($attachmentPath) }}" alt="Attachment"
                                                                    style="width: 80px; height: 80px; object-fit: cover; margin-right: 5px;">
                                                            @elseif($fileExists)
                                                                <a href="{{ asset($attachmentPath) }}" target="_blank"
                                                                    class="btn btn-sm btn-primary mb-1">عرض الملف</a>
                                                            @else
                                                                <span class="text-danger">الملف غير موجود</span>
                                                            @endif
                                                        @endforeach
                                                        @else
                                                        <span class="text-muted">لا توجد ملفات مرفقة</span>
                                                    @endif

                                                </div>
                                            </td>

                                            <td>
                                                <div class="text-black">
                                                    {{ $freelancer->status }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-black">
                                                    @foreach ($freelancer->skills as $skill)
                                                        <span class="badge bg-info text-dark">{{ $skill }}</span>
                                                    @endforeach
                                                </div>
                                            </td>

                                            {{-- <td>
                                                <div class="text-black">
                                                    {{ $freelancer->skills->pluck('name')->join(', ') }}
                                                </div>
                                            </td> --}}

                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="#" class=""><i
                                                            class='bx bxs-edit'></i></a>
                                                    <form action="{{ route('freelancers.destroy', $freelancer->id) }}" method="POST"
                                                        class="mr-2" id="delete_form_{{ $freelancer->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="show_confirm({{ $freelancer->id }})"
                                                            class="custom-btn ms-3"><i class='bx bxs-trash'></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
