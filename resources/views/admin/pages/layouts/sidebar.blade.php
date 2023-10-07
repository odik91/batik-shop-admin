<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
  <div class="sidebar-header d-flex align-items-center justify-content-start">
    <a href="#" class="navbar-brand">
      <!--Logo start-->
      <!--logo End-->

      <!--Logo start-->
      <div class="logo-main">
        <div class="logo-normal">
          <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
              transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
            <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
              transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
              transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
              transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
          </svg>
        </div>
        <div class="logo-mini">
          <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
              transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
            <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
              transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
              transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
              transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
          </svg>
        </div>
      </div>
      <!--logo End-->

      <h4 class="logo-title">Admin Batikmu</h4>
    </a>
    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
      <i class="icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round"></path>
          <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
            stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </i>
    </div>
  </div>
  <div class="sidebar-body pt-0 data-scrollbar">
    <div class="sidebar-list">
      <!-- Sidebar Menu Start -->
      <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
        <li class="nav-item static-item">
          <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Home</span>
            <span class="mini-icon">-</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ strtolower($title) == 'dashboard' ? 'active' : '' }}" aria-current="page"
            href="{{ route('admin.home') }}">
            <i class="icon">
              <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="icon-20">
                <path opacity="0.4"
                  d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                  fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                  fill="currentColor"></path>
              </svg>
            </i>
            <span class="item-name">Dashboard</span>
          </a>
        </li>
        <li>
          <hr class="hr-horizontal">
        </li>

        <li class="nav-item static-item">
          <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Produk</span>
            <span class="mini-icon">-</span>
          </a>
        </li>

        {{-- pengaturan --}}
        <li class="nav-item">
          <a class="nav-link {{ isset($parent) && $parent === 'pengaturan' ? '' : 'collapse' }}" data-bs-toggle="collapse" href="#sidebar-pengaturan" role="button"
            aria-expanded="{{ isset($parent) && $parent === 'pengaturan' ? 'true' : 'false' }}"
            aria-controls="sidebar-pengaturan">
            <i class="icon">
              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M12.0122 14.8299C10.4077 14.8299 9.10986 13.5799 9.10986 12.0099C9.10986 10.4399 10.4077 9.17993 12.0122 9.17993C13.6167 9.17993 14.8839 10.4399 14.8839 12.0099C14.8839 13.5799 13.6167 14.8299 12.0122 14.8299Z"
                  fill="currentColor"></path>
                <path opacity="0.4"
                  d="M21.2301 14.37C21.036 14.07 20.76 13.77 20.4023 13.58C20.1162 13.44 19.9322 13.21 19.7687 12.94C19.2475 12.08 19.5541 10.95 20.4228 10.44C21.4447 9.87 21.7718 8.6 21.179 7.61L20.4943 6.43C19.9118 5.44 18.6344 5.09 17.6226 5.67C16.7233 6.15 15.5685 5.83 15.0473 4.98C14.8838 4.7 14.7918 4.4 14.8122 4.1C14.8429 3.71 14.7203 3.34 14.5363 3.04C14.1582 2.42 13.4735 2 12.7172 2H11.2763C10.5302 2.02 9.84553 2.42 9.4674 3.04C9.27323 3.34 9.16081 3.71 9.18125 4.1C9.20169 4.4 9.10972 4.7 8.9462 4.98C8.425 5.83 7.27019 6.15 6.38109 5.67C5.35913 5.09 4.09191 5.44 3.49917 6.43L2.81446 7.61C2.23194 8.6 2.55897 9.87 3.57071 10.44C4.43937 10.95 4.74596 12.08 4.23498 12.94C4.06125 13.21 3.87729 13.44 3.59115 13.58C3.24368 13.77 2.93709 14.07 2.77358 14.37C2.39546 14.99 2.4159 15.77 2.79402 16.42L3.49917 17.62C3.87729 18.26 4.58245 18.66 5.31825 18.66C5.66572 18.66 6.0745 18.56 6.40153 18.36C6.65702 18.19 6.96361 18.13 7.30085 18.13C8.31259 18.13 9.16081 18.96 9.18125 19.95C9.18125 21.1 10.1215 22 11.3069 22H12.6968C13.872 22 14.8122 21.1 14.8122 19.95C14.8429 18.96 15.6911 18.13 16.7029 18.13C17.0299 18.13 17.3365 18.19 17.6022 18.36C17.9292 18.56 18.3278 18.66 18.6855 18.66C19.411 18.66 20.1162 18.26 20.4943 17.62L21.2097 16.42C21.5776 15.75 21.6083 14.99 21.2301 14.37Z"
                  fill="currentColor"></path>
              </svg>
            </i>
            <span class="item-name">Pengaturan</span>
            <i class="right-icon">
              <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </i>
          </a>
          <ul class="sub-nav collapse {{ isset($parent) && $parent === 'pengaturan' ? 'show' : '' }}" id="sidebar-pengaturan" data-bs-parent="#sidebar-menu">
            <li class="nav-item">
              <a class="nav-link {{ request()->route()->getName() === 'admin.category' ? 'active' : '' }}" href="{{ route('admin.category') }}">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> K </i>
                <span class="item-name">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->route()->getName() === 'admin.subcategory' ? 'active' : '' }}" href="{{ route('admin.subcategory') }}">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> S </i>
                <span class="item-name">Subkategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> W </i>
                <span class="item-name">Warna</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> U </i>
                <span class="item-name">Ukuran</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> SA </i>
                <span class="item-name">Satuan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> PR </i>
                <span class="item-name">Provinsi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> K </i>
                <span class="item-name">Kabupaten/Kota</span>
              </a>
            </li>
          </ul>
        </li>
        {{-- end pengaturan --}}

        {{-- toko --}}
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-toko" role="button" aria-expanded="false"
            aria-controls="sidebar-toko">
            <i class="icon">
              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M16.71 10.0721C16.71 10.5715 17.11 10.9711 17.61 10.9711C18.11 10.9711 18.52 10.5715 18.52 10.0721C18.52 9.57263 18.11 9.16309 17.61 9.16309C17.11 9.16309 16.71 9.57263 16.71 10.0721ZM14.77 16.1054C14.06 16.8146 13.08 17.2541 12 17.2541C10.95 17.2541 9.97 16.8446 9.22 16.1054C8.48 15.3562 8.07 14.3773 8.07 13.3285C8.06 12.2896 8.47 11.3107 9.21 10.5615C9.96 9.81236 10.95 9.40282 12 9.40282C13.05 9.40282 14.04 9.81236 14.78 10.5515C15.52 11.3007 15.93 12.2896 15.93 13.3285C15.92 14.4172 15.48 15.3962 14.77 16.1054ZM12 10.9012C11.35 10.9012 10.74 11.1509 10.27 11.6204C9.81 12.0798 9.56 12.6892 9.57 13.3185V13.3285C9.57 13.9777 9.82 14.5871 10.28 15.0465C10.74 15.506 11.35 15.7558 12 15.7558C13.34 15.7558 14.42 14.667 14.43 13.3285C14.43 12.6792 14.18 12.0699 13.72 11.6104C13.26 11.1509 12.65 10.9012 12 10.9012Z"
                  fill="currentColor"></path>
                <path opacity="0.4"
                  d="M17.44 6.2364L17.34 6.01665C17.07 5.44728 16.76 4.78801 16.57 4.40844C16.11 3.50943 15.32 3.00999 14.35 3H9.64C8.67 3.00999 7.89 3.50943 7.43 4.40844C7.23 4.80799 6.89 5.52719 6.61 6.11654L6.55 6.2364C6.52 6.31632 6.44 6.35627 6.36 6.35627C3.95 6.35627 2 8.3141 2 10.7114V16.6448C2 19.0422 3.95 21 6.36 21H17.64C20.04 21 22 19.0422 22 16.6448V10.7114C22 8.3141 20.04 6.35627 17.64 6.35627C17.55 6.35627 17.48 6.30633 17.44 6.2364Z"
                  fill="currentColor"></path>
              </svg>
            </i>
            <span class="item-name">Toko</span>
            <i class="right-icon">
              <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </i>
          </a>
          <ul class="sub-nav collapse" id="sidebar-toko" data-bs-parent="#sidebar-menu">
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> P </i>
                <span class="item-name">Produk</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> O </i>
                <span class="item-name">Order</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> R </i>
                <span class="item-name">Review Produk</span>
              </a>
            </li>
          </ul>
        </li>
        {{-- end toko --}}

        {{-- pengguna --}}
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-pengguna" role="button"
            aria-expanded="false" aria-controls="sidebar-pengguna">
            <i class="icon">
              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M16.71 10.0721C16.71 10.5715 17.11 10.9711 17.61 10.9711C18.11 10.9711 18.52 10.5715 18.52 10.0721C18.52 9.57263 18.11 9.16309 17.61 9.16309C17.11 9.16309 16.71 9.57263 16.71 10.0721ZM14.77 16.1054C14.06 16.8146 13.08 17.2541 12 17.2541C10.95 17.2541 9.97 16.8446 9.22 16.1054C8.48 15.3562 8.07 14.3773 8.07 13.3285C8.06 12.2896 8.47 11.3107 9.21 10.5615C9.96 9.81236 10.95 9.40282 12 9.40282C13.05 9.40282 14.04 9.81236 14.78 10.5515C15.52 11.3007 15.93 12.2896 15.93 13.3285C15.92 14.4172 15.48 15.3962 14.77 16.1054ZM12 10.9012C11.35 10.9012 10.74 11.1509 10.27 11.6204C9.81 12.0798 9.56 12.6892 9.57 13.3185V13.3285C9.57 13.9777 9.82 14.5871 10.28 15.0465C10.74 15.506 11.35 15.7558 12 15.7558C13.34 15.7558 14.42 14.667 14.43 13.3285C14.43 12.6792 14.18 12.0699 13.72 11.6104C13.26 11.1509 12.65 10.9012 12 10.9012Z"
                  fill="currentColor"></path>
                <path opacity="0.4"
                  d="M17.44 6.2364L17.34 6.01665C17.07 5.44728 16.76 4.78801 16.57 4.40844C16.11 3.50943 15.32 3.00999 14.35 3H9.64C8.67 3.00999 7.89 3.50943 7.43 4.40844C7.23 4.80799 6.89 5.52719 6.61 6.11654L6.55 6.2364C6.52 6.31632 6.44 6.35627 6.36 6.35627C3.95 6.35627 2 8.3141 2 10.7114V16.6448C2 19.0422 3.95 21 6.36 21H17.64C20.04 21 22 19.0422 22 16.6448V10.7114C22 8.3141 20.04 6.35627 17.64 6.35627C17.55 6.35627 17.48 6.30633 17.44 6.2364Z"
                  fill="currentColor"></path>
              </svg>
            </i>
            <span class="item-name">Pengguna</span>
            <i class="right-icon">
              <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </i>
          </a>
          <ul class="sub-nav collapse" id="sidebar-pengguna" data-bs-parent="#sidebar-menu">
            <li class="nav-item">
              <a class="nav-link " href="#">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                    fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> P </i>
                <span class="item-name">Pengguna</span>
              </a>
            </li>
          </ul>
        </li>
        {{-- end pengguna --}}

      </ul>
      <!-- Sidebar Menu End -->
    </div>
  </div>
  <div class="sidebar-footer"></div>
</aside>
