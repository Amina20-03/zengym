<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'tableau_bord','menuactive' =>''])

        <!-- Layout page -->
        <div class="layout-page">
            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            @include('layouts.instructeur.navbar')
            <!-- / Navbar -->
            <!-- END: Navbar-->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @if(session('abonnement'))
                    @else
                        <style>

                            .card {
                                background: white;
                                padding: 2rem;
                                border-radius: 1rem;
                                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
                                text-align: center;
                                max-width: 100%;
                                width: 100%;
                            }

                            .card .icon {
                                font-size: 3rem;
                                color: #e11d48; /* rose-600 */
                                margin-bottom: 1rem;
                            }

                            .card h2 {
                                margin: 0 0 0.5rem;
                                color: #111827;
                            }

                            .card p {
                                color: #6b7280;
                                margin-bottom: 1.5rem;
                            }

                            .btn-renew {
                                background: #e11d48;
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 9999px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: background 0.3s ease;
                            }

                            .btn-renew:hover {
                                background: #be123c;
                            }
                        </style>
                        <div class="card">
                            <div class="icon">⚠️</div>
                            <h2>Abonnement expiré</h2>
                            <p>Votre abonnement a pris fin. Veuillez le renouveler pour continuer à profiter de nos services.</p>
                            <a href="{{route('instructeur.profile')}}" class="btn-renew">Renouveler maintenant</a>
                        </div>
                    @endif
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <!-- Footer-->
               @include('layouts.footer')
                <!--/ Footer-->
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
