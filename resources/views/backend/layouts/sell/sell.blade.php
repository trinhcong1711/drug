@extends('backend.masters.index')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <i class="la la-cart-plus fa-2x"></i> BÁN HÀNG
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <span class="btn btn-danger m-btn m-btn--custom p-3 col-12">
                                                    <i class="la la-plus"></i>
                                                    <span>TẠO PHIẾU KHÁCH TRẢ</span>
                                                </span>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-9 col-md-9">
                            <!--begin: Search Form -->
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-12">
                                        <div class="form-group m-form__group row align-items-center">
                                            <div class="col-md-12">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input"
                                                           placeholder="Search..." id="generalSearch">
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
                            <table class="m-datatable" id="html_table" width="100%">
                                <thead>
                                <tr>
                                    <th title="Tên thuốc" data-field="Name">Tên</th>
                                    <th title="Liều dùng / Cách dùng" data-field="Dosage">Liều dùng</th>
                                    <th title="Đơn vị tính" data-field="Unit">Đơn vị tính</th>
                                    <th title="Số lượng" data-field="Number">Số lượng</th>
                                    <th title="Giá bán" data-field="Price">Giá bán</th>
                                    <th title="Thành tiền" data-field="Total Price">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Panadol</td>
                                    <td><input type="text" name="billing_card_name" class="form-control text-left  w-100 border-right-0 border-left-0 border-top-0" placeholder="Liều dùng..." value=""></td>
                                    <td>Vỉ</td>
                                    <td><input type="text" name="billing_card_name" class="text-left p-2 w-100 border-right-0 border-left-0 border-top-0" placeholder="0" value=""></td>
                                    <td><input type="text" name="billing_card_name" class="text-left bg- p-2 w-100 border-right-0 border-left-0 border-top-0" placeholder="0" value=""></td>
                                    <td>20.000</td>
                                </tr>
                                </tbody>
                            </table>
                            <!--end: List Product -->
                        </div>

                        <!--begin:: Invoice-->
                        <div class="col-xl-3 col-md-3">
                            <div class="m-portlet m-portlet--full-height ">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                Hóa đơn
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="m-widget6">
                                        <div class="m-widget6__body">
                                            <div class="m-widget6__item">
                                                    <label class="form-control-label">Người bán</label>
                                                    <input type="text" name="billing_card_name" class="form-control m-input" placeholder="Người bán hàng" value="">
                                            </div>
                                            <div class="m-widget6__item">
                                                <label class="form-control-label">Ngày bán</label>
                                                <div class="input-group date">

                                                    <input type="text" class="form-control m-input" placeholder="Ngày bán" id="m_datetimepicker_4_2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-clock-o glyphicon-th"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget6__item">
                                                <label class="form-control-label">Tên khách hàng</label>
                                                <div class="input-group m-input-group">
                                                    <input type="text" class="form-control m-input" value="" placeholder="Tên khách hàng" aria-describedby="basic-addon1">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-user-plus"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget6__item">
													<span class="m-widget6__text">
														Tổng tiền trước thuế
													</span>
                                                <span class="m-widget6__text m--align-right m--font-boldest m--font-brand">
														14,740
													</span>
                                            </div>
                                            <div class="m-widget6__item">
													<span class="m-widget6__text">
														Tổng tiền VAT
													</span>
                                                <span class="m-widget6__text m--align-right m--font-boldest m--font-brand">
														14,740
													</span>
                                            </div>
                                            <div class="m-widget6__item">
													<span class="m-widget6__text">
														Tổng tiền hàng
													</span>
                                                <span class="m-widget6__text m--align-right m--font-boldest m--font-brand">
														14,740
													</span>
                                            </div>
                                            <div class="m-widget6__item">
													<span class="m-widget6__text">
														Giảm giá
													</span>
                                                <span class="m-widget6__text m--align-right m--font-boldest m--font-brand">
														<input type="text" name="billing_card_name" class="m--align-right m--font-boldest m--font-brand text-right p-0 w-100 border-right-0 border-left-0 border-top-0" placeholder="0" value="">
													</span>
                                            </div>
                                            <div class="m-widget6__item">
													<span class="m-widget6__text m--font-boldest m--font-brand">
														Khách cần trả
													</span>
                                                <span class="m-widget6__text m--align-right m--font-boldest m--font-brand">
														14,740
													</span>
                                            </div>
                                            <div class="m-widget6__item">
													<span class="m-widget6__text m--font-boldest m--font-brand">
														Khách thanh toán
													</span>
                                                <span class="m-widget6__text m--align-right m--font-boldest m--font-brand">
														<input type="text" name="billing_card_name" class="m--align-right m--font-boldest m--font-brand text-right p-0 w-100 border-right-0 border-left-0 border-top-0" placeholder="0" value="">
													</span>
                                            </div>
                                            <div class="m-widget6__item">
													<span class="m-widget6__text m--font-boldest m--font-brand">
														Tiền thừa trả khách
													</span>
                                                <span class="m-widget6__text m--align-right m--font-boldest m--font-brand">
														14,740
													</span>
                                            </div>
                                            <div class="m-widget6__item">
                                                <div class="form-group m-form__group">
                                                    <label for="exampleTextarea">Ghi chú</label>
                                                    <textarea class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="m-widget6__foot">
                                            <div class="form-group m-form__group">
                                                <span class="btn btn-success m-btn m-btn--custom p-3 col-12">
                                                    <i class="flaticon-piggy-bank"></i>
                                                    <span>THANH TOÁN</span>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="m-widget6__foot">
                                            <div class="form-group m-form__group">
                                                <span class="btn btn-primary m-btn m-btn--custom p-3 col-12">
                                                    <i class="flaticon-box-1"></i>
                                                    <span>THANH TOÁN & IN HÓA ĐƠN</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:: Invoice-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_footer')
    <script src="{{asset('metronic/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
@endsection
