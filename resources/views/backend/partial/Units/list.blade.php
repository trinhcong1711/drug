@extends('backend.masters.master')

@section('main')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-placeholder-3 m--font-primary"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Vị Trí
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <button type="button"
                                class="btn btn-default btn-icon-sm dropdown-toggle btn-closed-search m--margin-right-10" id="toggle-search">
                            <i class="la la-search m--margin-right-10"></i> Tìm kiếm
                        </button>
                        <div class="dropdown  m--margin-right-10">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-arrows m--margin-right-10"></i> Hành động
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                <button class="dropdown-item" type="button"><i
                                        class="la la-download m--margin-right-10"></i>Xuất excel
                                </button>
                                <button class="dropdown-item" type="button"><i
                                        class="la la-remove m--margin-right-10"></i>Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <a href="{{asset('admin/unit/create')}}" class="btn btn-primary btn-elevate btn-icon-sm">
                            <i class="la la-plus m--margin-right-10"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-12">
                            <!--begin: Search Form -->
                            <form action="" method="get" id="form-search" style="display:none;">
                                <div class="m-form__group row">
                                    <div class="col-lg-2 mb-2">
                                        <input type="email" class="form-control m-input" placeholder="Enter full name">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="email" class="form-control m-input" placeholder="Enter email">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <div class="col-lg-2 mb-2">
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary m--margin-right-10"><i
                                                class="flaticon-search-magnifier-interface-symbol m--margin-right-10"></i>Tìm
                                        </button>
                                        <button type="reset" class="btn btn-secondary"><i
                                                class="flaticon-refresh m--margin-right-10"></i>Làm mới
                                        </button>
                                    </div>

                                </div>
                            </form>

                            <!--end: Search Form -->

                            <!--begin: List Product -->
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table m-table m-table--head-separator-primary text-dark table-hover">
                                        <thead>
                                        <tr class="m-stack__item--fluid po">
                                            <th>#</th>
                                            <th>Thao tác </th>
                                            <th>Vị trí</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($units as $k => $item)
                                            <tr>
                                                <th scope="row">{{$k+1}}</th>
                                                <th scope="row">
                                                    <div class="m-btn-group m-btn-group--pill btn-group btn-group-sm" role="group" aria-label="First group">
                                                        <a class="m-btn btn btn-secondary" href="{{asset('admin/unit/duplication/'.$item->id)}}" title="Nhân bản"><i class="flaticon-background"></i></a>
                                                        <a class="m-btn btn btn-secondary" href="{{asset('admin/unit/'.$item->id.'/edit')}}" title="Sửa"><i class="flaticon-edit"></i></a>
                                                        <a class="m-btn btn btn-secondary" href="{{asset('admin/unit/destroy'.$item->id)}}" title="Xóa"><i class="flaticon-delete"></i></a>
                                                    </div>
                                                </th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->note }}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{$units->render()}}
                                </div>
                            </div>

                            <!--end: List Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_footer')
    <script>
        $(document).ready(function () {
            $('#toggle-search').click(function () {
                $('#form-search').slideToggle(500);
            });
        })
    </script>
@endsection
