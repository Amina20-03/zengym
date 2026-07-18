<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5" style="background-image: url('{{\Illuminate\Support\Facades\URL::asset('images/cover.jpg')}}'); background-repeat: no-repeat;">
            <div class="w-100 d-flex justify-content-center" >
                <!-- <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/boy-with-rocket-light.png" class="img-fluid" alt="Login image" width="700" data-app-dark-img="illustrations/boy-with-rocket-dark.png" data-app-light-img="illustrations/boy-with-rocket-light.png">-->
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div
            class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4"
        >
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-5">
                    <a
                        href="#"
                        class="app-brand-link gap-2"
                    >
                                <span class="app-brand-logo demo"
                                >
                                   <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" style="width:80%;">
                                </span>

                    </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Bienvenue chez ZENGYM ! 👋</h4>
                <p class="mb-4">
                    Veuillez connecter à votre compte et commencer l'aventure
                </p>

                <form method="POST" action="{{ route('login') }}" id="form-login" class="login100-form validate-form">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                            <p style="color:black; width:100%">{{ Session::get('success') }}</p><br>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label"
                        >Login</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="emaill"
                            placeholder="Entrer votre login"
                            autofocus
                        />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password"
                            >Mot de passe</label
                            >
                            <a
                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/auth/forgot-password-cover"
                            >
                                <small>Mot de passe oublié?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                            />
                            <span
                                class="input-group-text cursor-pointer"
                            ><i class="fa fa-eye"></i></span>
                        </div>
                    </div>
                    {{--                    <div class="mb-3">--}}
                    {{--                        <div class="form-check">--}}
                    {{--                            <input--}}
                    {{--                                class="form-check-input"--}}
                    {{--                                type="checkbox"--}}
                    {{--                                id="remember-me"--}}
                    {{--                            />--}}
                    {{--                            <label--}}
                    {{--                                class="form-check-label"--}}
                    {{--                                for="remember-me"--}}
                    {{--                            >--}}
                    {{--                                Remember Me--}}
                    {{--                            </label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <button class="btn btn-primary d-grid w-100">
                        Se connecter
                    </button>
                </form>

                <p class="text-center">
                    <span>Nouveau sur notre plateforme ?</span>
                    <a
                        href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/auth/register-cover"
                    >
                        <span>Créer un compte</span>
                    </a>
                </p>

                {{--                <div class="divider my-4">--}}
                {{--                    <div class="divider-text">or</div>--}}
                {{--                </div>--}}

                {{--                <div class="d-flex justify-content-center">--}}
                {{--                    <a--}}
                {{--                        href="javascript:;"--}}
                {{--                        class="btn btn-icon btn-label-facebook me-3"--}}
                {{--                    >--}}
                {{--                        <i class="tf-icons bx bxl-facebook"></i>--}}
                {{--                    </a>--}}

                {{--                    <a--}}
                {{--                        href="javascript:;"--}}
                {{--                        class="btn btn-icon btn-label-google-plus me-3"--}}
                {{--                    >--}}
                {{--                        <i class="tf-icons bx bxl-google-plus"></i>--}}
                {{--                    </a>--}}

                {{--                    <a--}}
                {{--                        href="javascript:;"--}}
                {{--                        class="btn btn-icon btn-label-twitter"--}}
                {{--                    >--}}
                {{--                        <i class="tf-icons bx bxl-twitter"></i>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
