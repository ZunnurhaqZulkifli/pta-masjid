<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0"
          name="viewport">
    <meta content="ie=edge"
          http-equiv="X-UA-Compatible">

    <link crossorigin="anonymous"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
          rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/react/umd/react.production.min.js"
            crossorigin></script>

    <script src="https://cdn.jsdelivr.net/npm/react-dom/umd/react-dom.production.min.js"
            crossorigin></script>

    <script src="https://cdn.jsdelivr.net/npm/react-bootstrap@next/dist/react-bootstrap.min.js"
            crossorigin></script>

    <link crossorigin="anonymous"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">


    <script>
        var Alert = ReactBootstrap.Alert;
    </script>

    <title>PTA Masjid</title>

    @if(request()->route()->getName() == 'dashboard')
        @viteReactRefresh
        @vite(['resources/js/app.jsx', 'resources/css/app.css'])
        @inertiaHead
    @endif
</head>

<style>
    .card {
        border-radius: 0px;
    }

    .btn-primary {
        border-radius: 0px;
        background-origin: padding-box;
        background-color: rgb(0, 71, 165)
    }

    .icon {
        background-color: rgb(0, 71, 165)
    }

    .footer-custom {
        background-color: rgb(77, 0, 165) height: 35px;
    }

    .badge {
        border-radius: 2px
    }
</style>

<body>
    <div class="row">

        @if(Auth::check()) 
            @include('nav_bar') 
            
            @else
            @include('nav_bar_public') 
        @endif
    
        <div class="col-lg-10 col-md-9 col-12">
            <div class="container-fluid py-4">
                <div id="top">
                    @if(request()->route()->getName() == 'dashboard')
                        @inertia
                    @else
                        @yield('content')
                    @endif
                </div>
            </div>
        </div>
    </div>    

    @if(Auth::check()) 
        @if (request()->user()->hasRole('admin'))
            <footer class="footer"
                    style="background-color: aliceblue">
                <div class="text-dark d-flex ml-2 text-left">
                    <i class="bi bi-c-circle align-self-center">
                        <a class="text-dark"
                        style="font-size: 7pt">
                            Developed By Zunnurhaq Zulkifli
                        </a>
                    </i>
                </div>
            </footer>
        @endif
    @endif

</body>

</html>
