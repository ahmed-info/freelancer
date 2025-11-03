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

        <h2 class="mb-3 text-uppercase" dir="rtl">تعديل المجال</h2>

        <div class="card" dir="rtl">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('fields.update', $field) }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-4">
                            <label for="name" class="form-label">تعديل المجال المتاح</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $field->name }}">
                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="description" class="form-label">وصف القسم</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $field->description }}</textarea>
                            @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="icon" class="form-label">الايكونة</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="{{ $field->icon }}">
                            @error('icon')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
