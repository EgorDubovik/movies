<div class="dropdown  d-flex notifications">
    <a class="nav-link icon" data-bs-toggle="dropdown"><i
            class="fe fe-bell"></i>
        @if(!Auth::user()->unreadNotifications->isEmpty())
            <span class=" pulse"></span>
        @endif
    </a>

    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <div class="drop-heading border-bottom">
            <div class="d-flex">
                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Notifications
                </h6>
            </div>
        </div>
        <div class="notifications-menu">
            @forelse(Auth::user()->unreadNotifications as $notification)

                <a class="dropdown-item d-flex" href="/notifications/read/{{$notification->id}}">
                    <div class="me-3 notifyimg  bg-{{$notification->data['color']}} brround box-shadow-primary">
                        <i class="{{$notification->data['icon']}}"></i>
                    </div>
                    <div class="mt-1 wd-80p">
                        <h5 class="notification-label mb-1">{{$notification->data['subject']}}
                        </h5>
                        <span class="notification-subtext">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                    </div>
                </a>
            @empty
                <p class="text-center p-3 text-muted">No notification</p>
            @endforelse


        </div>
        <div class="dropdown-divider m-0"></div>
        <a href="/notifications/"
           class="dropdown-item text-center p-3 text-muted">View all
            Notification</a>
    </div>

</div>

<!-- NOTIFICATIONS -->
