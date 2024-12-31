  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    @yield('search')
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- زر الإشعارات -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="markNotificationsAsRead()">
             <i class="fas fa-bell fa-fw"></i>
             <span id="notification-count" class="badge badge-danger badge-counter">
                 {{ auth()->user()->unreadNotifications->count() }}
             </span>
         </a>
            <!-- قائمة الإشعارات -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">Alerts Center</h6>
                @foreach (auth()->user()->unreadNotifications as $notification)
                @if (isset($notification->data['name']))
                    <div class="dropdown-item">
                        <p><strong>{{ $notification->data['name'] }}</strong> has submitted a leave request.</p>
                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                @else
                    <div class="dropdown-item">
                        <p>Notification data is missing.</p>
                    </div>
                @endif
            @endforeach

            </div>
        </li>



      {{-- <!-- Dropdown - Messages -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
        Message Center
    </h6> --}}
{{--
    @foreach ($messages as $message)
    <a class="dropdown-item d-flex align-items-center" href="{{ route('messages.show', $message->id) }}">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
            <div class="status-indicator {{ $message->status == 'unread' ? 'bg-success' : '' }}"></div>
        </div>
        <div class="font-weight-bold">
            <div class="text-truncate">{{ $message->message }}</div>
            <div class="small text-gray-500">{{ $message->created_at->diffForHumans() }}</div>
        </div>
    </a>
    @endforeach

    <a class="dropdown-item text-center small text-gray-500" href="{{ route('messages.index') }}">Read More Messages</a>
</div> --}}

        <div class="topbar-divider d-none d-sm-block"></div>
<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
<img class="img-profile rounded-circle"
src="{{ Auth::user()->profile_photo_url ?: 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}">
</a>
<!-- Dropdown - User Information -->
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
aria-labelledby="userDropdown">
<!-- Update profile link -->
<a class="dropdown-item" href="{{ route('profile.edit') }}">
<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
Profile
</a>
<!-- Settings link -->
<a class="dropdown-item" href="{{ route('settings') }}">
<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
Settings
</a>
<a class="dropdown-item" href="#">
<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
Activity Log
</a>
<div class="dropdown-divider"></div>
<form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
@csrf
<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
<button class="dropdown-item" type="submit">Logout</button>
</form>

</div>
</li>


    </ul>

</nav>

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
