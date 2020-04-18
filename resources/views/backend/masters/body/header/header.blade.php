<!-- BEGIN: Header -->
<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">

            <!-- BEGIN: Brand -->
            @include('backend.masters.body.header.brand')
            <!-- END: Brand -->

            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                <!-- BEGIN: Horizontal Menu -->
                @include('backend.masters.body.header.horizontal_menu')

                <!-- END: Horizontal Menu -->

                <!-- BEGIN: Topbar -->
                @include('backend.masters.body.header.topbar')
                <!-- END: Topbar -->
            </div>

        </div>
    </div>
</header>

<!-- END: Header -->
