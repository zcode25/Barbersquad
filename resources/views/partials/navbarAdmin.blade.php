<nav class="navbar navbar-dark bg-primary sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/admin/booking">Barbersquad</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-primary" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Barbersquad</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/booking*') ? 'active' : '' }}" href="/admin/booking">Booking</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('admin/transaction*') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Transaction
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="/admin/transaction">Transaction</a>
              </li>
              <li>
                <a class="dropdown-item" href="/admin/transaction/report">Transaction Report</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/service*') ? 'active' : '' }}" href="/admin/service">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/barberman*') ? 'active' : '' }}" href="/admin/barberman">Barberman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/customer*') ? 'active' : '' }}" href="/admin/customer">Customer</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-light">
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>           
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>