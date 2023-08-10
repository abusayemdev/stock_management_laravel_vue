  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

    <div class="p-3">
        <div class="info clearfix">
        @auth
                <h5 class="name">{{ Auth::user()->name }}</h5>
                <span class="email">{{ Auth::user()->email }}</span>
        @endauth
        </div>
        <div class="">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();"><i class="zmdi zmdi-power"></i>{{ __('Log Out') }}</a>
            </form>
        </div>
    </div>
</aside>
  <!-- /.control-sidebar -->