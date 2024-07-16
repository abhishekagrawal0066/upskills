<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="bx bx-menu bx-sm"></i>
  </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  <!-- Search -->
  <div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none ps-1 ps-sm-2"
        placeholder="Search..."
        aria-label="Search..." />
    </div>
  </div>
  <!-- /Search -->

  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Place this tag where you want the button to render. -->
    <li class="nav-item lh-1 me-3">
      <a
        class="github-button"
        href="#"
        data-icon="octicon-star"
        data-size="large"
        data-show-count="true"
        aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
        >Name</a
      >
      
    </li>
    {{-- notifications --}}
    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        <i class="bx bx-bell bx-sm"></i>
        {{-- <span class="badge bg-danger rounded-pill badge-notifications">{{ auth()->user()->unreadNotifications->count() }}</span> --}}
      </a>
      <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
          <div class="dropdown-header d-flex align-items-center py-3">
            <h5 class="text-body mb-0 me-auto">Notification</h5>
            <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
          </div>
        </li>
        <li class="dropdown-notifications-list scrollable-container">
          <ul class="list-group list-group-flush">
            {{-- <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                  <p class="mb-0">Won the monthly best seller gold badge</p>
                  <small class="text-muted">1h ago</small>
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                </div>
              </div>
            </li> --}}
            {{-- @foreach (auth()->user()->unreadNotifications as $notification) --}}
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar">
                    <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                  </div>
                </div>
                <div class="flex-grow-1">
                  {{-- <small class="mb-1">Dear {{  $notification->data['applicant_name'] }}, your {{ $notification->data['company_name']}} license <a href={{route('fssai.view',$notification->data['id'])}} class="alert-link">(License Number: {{  $notification->data['license_number'] }}) </a>is expiring on {{date("d-m-Y", strtotime($notification->data['license_expiry_date'])) }}.Renew now to continue using our services hassle-free. </small> --}}
                  {{-- <p class="mb-0">Won the monthly best seller gold badge</p> --}}
                  <small class="text-muted">1h ago</small>
                  {{-- <small class="text-muted">Dear {{  $notification->data['applicant_name'] }}, your {{  $notification->data['applicant_name'] }} license <a href="{{route('fssai.view',data['id'])}}" class="alert-link">(License Number: {{  $notification->data['applicant_name'] }}) </a> is expiring on {{date("d-m-Y", strtotime($notification->data['applicant_name'])) }}.Renew now to continue using our services hassle-free.</small> --}}
                </div>
                <div class="flex-shrink-0 dropdown-notifications-actions">
                  <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                  <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                </div>
              </div>
            </li>
           
            {{-- @endforeach --}}
          </ul>
        </li>
        <li class="dropdown-menu-footer border-top p-3">
          <button class="btn btn-primary text-uppercase w-100">view all notifications</button>
        </li>
      </ul>
    </li>
    {{-- notifications --}}
    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          {{-- <img src={{ asset(auth()->user()->profile_photo ) }} alt class="w-px-40 h-auto rounded-circle" /> --}}
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="#">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img src="" alt class="w-px-40 h-auto rounded-circle" />
                  {{-- {{ asset(auth()->user()->profile_photo ) }} --}}
                </div>
              </div>
              <div class="flex-grow-1">
                <span class="fw-medium d-block">Admin</span>
                {{-- {{ auth()->user()->name }} --}}
                <small class="text-muted">Super Admin</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="">
            {{-- {{ route('profile',auth()->user()->id) }} --}}
            <i class="bx bx-user me-2"></i>
            <span class="align-middle">My Profile</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#">
            <i class="bx bx-cog me-2"></i>
            <span class="align-middle">Settings</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#">
            <span class="d-flex align-items-center align-middle">
              <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
              <span class="flex-grow-1 align-middle ms-1">Billing</span>
              <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
            </span>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bx bx-power-off me-2"></i>
            <span class="align-middle"> {{ __('Logout') }}</span>
          </a>
          {{-- <a class="dropdown-item" href="{{ route('logout') }}"> --}}
            {{-- <i class="bx bx-power-off me-2"></i>
            <span class="align-middle">Log Out</span> --}}
          {{-- </a> --}}
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
</nav>