<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item logo-1">
                    <a class="nav-link" href="{{ route('leave-requests.index') }}">ElMS</a>
                </li>
            </ul>

            <!-- Right-aligned links -->
            <ul class="navbar-nav ms-auto"> <!-- Add ms-auto here to align items to the right -->
                <li class="nav-item links">
                    <a class="nav-link" href="{{ route('leave-requests.create') }}">Submit Request</a>
                </li>
                <!-- مثال في النافبار -->
                <li class="nav-item links">
                    <a class="nav-link" href="{{ route('leave-history') }}">Leave History</a>
                </li>
                <li class="nav-item links">
                    <a class="nav-link" href="{{ route('messages.create') }}">Contact Admin</a>
                </li>

                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        onclick="markNotificationsAsRead()">
                        <i class="fas fa-bell fa-fw"></i>
                        <span id="notification-count" class="badge badge-danger badge-counter">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    </a>
                    <!-- قائمة الإشعارات -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">Alerts Center</h6>
                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <div class="dropdown-item d-flex align-items-start">
                                <div>
                                    <p class="mb-1">
                                        Your leave request #{{ $notification->data['leave_request_id'] }}
                                        has been <strong>{{ $notification->data['status'] }}</strong>.
                                    </p>
                                    @if (isset($notification->data['reason']) && $notification->data['status'] === 'rejected')
                                        <p class="text-danger mb-1">Reason: {{ $notification->data['reason'] }}</p>
                                    @endif
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @empty
                            <div class="dropdown-item text-center">
                                <p>No new notifications.</p>
                            </div>
                        @endforelse
                    </div>
                </li>


                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
     <!-- تأكد من تحميل المكتبات التالية -->
                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Bootstrap JS -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

</nav>
