<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
@include('backend.masters.head.head')
<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- BEGIN: Header -->
        @include('backend.masters.body.header.header')
        <!-- END: Header -->

        <!-- begin::Content -->
        @include('backend.masters.body.content.master.content')
        <!-- end:: Content -->

        <!-- begin::Footer -->
        @include('backend.masters.body.footer.footer')
        <!-- end::Footer -->
    </div>

    <!-- end:: Page -->

    <!-- begin::Quick Sidebar -->
    @include('backend.masters.body.quick_sidebar.quick_sidebar')
    <!-- end::Quick Sidebar -->

    <!-- begin::Scroll Top -->
    @include('backend.masters.body.scroll_top.scroll_top')
    <!-- end::Scroll Top -->

    <!-- begin::Quick Nav -->
    @include('backend.masters.body.quick_nav.quick_nav')
    <!-- begin::Quick Nav -->

    <!-- begin::Script Footer -->
    @include('backend.masters.head.script_footer')
    <!-- begin::Script Footer -->

</body>

<!-- end::Body -->
</html>
