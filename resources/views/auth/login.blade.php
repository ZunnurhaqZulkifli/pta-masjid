@extends('app')

@section('content')
    <div class="vh-100">
        <div class="h-100 container py-4">
          <div class="h-25">
              <h1 class="text-left">Sistem PTA Masjid</h1>
          </div>
            <div class="row">
                <div class="col-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4"
                             data-mdb-input-init>
                            <input class="form-control form-control-lg"
                                   id="form1Example13"
                                   name="email"
                                   type="email" />
                            <label class="form-label"
                                   for="form1Example13">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4"
                             data-mdb-input-init>
                            <input class="form-control form-control-lg"
                                   id="form1Example23"
                                   name="password"
                                   type="password" />
                            <label class="form-label"
                                   for="form1Example23">Password</label>
                        </div>

                        <div class="d-flex justify-content-around mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input checked
                                       class="form-check-input"
                                       id="form1Example3"
                                       type="checkbox"
                                       value="" />
                                <label class="form-check-label"
                                       for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block"
                                type="submit">Sign in
                        </button>
                    </form>
                </div>

                <div class="col-4">
                  <img src="{{ asset('storage/images/login.jpg') }}" class="ms-4 w-100">
                </div>
            </div>
        </div>
    </div>
@endsection