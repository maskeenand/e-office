<!DOCTYPE html>
<html lang="en">

@include('ekuitas.head')

<body class="bg-gradient-dark">

    <div class="container-md">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form action="{{ route('login.action') }}" method="POST" class="user">
                                        @csrf
                                        @if ($errors->any())
                                          <div class="alert alert-danger">
                                              <ul>
                                                @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                                @endforeach
                                              </ul>
                                          </div>
                                        @endif
                                        <div class="form-group">
                                          <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                          <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                          <div class="custom-control custom-checkbox small">
                                            <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                              Me</label>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block btn-user">Login</button>
                                      </form>
                                      <hr>
                                      <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @include('ekuitas.javascript')


</body>

</html>
