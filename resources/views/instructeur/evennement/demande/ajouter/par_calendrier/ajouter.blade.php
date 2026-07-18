<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'evenements','menuactive' =>'add_evennement'])

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

                    <div class="row">
                        @if (Session::has('success'))

                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                        @endif
                        <!-- User Sidebar -->
                        <div
                            class="col-xl-12 col-lg-5 col-md-5 order-1 order-md-0"
                        >
                            <iframe src="{{url('calendar')}}" style="width: 100%;height: 1000px" title="Example Site">
                            </iframe>
                            <form action="{{route('instructeur.evennement.demande.create2')}}" method="POST" enctype="multipart/form-data" id="form_1" hidden>
                                @csrf
                                <input class="form-control" type="text" id="date" name="date">
                                <input class="form-control" type="text" id="heure_deb" name="heure_deb">
                                <input class="form-control" type="text" id="heure_fin" name="heure_fin">
                                <input class="form-control" type="text" id="type_even_id" name="type_even_id" value="{{$type_even_id}}">
                            </form>
                        </div>
                        <!--/ User Sidebar -->

                    </div>

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

<script>
// Écouter le postMessage envoyé par le calendrier iframe
window.addEventListener('message', function(event) {
    if (event.data && event.data.type === 'calendar_date_selected') {
        const dateInput     = document.getElementById('date');
        const heureDebInput = document.getElementById('heure_deb');
        const heureFinInput = document.getElementById('heure_fin');
        const form          = document.getElementById('form_1');

        if (dateInput && form) {
            // Extraire uniquement la date (YYYY-MM-DD)
            const dateOnly = event.data.date ? event.data.date.split('T')[0] : event.data.date;
            dateInput.value     = dateOnly;
            heureDebInput.value = event.data.heure_deb || '';
            heureFinInput.value = event.data.heure_fin || '';
            form.submit();
        }
    }
});
</script>
