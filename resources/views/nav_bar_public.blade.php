@php
  use Illuminate\Support\Facades\Auth;   
@endphp

<div class="col-lg-2 col-md-3 col-12">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white shadow-sm"
       style="min-height: 100vh; width: 100%; background-color:rgb(239, 187, 0)">
      <a class="d-flex align-items-center mb-md-0 me-md-auto text-decoration-none mb-3 text-white"
         href="/">

         <div class="p-1">
            <i class="bi bi-moon"></i>
            <span class="fs-6 fw-bold"> PTA Masjid</span>
        </div>
      </a>
      <hr class="border-secondary">
      <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
              <a aria-current="page"
                 class="nav-link active bg-gradient"
                 href="#">
                  <svg class="bi me-2"
                       height="16"
                       width="16">
                      {{-- <use xlink:href="#home" /> --}}
                  </svg>
                  Home
              </a>
          </li>
          <li>
              <a class="nav-link text-white"
                 href="#">
                  <svg class="bi me-2"
                       height="16"
                       width="16">
                      {{-- <use xlink:href="#speedometer2" /> --}}
                  </svg>
                  Analytics
              </a>
          </li>
          <li>
              <a class="nav-link text-white"
                 href="#">
                  <svg class="bi me-2"
                       height="16"
                       width="16">
                      {{-- <use xlink:href="#table" /> --}}
                  </svg>
                  Projects
              </a>
          </li>
      </ul>
      <hr class="border-secondary">
      <div class="dropdown">
          <!-- <a aria-expanded="false"
             class="d-flex align-items-center text-decoration-none dropdown-toggle text-white"
             data-bs-toggle="dropdown"
             href="#"
             id="dropdownUser1">
              <img alt=""
                   class="rounded-circle me-2 shadow"
                   height="32"
                   src="https://github.com/mdo.png"
                   width="32">
          </a> -->
          <ul aria-labelledby="dropdownUser1"
              class="dropdown-menu dropdown-menu-dark text-small shadow-sm">
              <li><a class="dropdown-item"
                     href="#">New project...</a></li>
              <li><a class="dropdown-item"
                     href="#">Settings</a></li>
              <li><a class="dropdown-item"
                     href="#">Profile</a></li>
              <li>
                  <hr class="dropdown-divider">
              </li>
          </ul>
      </div>
  </div>
</div>