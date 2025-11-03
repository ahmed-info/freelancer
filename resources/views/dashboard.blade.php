@extends('admin.layout.layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--end breadcrumb-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 bg-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">عدد الاقسام</p>
                                <h4 class="my-1 text-white">4</h4>
                                <p class="mb-0 font-13 text-dark"><i class="bx bxs-up-arrow align-middle"></i></p>
                            </div>
                            <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-category"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">عدد الاخبار</p>
                                <h4 class="my-1 text-white">4</h4>
                                <p class="mb-0 font-13 text-dark"><i class="bx bxs-up-arrow align-middle"></i></p>
                            </div>
                            <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 bg-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">عدد الاعلانات</p>
                                <h4 class="my-1 text-white">4</h4>
                                <p class="mb-0 font-13 text-dark"><i class="bx bxs-up-arrow align-middle"></i></p>
                            </div>
                            <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>



@endsection
