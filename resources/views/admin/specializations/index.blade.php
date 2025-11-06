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
                            <li class="breadcrumb-item active" aria-current="page">القسم الرئيسي</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class=""><a href="{{ route('specializations.create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>اضافة تخصص</a></div>
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
                                    <th>التخصص</th>
                                    <th>المسميات الوظيفية</th>
                                    <th>الحدث</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($specializations->count() > 0)
                                    @foreach ($specializations as $index => $specialization)
                                        <tr>

                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="badge rounded-pill text-success bg-light-success p-2 px-3">
                                                    <i class='bx bxs-circle me-1'></i>{{ $specialization->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-black d-flex flex-wrap gap-1">
                                                    @foreach ($specialization->myjobs as $job)
                                                        <span
                                                            class="badge rounded-pill text-primary bg-light-primary p-2 px-3 mb-1">{{ $job->name }}</span>
                                                    @endforeach
                                                </div>
                                            </td>


                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('specializations.edit', $specialization) }}" class=""><i
                                                            class='bx bxs-edit'></i></a>
                                                    <form action="{{ route('specializations.destroy', $specialization) }}" method="POST"
                                                        class="mr-2" id="delete_form_{{ $specialization->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="show_confirm({{ $specialization->id }})"
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
