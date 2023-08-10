<x-app-layout>

    <div class="wrapper">

       @include('layouts.dashboard.header')
       @include('layouts.dashboard.sidebar')
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="app">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

     @include('layouts.dashboard.account_logout')
     @include('layouts.dashboard.footer')
     @include('flash-toastr::message')
    </div>
    <!-- ./wrapper -->


</x-app-layout>
