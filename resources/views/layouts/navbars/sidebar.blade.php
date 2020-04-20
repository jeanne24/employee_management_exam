<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a class="simple-text logo-normal">
      {{ __('EM Systems') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Manage Companies' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('company') }}">
          <i class="material-icons">account_balance</i>
            <p>{{'Company List'}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Manage Employees' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('employee') }}">
          <i class="material-icons">content_paste</i>
            <p>{{'Employee List'}}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">face</i>
          <span class="sidebar-normal">{{ __('User profile') }} </span>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Manage Users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">supervisor_account</i>
          <span class="sidebar-normal"> {{ __('User Management') }} </span>
        </a>
      </li>
    </ul>
  </div>
</div>