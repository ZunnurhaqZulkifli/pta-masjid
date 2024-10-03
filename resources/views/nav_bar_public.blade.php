@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="col-lg-2 col-md-3 col-12">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white shadow-sm"
         style="min-height: 100vh; width: 100%; background-color:rgb(239, 187, 0)">
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
            <li class="nav-item">
                <a class="nav-link text-white {{
                        request()->route()->getName() == 'dashboard' ? 'active bg-gradient' : ''
                    }}"
                   href="#">
                    Utama
                </a>
            </li>
            <li>
                <a class="nav-link text-white"
                   href="#">
                    Sumbangan
                </a>
            </li>
            <li>
                <a class="nav-link text-white {{
                        request()->route() == 'kutipan' ? 'active' : ''
                    }}"
                   href="#">
                    Kutipan
                </a>
            </li>
        </ul>
        <hr class="border-secondary">
        <div class="dropdown">
            <a class="d-flex align-items-center text-decoration-none text-white" href="{{ route('login') }}">
                <strong>Login</strong>
            </a>
        </div>
    </div>
</div>
