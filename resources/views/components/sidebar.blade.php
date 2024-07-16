<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#vehicle-category-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Vehicle Category</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="vehicle-category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('add-category') }}">
                        <i class="bi bi-circle"></i><span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('manage-category') }}">
                        <i class="bi bi-circle"></i><span>Manage Category</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Vehicle Category Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('add-vehicle') }}">
                <i class="bi bi-journal-text"></i>
                <span>Add Vehicle</span>
            </a>
        </li><!-- End Add Vehicle Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#manage-vehicle-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Manage Vehicle</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="manage-vehicle-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('manage-incomingvehicle') }}">
                        <i class="bi bi-circle"></i><span>Manage In Vehicle</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('manage-outgoingvehicle') }}">
                        <i class="bi bi-circle"></i><span>Manage Out Vehicle</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Manage Vehicle Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('bwdates-report-ds') }}">
                        <i class="bi bi-circle"></i><span>Between Dates Reports</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Reports Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('search-vehicle') }}">
                <i class="bi bi-search"></i>
                <span>Search Vehicle</span>
            </a>
        </li><!-- End Search Vehicle Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('reg-users') }}">
                <i class="bi bi-person"></i>
                <span> Members</span>
            </a>
        </li><!-- End Reg Users Nav -->

    </ul>
</aside><!-- End Sidebar -->
