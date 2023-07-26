<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login - Sistem Absensi Damkar </title>
    <!-- CSS files -->
    <link href="{{ asset('assetsAdmin') }}/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('assetsAdmin') }}/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('assetsAdmin') }}/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('assetsAdmin') }}/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('assetsAdmin') }}/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="container-xl">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="container text-center">
                                <img src="{{ asset('assets/img/logos.png') }}" width="300px" alt="">
                            </div>
                        </div>
                        <h3 class="text-center"><b>Login Absensi Damkar</b></h3>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('proseslogin') }}">
                @csrf
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="username"
                                    autofocus placeholder="Username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-lock-open" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                                        </path>
                                        <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        <path d="M8 11v-5a4 4 0 0 1 8 0"></path>
                                    </svg>
                                </span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}" required autocomplete="password"
                                    autofocus placeholder="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
