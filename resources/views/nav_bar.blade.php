@php
    use Illuminate\Support\Facades\Auth;
    // dd(request()->route()->getName());
@endphp

<style>
    .sidebar {
        flex-shrink: 0;
        min-height: 120vh;
        overflow-y: auto;
    }
</style>

<div class="col-lg-2 col-md-3 col-12">
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white shadow-sm"
         style="background-color:rgb(239, 187, 0)">
        <a class="d-flex align-items-center mb-md-0 me-md-auto text-decoration-none mb-3 text-white"
           href="/">
            <div class="row justify-content-center">
                <div class="col-2">
                    <i class="bi bi-moon"></i>
                </div>
                <div class="col-10">
                    <div class="fs-6 fw-bold"> PTA Masjid</div>
                </div>
            </div>
        </a>
        <hr class="border-secondary">
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="" class="nav-link text-white">
                    Menu Utama
                </a>
            </li>

            <li class="nav-item">
                <a aria-current="page"
                   class="nav-link {{ request()->route()->getName() == 'dashboard' ? 'active bg-gradient' : '' }} text-white"
                   href="/">
                    <svg class="bi me-2"
                         height="16"
                         width="16">
                        {{-- <use xlink:href="#home" /> --}}
                    </svg>
                    Utama
                </a>
            </li>
            <li>
                <a class="nav-link {{ request()->route()->getName() == 'payments.create' ? 'active bg-gradient' : 'text-white' }}"
                   href="{{ route('payments.create') }}">
                    <svg class="bi me-2"
                         height="16"
                         width="16">
                        {{-- <use xlink:href="#table" /> --}}
                    </svg>
                    Bayar
                </a>
            </li>
            <li>
                <a class="nav-link {{ request()->route()->getName() == 'statistics' ? 'active bg-gradient' : 'text-white' }}"
                   href="{{ route('statistics') }}">
                    <svg class="bi me-2"
                         height="16"
                         width="16">
                        {{-- <use xlink:href="#grid" /> --}}
                    </svg>
                    Statistik
                </a>
            </li>

            @if (Auth::check())
                @if (Auth::user()->hasRole('admin'))
                    <li>
                        <hr class="divider">
                        <a href="" class="nav-link text-white">
                            Data Sistem ( Admin )
                        </a>
                    </li>

                    <li>
                        <a class="nav-link {{ request()->route()->getName() == 'users.index' ? 'active bg-gradient' : 'text-white' }}"
                           href="{{ route('users.index') }}">
                            <svg class="bi me-2"
                                 height="16"
                                 width="16">
                            </svg>
                            Pengguna
                        </a>
                    </li>

                    <li>
                        <a class="nav-link {{ request()->route()->getName() == 'payments.index' ? 'active bg-gradient' : 'text-white' }}"
                           href="{{ route('payments.index') }}">
                            <svg class="bi me-2"
                                 height="16"
                                 width="16">
                            </svg>
                            Bayaran
                        </a>
                    </li>

                    <li>
                        <a class="nav-link {{ request()->route()->getName() == 'transactions.index' ? 'active bg-gradient' : 'text-white' }}"
                           href="{{ route('transactions.index') }}">
                            <svg class="bi me-2"
                                 height="16"
                                 width="16">
                            </svg>
                            Transaksi
                        </a>
                    </li>

                    <li>
                        <a class="nav-link {{ request()->route()->getName() == 'projects.index' ? 'active bg-gradient' : 'text-white' }}"
                           href="{{ route('projects.index') }}">
                            <svg class="bi me-2"
                                 height="16"
                                 width="16">
                            </svg>
                            Project
                        </a>
                    </li>
                @endif
            @endif
        </ul>
        <hr class="border-secondary">

        @if (Auth::check())
            <div class="dropdown">
                <a aria-expanded="false"
                   class="d-flex align-items-center text-decoration-none dropdown-toggle text-white"
                   data-bs-toggle="dropdown"
                   href="#"
                   id="dropdownUser1">
                    <img alt=""
                         class="rounded-circle me-2 shadow"
                         height="32"
                         src="https://github.com/mdo.png"
                         width="32">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
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

                    <form action="{{ route('logout') }}"
                          method="POST">
                        @csrf
                        <li><button class="btn btn-sm text-light">Sign out</button></li>
                    </form>
                </ul>
            </div>
        @else
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none text-white"
                   href="{{ route('login') }}">
                    <strong>Login</strong>
                </a>
            </div>
        @endIf
    </div>
</div>
