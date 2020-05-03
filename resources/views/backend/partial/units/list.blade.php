@extends('backend.masters.master')
@section('head_link')
{{--    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
@endsection
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
                                class="btn btn-default btn-icon-sm dropdown-toggle btn-closed-search m--margin-right-10"
                                id="toggle-search">
                            <i class="la la-search m--margin-right-10"></i> Tìm kiếm
                        </button>
                        <div class="dropdown  m--margin-right-10">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-arrows m--margin-right-10"></i> Hành động
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                <a href="{{route('unit.export')}}" class=" btn dropdown-item" type="button">
                                    <i class="la la-download m--margin-right-10"></i>Xuất excel
                                </a>
                                <button class="btn dropdown-item multi_destroy" onclick="multiDestroy();" type="button">
                                    <i class="la la-remove m--margin-right-10"></i>Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <button type="button"
                                class="btn btn-default btn-icon-sm dropdown-toggle btn-closed-rocket m--margin-right-10"
                                id="toggle-add-rocket">
                            <i class="la la-rocket m--margin-right-10"></i>Thêm nhanh
                        </button>
                        <a href="{{asset('admin/'.$modules['slug'].'/create')}}"
                           class="btn btn-primary btn-elevate btn-icon-sm">
                            <i class="la la-plus m--margin-right-10"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-12">
                            <!--begin: Search Form -->
                            <form action="{{asset('admin/'.$modules['slug'])}}" method="get" id="form-search"
                                  style="{{ empty($_GET) ? 'display:none;' : ''}}">
                                <div class="m-form__group row">
                                    {{--begin: Bộ lọc--}}
                                    @if(isset($filters))
                                        @foreach($filters as $name=>$filter)
                                            @include('backend.filters.text')
                                        @endforeach
                                    @endif
                                    <div class="col-lg-1 mb-2">
                                        <button type="submit" class="btn btn-primary m--margin-right-10"><i
                                                class="flaticon-search-magnifier-interface-symbol m--margin-right-10"></i>Tìm
                                        </button>
                                    </div>
                                    <div class="col-lg-1 mb-2">
                                        <button type="reset" class="btn btn-secondary"><i
                                                class="flaticon-refresh m--margin-right-10"></i>Làm mới
                                        </button>
                                    </div>
                                    {{--end: Bộ lọc--}}

                                </div>
                            </form>
                            <!--end: Search Form -->
                            <!--begin: import data from excel to DB Form -->
                            <form action="{{asset('admin/'.$modules['slug'].'/import')}}" method="post" id="form-add-rocket" enctype="multipart/form-data">
                                @csrf
                                <div class="m-form__group row ">
                                    <div class="col-md-6 text-right mb-2">
                                    </div>
                                    <div class="col-md-6 text-right mb-2">
                                        <div class="custom-file">
{{--                                            <input type="file" name="file" class="form-control">--}}
                                            <input type="file" class="custom-file-input" name="unit-add-file"/>
                                            <label class="custom-file-label" for="customFile">Chọn file .xlsx</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary m--margin-top-10">
                                            <i class="la la-check m--margin-right-10"></i>Lưu
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!--end: import data from excel to DB Form -->

                            <!--begin: List Product -->
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table m-table m-table--head-separator-primary text-dark table-hover d-table-list" id="d-table-list">
                                        <thead>
                                        <tr class="m-stack__item--fluid">
                                            <th class="d-primary-row"  onclick="sortTable({{0}})">
                                                <label class="m-checkbox m-checkbox--solid" style="display: inline">
                                                    <input type="checkbox" class="ids_master"><span></span>
                                                </label>#
                                            </th>
                                            <th class="d-primary-row">Hành động</th>

                                            @if(isset($listColumns))
                                                @foreach($listColumns as $r=>$listColumn)
                                                    <th onclick="sortTable({{$r+1}})"
                                                        class="{{ $listColumn['name'] }} d-primary-row {{ @$listColumn['class'] }}">{{ $listColumn['label'] }}
                                                        <i class="la la-arrow-down fa-1x"></i></th>
                                                @endforeach
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listItems as $k => $listItem)
                                            <tr>
                                                <th scope="row" class="d-row-sort">
                                                    <label class="m-checkbox m-checkbox--solid">
                                                        <input name="id[]" type="checkbox" class="ids"
                                                               value="{{ $listItem->id }}"><span></span>{{$k+1}}
                                                    </label>
                                                </th>
                                                <th scope="row">
                                                    <div class="m-btn-group m-btn-group--pill btn-group btn-group-sm"
                                                         role="group" aria-label="First group">
                                                        <a class="m-btn btn btn-secondary"
                                                           href="{{ route($modules['slug'].'.duplication',$listItem->id)  }}"
                                                           title="Nhân bản"><i class="flaticon-background"></i></a>
                                                        <a class="m-btn btn btn-secondary"
                                                           href="{{ route($modules['slug'].'.edit',$listItem->id) }}"
                                                           title="Sửa"><i
                                                                class="flaticon-edit"></i></a>
                                                        <span class="m-btn btn btn-secondary delete_item"
                                                              data-toggle="modal"
                                                              data-target="#m_modal_{{$listItem->id}}"
                                                              data-id="{{$listItem->id}}" title="Xóa"><i
                                                                class="flaticon-delete"></i></span>
                                                    </div>
                                                    @include('backend.partial.parts.modal_destroy')
                                                </th>
                                                @if(isset($listColumns))
                                                    @foreach($listColumns as $listColumn)
                                                        @include('backend.lists.cols.'.$listColumn['type'] )
                                                    @endforeach
                                                @endif
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                    {{$listItems->render()}}
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
{{--    --}}{{--DataTables--}}
{{--    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>--}}
    <script>
        function multiDestroy() {
            var ids = [];
            $('.ids:checkbox:checked').each(function (i) {
                ids[i] = $(this).val();
            });
            if (ids.length == 0) {
                alert('Bạn chưa chọn bản ghi nào để xóa!');
            } else {
                if (confirm('Bạn có chắc chắn muốn xóa?')) {
                    $.ajax({
                        url: '{{route($modules['slug'].'.multi_destroy')}}',
                        type: 'get',
                        data: {
                            ids: ids
                        },
                        success: function () {
                            location.reload();
                        },
                        error: function () {
                            alert('Có lỗi xảy ra. Vui lòng load lại website và thử lại!');
                        }
                    });
                }
            }
        }

        $(document).ready(function () {
            $('#toggle-search').click(function () {
                $('#form-search').slideToggle(500);
            });
            $('#toggle-add-rocket').click(function () {
                $('#form-add-rocket').slideToggle(500);
            });
            $('.ids_master').click(function () {
                $('table tbody tr th label input[type=checkbox]').trigger('click');
            });
        })
    </script>
@endsection
