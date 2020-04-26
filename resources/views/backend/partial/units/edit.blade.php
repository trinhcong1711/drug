@extends('backend.masters.master')

@section('main')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('unit.update',$unit->id)}}">
            @csrf
            @method('put')
            <input name="return_redirect" value="" type="hidden">
            <div class="m-content">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Sticky Portlet-->
                        <div class="m-portlet m-portlet--last m-portlet--responsive-mobile" id="main_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-wrapper">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon">
                                                <i class="flaticon-edit m--font-primary"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">
                                                Chỉnh sửa Vị Trí
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="m-portlet__head-tools">
                                        <a href="{{asset('admin/unit')}}"
                                           class="border-0 btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                                            <i class="la la-arrow-left m--margin-right-10"></i> Hủy | Quay lại
                                        </a>
                                        <div class="btn-group">
                                            <button type="submit" title="Lưu và về trang danh sách" class="btn btn-primary">
                                                <i class="la la-check m--margin-right-10"></i>
                                                <span>Lưu</span>
                                            </button>
                                            <button type="submit"
                                                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right save_option"  data-action="save_back" x-placement="bottom-start" style="cursor: pointer">
                                                <a class="dropdown-item" title="Lưu và tiếp tục tạo mới">
                                                    <i class="la la-plus m--margin-right-10"></i> Lưu & tiếp tục
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet"></div>
                        </div>
                        <!--end::Sticky Portlet-->
                    </div>
                </div>

                <!--end::tab nhập liệu-->
                <div class="row">
                    <div class="col-md-12">

                        <div class="m-portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                            <i class="la la-leaf m--font-primary"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            Thông Tin Cơ Bản
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="unit_name">Tên</label>
                                    <input type="text" name="name" class="form-control m-input" id="unit_name"
                                           placeholder="Nhập tên" value="{{ old('name')!==Null ?  old('name') : $unit->name }}">
                                    <span class="m-form__help text-danger">{{ @$errors->first('name') }}</span>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="unit_note">Ghi chú</label>
                                    <textarea name="note" class="form-control m-input" id="unit_note" rows="3">{{ old('note')!==Null ?  old('note') : $unit->note }}</textarea>
                                </div>
                            </div>

                        </div>
                        <!--end::form nhập liệu-->

                    </div>
                </div>

                <!--end::tab nhập liệu-->
            </div>
        </form>

        <!--end::Form-->
    </div>
@endsection
@section('script_footer')
    <script>
        $('.save_option').click(function () {
            var action = $(this).data('action');
            $('input[name=return_redirect]').val(action);
            $('form.m-form').submit();
        });
    </script>
@endsection
