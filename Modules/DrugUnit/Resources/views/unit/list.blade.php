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
                                class="btn btn-default btn-icon-sm dropdown-toggle btn-closed-search m--margin-right-10">
                            <i class="la la-search m--margin-right-10"></i> Tìm kiếm
                        </button>
                        <div class="dropdown  m--margin-right-10">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-arrows m--margin-right-10"></i> Hành động
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                <button class="dropdown-item" type="button"><i class="la la-download m--margin-right-10"></i>Xuất excel</button>
                                <button class="dropdown-item" type="button"><i class="la la-remove m--margin-right-10"></i>Xóa nhiều</button>
                            </div>
                        </div>
                        <a href="{{asset('admin/unit/add')}}" class="btn btn-primary btn-elevate btn-icon-sm">
                            <i class="la la-plus m--margin-right-10"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-12">
                            <!--begin: Search Form -->
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12">
                                        <div class="form-group m-form__group row align-items-center">
                                            <div class="col-md-12">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input"
                                                           placeholder="Tìm kiếm theo tất cả các cột..." id="generalSearch">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search-plus"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Search Form -->

                            <!--begin: List Product -->
                            <table class="table m-table m-table--head-separator-primary table-responsive">
                                <thead>
                                <tr class="m-stack__item--fluid">
                                    <th>#</th>
                                    <th>Vị trí</th>
                                    <th>Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $k => $item)
                                <tr>
                                    <th scope="row">{{$k+1}}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->note }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$items->render()}}
                            <!--end: List Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_footer')
{{--    <script src="{{asset('metronic/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js')}}"--}}
{{--            type="text/javascript"></script>--}}
@endsection
