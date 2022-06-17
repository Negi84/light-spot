<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="240px">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu" style="font-size: 16px;"> Menu </li>
                {{-- <li>
                    <a href="/client-surveys" class="">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-contacts" style="font-size: 16px;"> Overview </span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('students') }}" class="">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-student" style="font-size: 16px;"> Student </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('orders') }}" class="">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-order" style="font-size: 16px;"> Order </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('class') }}" class="">
                        <i class="bx bxs-copy"></i>
                        <span key="t-class" style="font-size: 16px;"> Class </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
