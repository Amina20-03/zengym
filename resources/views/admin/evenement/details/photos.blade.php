@extends('layouts.app')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.admin.menu',['menuprincipaleactive' =>'gest_evenements','menuactive' =>'liste_even'])

            <!-- Layout page -->
            <div class="layout-page">
                <!-- BEGIN: Navbar-->
                <!-- Navbar -->
                @include('layouts.admin.navbar')
                <!-- / Navbar -->
                <!-- END: Navbar-->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Navbar pills -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="nav-align-top">
                                    <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                        <li class="nav-item"><a class="nav-link" href="{{route('admin.evenement.details',$detail['id'])}}"><i class='bx bx-user bx-sm me-1_5'></i> {{ __('content.Détails') }}</a></li>
                                        <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='bx bx-group bx-sm me-1_5'></i> {{ __('content.photos') }}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{route('admin.evenement.details.videos',$detail['id'])}}"><i class='bx bx-grid-alt bx-sm me-1_5'></i> {{ __('content.video') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Navbar pills -->
                        <!-- Users List Table -->
                        <div class="card" style="padding: 10px">
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
                            {{--                        <div class="card-header border-bottom">--}}
                            {{--                            <h5 class="card-title">Search Filter</h5>--}}
                            {{--                            <div--}}
                            {{--                                class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0"--}}
                            {{--                            >--}}
                            {{--                                <div class="col-md-4 user_role"></div>--}}
                            {{--                                <div class="col-md-4 user_plan"></div>--}}
                            {{--                                <div class="col-md-4 user_status"></div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}




                            <div class="card-body row g-3">
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                                        <div class="me-1">
                                            <h5 class="mb-1">{{$detail['titre']}}</h5>
                                            <p class="mb-1">
                                                <?php
                                                echo html_entity_decode($detail['desc']);
                                                ?>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="card academy-content shadow-none border">

                                        <div class="card-body">

                                            <form action="{{ route('admin.evenement.details.photos.add',$detail['id']) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="images[]" multiple class="form-control mb-3">
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </form>

                                            <hr>

                                            <h4>Gallery</h4>
                                            <div class="row">
                                                @foreach($detail_photos as $img)
                                                    <div class="col-md-3 mb-4">
                                                        <img src="data:image/jpg;base64,{{$img['photo'] }}" class="img-thumbnail" width="100%">

                                                    </div>
                                                    <div class="col-md-3 mb-2">

                                                        <a href="{{route('admin.evenement.details.photos.delete',$img['id'])}}" class="btn btn-danger">
                                                            X
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>




                        </div>






                        <!-- Offcanvas to add new user -->

                    </div>
                    <form method="POST" action="{{route('admin.evenement.affecter_user.delete')}}" class="add-new-user pt-0">
                        @csrf
                        @include('layouts.delete_modal')

                    </form>

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

@endsection
@section('datatable')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var form = document.getElementById("addNewUserForm");
            var submitButton = document.getElementById("submitButton");

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                submitButton.disabled = true;
                myFunction();
                setTimeout(function () {
                    submitButton.disabled = false;
                }, 2000); // Adjust the time accordingly
            });
            function myFunction() {
                if($('#salle_sport_id').val()==='null'){
                    alert('{{ __('content.veuillez_selectionner_un_sp') }}')
                }
                else{
                    if($('#categ_candidat_id').val()==='null'){
                        alert('{{ __('content.veuillez_selectionner_un_cat') }}')
                    }
                    else{
                        $('#addNewUserForm').submit();
                    }
                }



                setTimeout(function () {
                    console.log("Function completed");
                }, 2000);
            }
        });
        $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
            // DataTable initialisation
            $('#table').DataTable(

                {
                    order: [[ 0, "desc" ]],
                    pageLength:10,
                    lengthMenu: [[10, 20, 30, -1], [10, 20, 30, '{{ __('content.Tous') }}']],
                    "language":
                        {
                            "sProcessing": "{{ __('content.sProcessing') }}",
                            "sLengthMenu": "{{ __('content.sLengthMenu') }}",
                            "sZeroRecords": "{{ __('content.sZeroRecords') }}",
                            "sInfo": "{{ __('content.sInfo') }}",
                            "sInfoEmpty": "{{ __('content.sInfoEmpty') }}",
                            "sInfoFiltered": "{{ __('content.sInfoFiltered') }}",
                            "sInfoPostFix": "{{ __('content.sInfoPostFix') }}",
                            "sSearch": "{{ __('content.sSearch') }}",
                            "sUrl": "{{ __('content.sUrl') }}",
                            "oPaginate": {
                                "sFirst": "{{ __('content.sFirst') }}",
                                "sPrevious": "{{ __('content.sPrevious') }}",
                                "sNext": "{{ __('content.sNext') }}",
                                "sLast": "{{ __('content.sLast') }}"
                            }
                        },

                    "paging": true,
                    "autoWidth": true,

                }
            );
            $('.dataTables_filter input').attr('placeholder', 'Recherche');
        });

        function call_delete_modal(user_id){
            $('#champ_id').val(user_id);
        }
    </script>

@endsection
