<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{\Illuminate\Support\Facades\URL::asset('/assets/')}}"
    data-framework="laravel"
    data-template="blank-menu-theme-default-light"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>
        Login - ZENGYM
    </title>
    <meta
        name="description"
        content=""
    />
    <meta
        name="keywords"
        content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5"
    />
    <!-- laravel CRUD token -->
    <meta
        name="csrf-token"
        content="X0oYJluPGjzSfICvD4NyMyDSbkIrIqE4QU1UzOER"
    />
    <!-- Canonical SEO -->

    <!-- Favicon -->
    <link
        rel="icon"
        type="image/x-icon"
        href="{{\Illuminate\Support\Facades\URL::asset('icons/favicon.ico')}}"
    />

    <!-- Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Include Styles -->
    <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/fonts/boxicons_87122b3a3900320673311cebdeb618da.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/fonts/fontawesome_a2997cb6a1c98cc3c85f4c99cdea95b5.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/fonts/flag-icons_121bcc3078c6c2f608037fb9ca8bce8d.css')}}"
    />
    <!-- Core CSS -->
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/core_55b2a9dfaa009c41df62ca8d16e913a8.css')}}"
        class="template-customizer-core-css"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/theme-default_9182924a7b965439eca5e189ba43eba1.css')}}"
        class="template-customizer-theme-css"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/css/demo_69dfc5e48fce5a4ff55ff7b593cdf93d.css')}}"
    />
    <!-- Vendors CSS -->
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar_73d641bb8db2475ecafc6c68461ed01b.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/typeahead-js/typeahead_de339ead5e9c9e36f12e46cbef7aaffd.css')}}"
    />

    <!-- Vendor Styles -->
    <!-- Vendor -->
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}"
    />

    <!-- Page Styles -->
    <!-- Page -->
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/pages/page-auth.css')}}"
    />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
    <!-- laravel style -->
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/helpers.js')}}"></script>
    <!-- beautify ignore:start -->
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/template-customizer.js')}}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/config.js')}}"></script>

    <script>
        window.templateCustomizer = new TemplateCustomizer({
            cssPath: '',
            themesPath: '',
            defaultStyle: "light",
            defaultShowDropdownOnHover: "true", // true/false (for horizontal layout only)
            displayCustomizer: "true",
            lang: 'en',
            pathResolver: function(path) {
                var resolvedPaths = {
                    // Core stylesheets
                    'core.css': '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/core_55b2a9dfaa009c41df62ca8d16e913a8.css')}}',
                    'core-dark.css': '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/core-dark_d98ae2a03b5b1b05651411ee58ef81a6.css')}}',

                    // Themes
                    'theme-default.css': '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/theme-default_9182924a7b965439eca5e189ba43eba1.css')}}',
                    'theme-default-dark.css':
                        '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/theme-default-dark_ae30991ef3f62e7c03ca6f8930843e80.css')}}',
                    'theme-bordered.css': '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/theme-bordered_a4f95a927b1e2bcdfd57a3bbfb2bd3d9.css')}}',
                    'theme-bordered-dark.css':
                        '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/theme-bordered-dark_2a668deb480284f975db82d0a7277156.css')}}',
                    'theme-semi-dark.css': '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/theme-semi-dark_9c02fb39c47f91b2d198f343fa8b4df7.css')}}',
                    'theme-semi-dark-dark.css':
                        '{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/rtl/theme-semi-dark-dark_c4b1950a14ffd431f752917b97a0ee51.css')}}',
                }
                return resolvedPaths[path] || path;
            },
            'controls': ["rtl","style","headerType","contentLayout","layoutCollapsed","layoutNavbarOptions","themes"],
        });
    </script>
</head>

<body>
<!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
<noscript
><iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP"
        height="0"
        width="0"
        style="display: none; visibility: hidden"
    ></iframe
    ></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Layout Content -->

<!-- Content -->
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

<!--/ Content -->

<!--/ Layout Content -->



<!-- Include Scripts -->
<!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
<!-- BEGIN: Vendor JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/jquery/jquery_0f7eb1f3a93e3e19e8505fd8c175925a.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/popper/popper_baf82d96b7771efbcc05c3b77135d24c.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/bootstrap_4648227467e3fd3f4cf976cfb0e43aea.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar_44b8e955848dc0c56597c09f6aebf89a.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/hammer/hammer_0a520e103384b609e3c9eb3b732d1be8.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/typeahead-js/typeahead_f6bda588c16867a6cc4158cb4ed37ec6.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/menu_c6ce30ded4234d0c4ca0fb5f2a2990d8.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/main_6bea3f2e092d5fe7327c226f3242f31b.js')}}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/pages-auth.js')}}"></script>
<!-- END: Page JS-->
</body>
</html>
