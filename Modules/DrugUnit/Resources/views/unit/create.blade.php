@extends('backend.masters.master')

@section('main')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right">
            <div class="m-content">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile m-portlet--sticky" id="main_portlet">
                            <div class="m-portlet__head" style="z-index: 90; top: 70px; left: 285px; right: 30px;">
                                <div class="m-portlet__head-progress">

                                    <!-- here can place a progress bar-->
                                </div>
                                <div class="m-portlet__head-wrapper">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
													<span class="m-portlet__head-icon">
														<i class="flaticon-map-location"></i>
													</span>
                                            <h3 class="m-portlet__head-text">
                                                Thêm Mới Vị Trí
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                        <a href="#"
                                           class="border-0 btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                                            <i class="la la-arrow-left"></i> Hủy | Quay lại
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">
                                                <i class="la la-check m--margin-right-10"></i>
                                                <span>Lưu</span>
                                            </button>
                                            <button type="button"
                                                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                                                {{--                                            <a class="dropdown-item" href="#" data-action="save_continue"><i class="la la-retweet m--margin-right-10"></i> Lưu & tiếp tục</a>--}}
                                                <a class="dropdown-item" href="#" data-action="save_new"><i class="la la-plus m--margin-right-10"></i> Lưu & tạo mới</a>
                                                {{--                                            <a class="dropdown-item" href="#" data-action="save_close"><i class="la la-mail-reply m--margin-right-10"></i> Lưu & thoát</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <!--begin::Portlet-->
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Thông Tin Cơ Bản
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!--begin::form nhập liệu-->
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="unit_name">Tên</label>
                                    <input type="text" name="name" class="form-control m-input" id="unit_name"
                                           placeholder="Nhập tên" value="">
                                    <span class="m-form__help">Tên vị trí không được để trống</span>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="unit_note">Ghi chú</label>
                                    <textarea name="note" class="form-control m-input" id="unit_note" rows="3"></textarea>
                                </div>
                            </div>
                            <!--end::form nhập liệu-->
                        </div>
                        <!--end::Portlet-->

                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
@endsection
