<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

    <!-- BEGIN: Left Aside -->
@include('backend.masters.body.content.master.left_aside')
<!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: SubContent -->
        @include('backend.masters.body.content.master.sub_content')
        <!-- END: SubContent -->

        <!-- BEGIN: MainContent -->
        <div class="m-content">
            @include('backend.masters.body.content.main_content')
        </div>
        <!-- END: MainContent -->
    </div>
</div>
