<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- menu Dashboard -->
        <li class="nav-item">
            <a href="#" class="nav-link {{request()->is('dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Home</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Menu Category -->
        <li class="nav-item">
            <a href="{{route('category')}}" class="nav-link {{request()->is('category')?'active':''}}">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                    Category
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
        </li>

        <!-- Menu User -->
        <li class="nav-item">
            <a href="{{route('user')}}" class="nav-link {{request()->is('user')?'active':''}}">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                    User
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
        </li>


    </ul>
</nav>