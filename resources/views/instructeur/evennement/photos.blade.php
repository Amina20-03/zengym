@extends('layouts.app')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.instructeur.menu',['menuprincipaleactive' =>'evenements','menuactive' =>'liste_evenement'])

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

                        <!-- Navbar pills -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="nav-align-top">
                                    <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="javascript:void(0);">
                                                <i class='bx bx-user bx-sm me-1_5'></i>
                                                {{ $detail['code'] }}
                                                {{ $detail['titre'] }}
                                            </a>
                                        </li>
                                        {{--                                            <li class="nav-item"><a class="nav-link" href="javascript:void(0);"><i class='bx bx-group bx-sm me-1_5'></i> Média</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Navbar pills -->
                            <form method="post" id="addNewUserForm" action="{{ route('instructeur.evennement.photos.add',$detail['id']) }}" enctype="multipart/form-data"  class="row g-3">
                                @csrf
                                <!-- User Profile Content -->
                                <div class="row">
                                    <div class="col-xl-12 col-lg-5 col-md-5">
                                        <!-- About User -->
                                        <div class="card mb-6">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <label
                                                            class="form-label"
                                                            for="titre"
                                                        >{{ __('content.photos') }}</label
                                                        >
                                                        <input
                                                            type="file"
                                                            class="form-control"
                                                            id="gallerie"
                                                            name="gallerie[]"
                                                            multiple
                                                        />
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 10px">
                                                    @foreach($detail_photos as $photo)
                                                    <div class="col-3 col-md-3">
                                                        <img src="data:image/jpg;base64,{{ $photo['photo']  }}" alt="" style="width:100%;">
                                                        <a href="{{route('instructeur.evennement.photos.delete',$photo['id'])}}" class="btn btn-irv" style=" background: red;color: white;width:100%;">
                                                            {{ __('content.Supprimer') }}
                                                        </a>
                                                    </div>
                                                    @endforeach


                                                    <div class="col-12 col-md-12" style="padding-top: 35px">
                                                        <table style="width: 100%">
                                                            <tr>
                                                                <th>

                                                                </th>
                                                                <th style="text-align: right">

                                                                    <button type="submit" class="btn btn-irv" style=" background: #9d32b6;color: white">
                                                                        {{ __('content.Valider') }}
                                                                    </button>
                                                                </th>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ About User -->

                                    </div>
                                </div>
                                <!--/ User Profile Content -->
                            </form>
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

@endsection
@section('datatable')
<script>

    function call_delete_modal(user_id){
        $('#champ_id').val(user_id);
    }
</script>

@endsection
