@extends('layouts.app')

@section('content')

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.candidat.menu',['menuprincipaleactive' =>'qcm','menuactive' =>''])

            <!-- Layout page -->
            <div class="layout-page">
                <!-- BEGIN: Navbar-->
                <!-- Navbar -->
                @include('layouts.candidat.navbar')
                <!-- / Navbar -->
                <!-- END: Navbar-->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <style>
                            .image-container {
                                position: relative;
                                display: inline-block;
                                width: 100%; /* or a fixed width if needed */
                                max-width: 800px; /* optional */
                            }

                            .image-container img {
                                width: 100%;
                                height: auto;
                                display: block;
                            }

                            .image-title {
                                position: absolute;
                                top: 49%; /* center vertically */
                                left: 60%; /* center horizontally */
                                transform: translate(-50%, -50%);
                                font-size: 1.5rem;
                                color: black;
                                text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
                                z-index: 2;
                                margin: 0;
                                text-align: center;
                            }
                            @media (max-width: 768px) {
                                .image-title {
                                    font-size: 1rem;
                                }
                            }

                            @media (max-width: 480px) {
                                .image-title {
                                    font-size: 1rem;
                                }
                            }

                        </style>
                        <div class="row">
                            <!-- Sales Stats -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-6">
                                <div class="card">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-6">
                                <div class="card" id="printable-card">
                                    <div id="certificate" class="image-container">
                                        <img src="{{ \Illuminate\Support\Facades\URL::asset('images/certif_page-0001.jpg') }}" alt="Certificate">
                                        <h4 class="image-title">
                                            {{session('nom')}} {{session('prenom')}}
                                        </h4>
                                    </div>


                                </div>
                                <br>
                                <button class="btn btn-primary" style="width: 100%" onclick="save()">print</button>
                            </div>

                            <!--/ Sales Stats -->
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
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function save(){
            const card = document.getElementById('printable-card');
            const printWindow = window.open('', '', 'height=600,width=800');

            printWindow.document.write(`
        <html>
            <head>
                <title>Print Certificate</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        text-align: center;
                    }
                    .image-container img {
                        width: 100%;
                        height: auto;
                        display: block;
                    }
                    .image-title {
                        position: absolute;
                        top: 24%; /* center vertically */
                        left: 65%; /* center horizontally */
                        transform: translate(-50%, -50%);
                        font-size: 1.5rem;
                        color: black;
                        text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
                        z-index: 2;
                        margin: 0;
                        text-align: center;
                    }
                </style>
            </head>
            <body>${card.outerHTML}</body>
        </html>
    `);
            printWindow.document.close();
            printWindow.focus();

            // Wait until image is loaded before printing
            printWindow.onload = function () {
                printWindow.print();
                printWindow.close();
            };
        }
    </script>
    <script>
        $(document).ready(function() {
            html2canvas(document.getElementById('certificate')).then(canvas => {
                const base64Image = canvas.toDataURL('image/png'); // Get Base64
                //console.log(base64Image);
                $.ajax({
                    url: '{{env('API_URL')}}candidat/create_certificat',
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + '{{session('TOKEN')}}',
                        'Content-Type': 'application/json',
                    },
                    data: {
                        image: base64Image,
                        id_examen: {{$examen_id}}
                    },
                    success: function(response) {
                        //console.log('Success:', response);
                        //window.close();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving certificate:', error);
                    }
                });
            });
        });

    </script>

@endsection
@section('datatable')


@endsection
