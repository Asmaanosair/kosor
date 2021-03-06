<!DOCTYPE html>
<html dir="rtl" lang="en">
@include('Admin.includes.header')
<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
 @include('Admin.includes.sidebar')
    @yield('content')
</div>

@include('Admin.includes.footer')
</body>
</html>
