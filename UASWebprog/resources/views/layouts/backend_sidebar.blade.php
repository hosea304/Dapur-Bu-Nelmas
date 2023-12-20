<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- menu Dashboard -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{request()->is('dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
        </li>

        <!-- Menu Category -->
        <li class="nav-item">
            <a href="{{ route('category') }}" class="nav-link {{request()->is('category')?'active':''}}">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                    Category
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
        </li>

        <!-- Menu Product -->
        <li class="nav-item">
            <a href="{{ route('foods') }}" class="nav-link {{request()->is('foods')?'active':''}}">
                <i class="nav-icon fas fa-pizza-slice"></i>
                <p>
                    Menu
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
        </li>

        <!-- Per Day Menu Product -->
        <li class="nav-item">
            <a href="{{ route('perdaymenu') }}" class="nav-link {{request()->is('perdaymenu')?'active':''}}">
                <i class="nav-icon fas fa-pizza-slice"></i>
                <p>
                    Per Day Menu
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
        </li>

        <!-- Orders list -->
        <li class="nav-item">
            <a href="{{ route('orders') }}" class="nav-link {{request()->is('orders')?'active':''}}">
                <i class="nav-icon fas fa-pizza-slice"></i>
                <p>
                    Orders
                    <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
            </a>
        </li>
    </ul>
</nav>