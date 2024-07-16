<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#vehicles-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-car-front"></i><span>Vehicles</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="vehicles-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('view-vehicles') }}">
                        <i class="bi bi-circle"></i><span>View All Vehicles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('add-vehicle') }}">
                        <i class="bi bi-circle"></i><span>Add New Vehicle</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('vehicles-on-installment') }}">
                        <i class="bi bi-circle"></i><span>Vehicles on Installment</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Vehicles Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sales-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bag"></i><span>Sales</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sales-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('view-sales') }}">
                        <i class="bi bi-circle"></i><span>View All Sales</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('record-sale') }}">
                        <i class="bi bi-circle"></i><span>Record New Sale</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Sales Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#expenses-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cash"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="expenses-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('view-expenses') }}">
                        <i class="bi bi-circle"></i><span>View All Expenses</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('record-expense') }}">
                        <i class="bi bi-circle"></i><span>Record New Expense</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Expenses Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#installments-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-credit-card"></i><span>Installments</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="installments-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('view-installments') }}">
                        <i class="bi bi-circle"></i><span>View Installment Plans</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('record-installment-payment') }}">
                        <i class="bi bi-circle"></i><span>Record Installment Payment</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Installments Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('sales-report') }}">
                        <i class="bi bi-circle"></i><span>Sales Report</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('expense-report') }}">
                        <i class="bi bi-circle"></i><span>Expense Report</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('profit-loss-report') }}">
                        <i class="bi bi-circle"></i><span>Profit/Loss Report</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Reports Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('user-profile') }}">
                        <i class="bi bi-circle"></i><span>User Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('application-settings') }}">
                        <i class="bi bi-circle"></i><span>Application Settings</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Settings Nav -->

    </ul>
</aside><!-- End Sidebar -->
