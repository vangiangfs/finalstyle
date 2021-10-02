<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://finalstyle.com" target="_blank" class="brand-link">
        <img src="/public/cms/dist/img/AdminFinalStyle.png" alt="AdminLTE Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img style="width: 48px" src="https://ui-avatars.com/api/?size=64&background=random&name={{Auth::user()->name}}" class="img-circle elevation-2">
            </div>
            <div class="info pt-0">
                <a href="/{{env('APP_CMS_PATH')}}/users/edit" class="d-block">{{Auth::user()->name}}</a>
                <div>
                    <a href="/{{env('APP_CMS_PATH')}}/users/edit" class="d-inline-block">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    <a href="/{{env('APP_CMS_PATH')}}/logout" class="d-inline-block pl-2 text-danger">
                        <i class="fas fa-power-off"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            {!!App\Helpers\Helper::menus_cms($menus)!!}
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>