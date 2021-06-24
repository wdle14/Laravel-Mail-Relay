@include('layouts.header')
<!-- end of header -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content_header')
    <!-- END Content Header-->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                @include('flash::message')
            </div>
        </div>
        @yield('content')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')
