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
                                <button class=" btn dropdown-item" type="button"><i
                                        class="la la-download m--margin-right-10"></i>Xuất excel
                                </button>
                                <button class="btn dropdown-item multi_destroy" onclick="multiDestroy();" type="button">
                                    <i class="la la-remove m--margin-right-10"></i>Xóa nhiều
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
                                    @if(isset($filters))
                                        @foreach($filters as $name=>$filter)
                                            <div class="{{ isset($filter['class']) ? $filter['class'] : 'col-md-2' }} mb-2">
                                                <input type="{{ isset($filter['type']) ? $filter['type'] : 'text' }}" name="{{ $name }}"
                                                       value="{{ isset($_GET[$name])?$_GET[$name]:'' }}"
                                                       class="form-control m-input"
                                                       placeholder="{{ isset($filter['label']) ? $filter['label'] : '' }}">
                                            </div>
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

                                </div>
                            </form>

                            <!--end: Search Form -->

                            <!--begin: List Product -->
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table m-table m-table--head-separator-primary text-dark table-hover">
                                        <thead>
                                        <tr class="m-stack__item--fluid po">
                                            <th>
                                                <label class="m-checkbox m-checkbox--solid">
                                                    <input type="checkbox" class="ids_master"><span></span>
                                                </label>
                                            </th>
                                            <th>Thao tác</th>
                                            <th>Vị trí</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $k => $item)
                                            <tr>
                                                <th scope="row">
                                                    <label class="m-checkbox m-checkbox--solid">
                                                        <input name="id[]" type="checkbox" class="ids"
                                                               value="{{ $item->id }}"><span></span>{{$k+1}}
                                                    </label>
                                                </th>
                                                <th scope="row">
                                                    <div class="m-btn-group m-btn-group--pill btn-group btn-group-sm"
                                                         role="group" aria-label="First group">
                                                        <a class="m-btn btn btn-secondary"
                                                           href="{{ route('unit.duplication',$item->id)  }}"
                                                           title="Nhân bản"><i class="flaticon-background"></i></a>
                                                        <a class="m-btn btn btn-secondary"
                                                           href="{{ route('unit.edit',$item->id) }}" title="Sửa"><i
                                                                class="flaticon-edit"></i></a>
                                                        <span class="m-btn btn btn-secondary delete_item"
                                                              data-toggle="modal" data-target="#m_modal_{{$item->id}}"
                                                              data-id="{{$item->id}}" title="Xóa"><i
                                                                class="flaticon-delete"></i></span>
                                                    </div>
                                                    @include('backend.partial.parts.modal_destroy')
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
                        url: '{{route('unit.multi_destroy')}}',
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

        function filter(input) {
            var value = $(input).val();
            $.ajax({
                url: '{{route('unit.multi_destroy')}}',
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

        $(document).ready(function () {
            $('#toggle-search').click(function () {
                $('#form-search').slideToggle(500);
            });
            $('.ids_master').click(function () {
                console.log(1)
                $('table tbody tr th label input[type=checkbox]').trigger('click');
            });
        })
    </script>
@endsection
