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
            <div class="content-wrapper" style="margin-top: -70px">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <form method="POST" id="editUserForm" action="{{ route('candidat.qcm.examen.valider') }}" class="row g-3">
                        @csrf
                        <input type="hidden" value="{{$examen[0]['id']}}" id="id_examen" name="id_examen">
                        <!-- Sticky Actions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card fullscreen-card" style="position: relative;">
                                    <div style="position: sticky;top: 70px;z-index: 10;" class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                                        <h5 class="card-title mb-sm-0 me-2">
                                            {{$examen[0]['titre']}}
                                        </h5>
                                        <div class="action-btns">
                                            <span id="timer" class="badge bg-danger fs-5">30:00</span>
                                            <button type="submit" class="btn btn-primary" id="submitQuiz">
                                                Valider
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8 mx-auto">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <!-- {{$comp = 1}}-->
                                                @foreach($questions as $quest)
                                                    <h5 class="mb-4">
                                                        {{$comp}}.  {{$quest['question']}}
                                                    </h5>
                                                    <div class="row g-6">
                                                        <div class="col mt-2">
                                                            @foreach($choix_quest as $choix)
                                                                @if($choix['id_question'] == $quest['id'])
                                                                    <div class="form-check form-check-inline">
                                                                        <!-- {{$check_user_rep = \Illuminate\Support\Facades\DB::table('user_choix_selecteds')->where('id_quest',$quest['id'])->where('id_user',session('user_id'))->get()}} -->
                                                                        @if(count($check_user_rep)>0)
                                                                            @if($check_user_rep[0]->id_choix_selected == $choix['id'])
                                                                                <input name="{{$quest['id']}}" class="form-check-input" type="radio" value="{{$choix['rep']}}" id="{{$choix['id']}}" onclick="check_scoore('{{$choix['id']}}','{{$quest['id']}}')" checked/>
                                                                            @else
                                                                                <input name="{{$quest['id']}}" class="form-check-input" type="radio" value="{{$choix['rep']}}" id="{{$choix['id']}}" onclick="check_scoore('{{$choix['id']}}','{{$quest['id']}}')"/>
                                                                            @endif
                                                                        @else
                                                                            <input name="{{$quest['id']}}" class="form-check-input" type="radio" value="{{$choix['rep']}}" id="{{$choix['id']}}" onclick="check_scoore('{{$choix['id']}}','{{$quest['id']}}')"/>
                                                                        @endif
                                                                        <label class="form-check-label" for="{{$choix['rep']}}">{{$choix['rep']}}</label>
                                                                    </div>
                                                                    <br>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <!-- {{$comp++}} -->
                                                @endforeach



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Sticky Actions -->
                    </form>
                </div>
                <!-- / Content -->
                <script>
                    window.addEventListener("beforeunload", function (e) {
                        // browser support:
                        // https://developer.mozilla.org/en-US/docs/Web/API/WindowEventHandlers/onbeforeunload
                        var confirmationMessage = "\o/";
                        e.returnValue = confirmationMessage; // Gecko, Trident, Chrome 34-51
                        return confirmationMessage;          // Gecko, WebKit, Chrome <34
                    });

                </script>
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
