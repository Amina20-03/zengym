<!doctype html>

<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-wide layout-navbar-fixed layout-menu-fixed"
    dir="{{ __('content.layout') }}"
    data-theme="theme-default"
    data-assets-path="{{\Illuminate\Support\Facades\URL::asset('/assets/')}}"
    data-framework="laravel"
    data-template="vertical-menu-theme-default-light"
>
<head>
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>
        ZENGYM
    </title>
    <meta
        name="description"
        content="ZENGYMHEALTH est une plateforme innovante dédiée au sport santé, combinant exercices physiques, bien-être mental et résultats prouvés scientifiquement."
    />
    <meta
        name="keywords"
        content=""
    />
    <!-- laravel CRUD token -->
{{--    <meta--}}
{{--        name="csrf-token"--}}
{{--        content="q9ILEWFI6fKzCA17xY97vseU9fV4svS8gnIS0Hq2"--}}
{{--    />--}}

    <!-- Favicon -->
    <link
        rel="icon"
        type="image/x-icon"
        href="{{\Illuminate\Support\Facades\URL::asset('icons/favicon.ico')}}"
    />

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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/template-customizer.js')}}"></script>
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
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}"
    />

    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/select2/select2.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"
    />
{{--    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/select2/select2.css" />--}}
{{--    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />--}}
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}">

    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/animate-css/animate.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}"
    />
    <!-- Page Styles -->
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/pages/page-user-view.css')}}"
    />
    <script src="https://cdn.jsdelivr.net/npm/date-fns@2.27.0/index.min.js"></script>

    {{--    <link--}}
{{--        rel="stylesheet"--}}
{{--        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/quill/typography.css')}}"--}}
{{--    />--}}
{{--    <link--}}
{{--        rel="stylesheet"--}}
{{--        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/quill/katex.css')}}"--}}
{{--    />--}}
{{--    <link--}}
{{--        rel="stylesheet"--}}
{{--        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/quill/editor.css')}}"--}}
{{--    />--}}
    <style>
        .avatar2 {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .disabled-div {
            pointer-events: none;
            opacity: 0.5; /* You can adjust the opacity to visually indicate that the div is disabled */
        }
    </style>
</head>
<body>
<!-- Authentication Links -->
@guest
{{--    @if (Route::has('login'))--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--        </li>--}}
{{--    @endif--}}

{{--    @if (Route::has('register'))--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--        </li>--}}
{{--    @endif--}}
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest
{{--    <div id="app">--}}


{{--        <main class="py-4">--}}
            @yield('content')
{{--        </main>--}}
{{--    </div>--}}



    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/jquery/jquery_0f7eb1f3a93e3e19e8505fd8c175925a.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/popper/popper_baf82d96b7771efbcc05c3b77135d24c.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/bootstrap_4648227467e3fd3f4cf976cfb0e43aea.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar_44b8e955848dc0c56597c09f6aebf89a.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/hammer/hammer_0a520e103384b609e3c9eb3b732d1be8.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/typeahead-js/typeahead_f6bda588c16867a6cc4158cb4ed37ec6.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/menu_c6ce30ded4234d0c4ca0fb5f2a2990d8.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/main_6bea3f2e092d5fe7327c226f3242f31b.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/dashboards-analytics.js')}}"></script>


    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    {{--<script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>--}}
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/forms-selects.js')}}"></script>
{{--    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/select2/select2.js"></script>--}}
{{--    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>--}}
{{--    <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/forms-selects.js"></script>--}}
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

{{--    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/quill/katex.js')}}"></script>--}}
{{--    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/quill/quill.js')}}"></script>--}}
{{--    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/forms-editors.js')}}"></script>--}}
    <script>
        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }
    </script>
    @yield('datatable')

    <script type="text/javascript">

        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });



    </script>
</body>
</html>
