<!--begin::Global Theme Bundle -->
<script src="{{asset('metronic/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('metronic/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
<script src="{{asset('metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}"
        type="text/javascript"></script>

<!--end::Page Vendors -->
<script>
    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if (session('success'))
        toastr.success("{{session('success')}}");
        @elseif(session('error'))
        toastr.error("{{session('error')}}");
        @elseif(session('warning'))
        toastr.warning("{{session('warning')}}");
        @endif
    });
</script>


