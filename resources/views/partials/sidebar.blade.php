<nav class="side-navbar z-index-40">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded" src="{{ asset('img/user-profiles.png') }}" alt="...">
      <div class="ms-3 title">
        <h1 class="h4 mb-2">{{ auth()->user()->name }}</h1>
        <p class="text-sm text-gray-500 fw-light mb-0 lh-1">{{ auth()->user()->level_name }}</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
    <ul class="list-unstyled py-4">
      <li class="sidebar-item {{ ($tittle === "Home" ? 'active' : '') }}"><a class="sidebar-link" href="/dashboard"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#real-estate-1"> </use>
          </svg>Home</a></li>

          @can('GateAdmin')
          <li class="sidebar-item {{ ($tittle === "Kelola Admin" || $tittle === 'Kelola Kasir' ? 'active' : '') }}"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#chart-1"> </use>
            </svg>Kelola Data </a>
          <ul class="collapse list-unstyled " id="exampledropdownDropdown">
            <li class="sidebar item {{ ($tittle === "Kelola Kasir" ? 'active' : '') }}">
              <a class="sidebar-link" href="/kelolaKasir"><svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#user-1"></use>
              </svg> Kasir </a>
            </li>
            <li class="sidebar item {{ ($tittle === "Kelola Admin" ? 'active' : '') }}">
              <a class="sidebar-link" href="/kelolaAdmin"><svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#user-details-1"></use>
              </svg> Admin </a>
            </li>
          </ul>
        </li>
        @endcan

      <li class="sidebar-item {{ ($tittle === "Kelola Laptop" ? 'active' : '') }}"><a class="sidebar-link" href="/kelolaLaptop"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#laptop-screen-1"> </use>
          </svg>Laptop </a>
      </li>
      <li class="sidebar-item {{ ($tittle === "Kelola Stok" ? 'active' : '') }}"><a class="sidebar-link" href="/kelolaStok"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#numbers-1"> </use>
          </svg>Stok </a>
      </li>
      <li class="sidebar-item {{ ($tittle === "Kelola Pelangan" ? 'active' : '') }}"><a class="sidebar-link" href="/kelolaPelanggan"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#user-details-1"> </use>
          </svg>Pelanggan </a>
      </li>
      {{-- <li class="sidebar-item {{ ($tittle === "Invoice" ? 'active' : '') }}"><a class="sidebar-link" href="/invoice"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#paper-bag-1"> </use>
          </svg>Invoice</a>
      </li> --}}
      <li class="sidebar-item {{ ($tittle === "Invoice" ? 'active' : '') }}"><a class="sidebar-link" href="/order"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#paper-bag-1"> </use>
          </svg>Order</a>
      </li>
    </ul>
</nav>