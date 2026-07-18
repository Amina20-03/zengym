<!DOCTYPE html>

<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed"
    dir="{{ __('content.layout') }}"
    data-theme="theme-default"
    data-assets-path="{{\Illuminate\Support\Facades\URL::asset('/assets/')}}"
    data-framework="laravel"
    data-template="front-menu-theme-default-light"
>
<head>
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
    <!-- Canonical SEO -->

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
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/pages/front-page_6ea5e011264576f3de2d3b23d3ddd649.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/select2/select2.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"
    />
    <!-- Vendor Styles -->

    <!-- Page Styles -->
    <link
        rel="stylesheet"
        href="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/css/pages/front-page-help-center.css')}}"
    />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
    <!-- laravel style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/helpers.js')}}"></script>
    <!-- beautify ignore:start -->
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
{{--    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/template-customizer.js')}}"></script>--}}

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/front-config.js')}}"></script>

    <script>
        window.templateCustomizer = new TemplateCustomizer({
            cssPath: '',
            themesPath: '',
            defaultStyle: "light",
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
            'controls': ["rtl","style"],

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

<!-- Navbar: Start -->

<!-- Navbar: End -->









@yield('content')










<!-- Footer: Start -->
<footer class="landing-footer footer-text">
    <div class="footer-top">
        <div class="container">
            <div class="row gx-0 gy-4 g-md-5">
                <div class="col-lg-5">
                    <br>
                    <p class="footer-text footer-logo-description mb-4">
                        <?php
                        echo html_entity_decode(__('content.about_us_1'));
                        ?>
                    </p>

                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
{{--                    <h6 class="footer-title mb-4">Demos</h6>--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"--}}
{{--                                target="_blank"--}}
{{--                                class="footer-link"--}}
{{--                            >Vertical Layout</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-5"--}}
{{--                                target="_blank"--}}
{{--                                class="footer-link"--}}
{{--                            >Horizontal Layout</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-2"--}}
{{--                                target="_blank"--}}
{{--                                class="footer-link"--}}
{{--                            >Bordered Layout</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-3"--}}
{{--                                target="_blank"--}}
{{--                                class="footer-link"--}}
{{--                            >Semi Dark Layout</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-4"--}}
{{--                                target="_blank"--}}
{{--                                class="footer-link"--}}
{{--                            >Dark Layout</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
{{--                    <h6 class="footer-title mb-4">Pages</h6>--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/pricing"--}}
{{--                                class="footer-link"--}}
{{--                            >Pricing</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/payment"--}}
{{--                                class="footer-link"--}}
{{--                            >Payment<span--}}
{{--                                    class="badge rounded bg-primary ms-2 px-2"--}}
{{--                                >New</span--}}
{{--                                ></a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/checkout"--}}
{{--                                class="footer-link"--}}
{{--                            >Checkout</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/help-center"--}}
{{--                                class="footer-link"--}}
{{--                            >Help Center</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                        <li class="mb-3">--}}
{{--                            <a--}}
{{--                                href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/auth/login-cover"--}}
{{--                                target="_blank"--}}
{{--                                class="footer-link"--}}
{{--                            >Login/Register</a--}}
{{--                            >--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
                <div class="col-lg-3 col-md-4">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('images/logo.png')}}" style="width:100%;">
{{--                    <a--}}
{{--                        href="javascript:void(0);"--}}
{{--                        class="d-block footer-link mb-3 pb-2"--}}
{{--                    ><img--}}
{{--                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/apple-icon.png"--}}
{{--                            alt="apple icon"--}}
{{--                        /></a>--}}
{{--                    <a--}}
{{--                        href="javascript:void(0);"--}}
{{--                        class="d-block footer-link"--}}
{{--                    ><img--}}
{{--                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/google-play-icon.png"--}}
{{--                            alt="google play icon"--}}
{{--                        /></a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div
            class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start"
        >
            <div class="mb-2 mb-md-0">
                        <span class="footer-text"
                        >©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </span>
                <a
                    href="https://expert-dev-solutions.com"
                    target="_blank"
                    class="fw-medium text-white footer-link"
                >Expert Dev Solutions,</a
                >
                <span class="footer-text">
                            Made with ❤️.</span
                >
            </div>
            <div>

                <a
                    href="https://www.facebook.com/zenGym.cardiogym"
                    class="footer-link me-3"
                    target="_blank"
                >
                    <img
                        src="https://www.techspot.com/images2/downloads/topdownload/2015/06/facebook-lite.png"
                        alt="facebook icon"
                        style="width: 20px"
                    />
                </a>

                <a
                    href="https://www.facebook.com/zenGym.cardiogym"
                    class="footer-link me-3"
                    target="_blank"
                >
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/800px-Instagram_icon.png"
                        alt="instagram icon"
                        style="width: 20px"
                    />
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- Footer: End -->
<!--/ Layout Content -->


<!-- Include Scripts -->
<!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
<!-- BEGIN: Vendor JS-->

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/dropdown-hover.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/mega-dropdown.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/popper/popper_baf82d96b7771efbcc05c3b77135d24c.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/js/bootstrap_4648227467e3fd3f4cf976cfb0e43aea.js')}}"></script>

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/vendor/libs/jquery/jquery_0f7eb1f3a93e3e19e8505fd8c175925a.js')}}"></script>



<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/front-main_7e3beea798d1161b84cbf0934a1cd521.js')}}"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
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
<!-- END: Page JS-->

</body>
</html>
