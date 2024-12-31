<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand    d-flex align-items-center justify-content-center"
        href="<?php echo e(route('leave-requests.index')); ?>">
        <div class="sidebar-brand-icon mx-2 ">
            <i class="fa-solid fa-gauge-high"></i>
        </div>
        ELMS

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo e(request()->routeIs('admin.index') ? 'active' : ''); ?>

        ">
        <a class="nav-link" href="<?php echo e(route('admin.index')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>





    <!-- Employees Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('employees.*') ? 'active' : ''); ?>" data-toggle="collapse"
            href="#collapseEmployees" aria-expanded="false" aria-controls="collapseEmployees">
            <i class="fa-solid fa-user-group"></i>
            <span>Employees Section</span>
        </a>
        <div id="collapseEmployees" class="collapse <?php echo e(request()->routeIs('employees.*') ? 'show' : ''); ?>"
            aria-labelledby="headingEmployees" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo e(request()->routeIs('employees.create') ? 'active' : ''); ?>"
                    href="<?php echo e(route('employees.create')); ?>">Add New</a>
                <a class="collapse-item <?php echo e(request()->routeIs('employees.index') ? 'active' : ''); ?>"
                    href="<?php echo e(route('employees.index')); ?>">All Employees</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Department Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('departments.*') ? 'active' : ''); ?>" data-toggle="collapse"
            href="#collapsedepartments" aria-expanded="false" aria-controls="collapseDepartments">
            <i class="fa-solid fa-user-group"></i>
            <span>Department Section</span>
        </a>
        <div id="collapsedepartments" class="collapse <?php echo e(request()->routeIs('departments.*') ? 'show' : ''); ?>"
            aria-labelledby="headingEmployees" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo e(request()->routeIs('departments.create') ? 'active' : ''); ?>"
                    href="<?php echo e(route('departments.create')); ?>">Add New</a>
                <a class="collapse-item <?php echo e(request()->routeIs('departments.index') ? 'active' : ''); ?>"
                    href="<?php echo e(route('departments.index')); ?>">All Departments</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Leave Request Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link " data-toggle="collapse" href="#collapseLeaveRequest" aria-expanded="false"
            aria-controls="collapseLeaveRequest">
            <i class="fa-solid fa-heart"></i>
            <span>Leave Type</span>
        </a>
        <div id="collapseLeaveRequest" class="collapse " aria-labelledby="headingLeaveRequest"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php echo e(request()->routeIs('leave-types.create') ? 'active' : ''); ?>"
                    href="<?php echo e(route('leave-types.create')); ?>">Add New</a>
                <a class="collapse-item <?php echo e(request()->routeIs('leave-types.index') ? 'active' : ''); ?> "
                    href="<?php echo e(route('leave-types.index')); ?>">Leave Types </a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <!-- Leave Balance Menu -->
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#collapseLeaveBalance" aria-expanded="false"
        aria-controls="collapseLeaveBalance">
        <i class="fas fa-balance-scale"></i>
        <span>Leave Balance</span>
    </a>
    <div id="collapseLeaveBalance" class="collapse" aria-labelledby="headingLeaveBalance"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php echo e(request()->routeIs('leave-balance.create') ? 'active' : ''); ?>"
                href="<?php echo e(route('leave-balance.create')); ?>">Add Balance</a>
            <a class="collapse-item <?php echo e(request()->routeIs('leave-balance.index') ? 'active' : ''); ?>"
                href="<?php echo e(route('leave-balance.index')); ?>">View Balances</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">


  <!-- Nav Item - Manage Leave Dropdown -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="leaveDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-table"></i>
        <span>Manage Leave</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="leaveDropdown">
        <a class="dropdown-item" href="<?php echo e(route('admin.leave-requests.index', ['status' => 'pending'])); ?>">
            <i class="fas fa-clock"></i> Pending
        </a>
        <a class="dropdown-item" href="<?php echo e(route('admin.leave-requests.index', ['status' => 'approved'])); ?>">
            <i class="fas fa-check-circle"></i> Approved
        </a>
        <a class="dropdown-item" href="<?php echo e(route('admin.leave-requests.index', ['status' => 'rejected'])); ?>">
            <i class="fas fa-times-circle"></i> Declined
        </a>
        <a class="dropdown-item" href="<?php echo e(route('admin.leave-requests.index')); ?>">
            <i class="fas fa-history"></i> Leave History
        </a>
    </div>
</li>


<hr class="sidebar-divider">


    <!-- Admin Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->is('admin/admins') ? 'active' : ''); ?>" href="<?php echo e(route('admin.admins')); ?>">
            <i class="fa-solid fa-user-group"></i>
            <span>Manage Admins</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('reports.leave-requests')); ?>">
            <i class="fas fa-chart-pie"></i> Reports
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<?php /**PATH C:\xampp - Copy\htdocs\ELMS-main\resources\views/LEMS/admin/partials/sidebar.blade.php ENDPATH**/ ?>