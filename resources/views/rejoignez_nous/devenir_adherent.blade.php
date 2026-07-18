@extends('layouts.app_vitrine')

@section('content')

    @include('layouts.navbar_vitrine',['menuprincipaleactive' =>'rejoignez_nous','menuactive' =>''])

    <section class="section-py first-section-pt" style="margin-top: -50px">
        <div class="container">
            <div class="row mb-12 g-12">
                <div class="col-md-12 col-xl-12">
                    <div class="card bg-dark border-0 text-white">
                        <img class="card-img" src="{{\Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png')}}" style="height: 300px"/>
                        <div class="card-img-overlay" style="margin-top: 100px">
                            <h5 class="card-title" style="font-size: 30px;color: black">
                                <strong>
                                    Devenir un Adhérent
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-py first-section-pt" style="margin-top: -100px">
        <div class="container">

            <div class="row mb-12 g-12">
                <div class="col-md-12 mb-md-0 mb-12">
                    <!-- Pricing Plans -->
                    <div class="rounded-top">
                        <div class="row gy-6">
                            <!-- {{$categ_type_abo_adherents = \Illuminate\Support\Facades\DB::table('categ_type_abo_adherents')->get()}} -->
                            @if(!empty($categ_type_abo_adherents))
                                @foreach($categ_type_abo_adherents as $cat)
                                    <div class="col-xl mb-md-0 px-3">
                                        <div class="card border rounded shadow-none">
                                            <div class="card-body pt-12">
                                                <div class="mt-3 mb-5 text-center">
                                                    @if($cat->photo)
                                                        <img src="data:image/jpg;base64,{{$cat->photo }}" alt="" style="width:100%;">
                                                    @else
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/icons/unicons/bookmark.png" alt="Basic Image" width="120" />
                                                    @endif
                                                </div>
                                                <h4 class="card-title text-center text-capitalize mb-3">{{$cat->desc}}</h4>
{{--                                                <div class="text-center h-px-50">--}}
{{--                                                    <div class="d-flex justify-content-center">--}}
{{--                                                        <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>--}}
{{--                                                        <h1 class="mb-0 text-primary">0</h1>--}}
{{--                                                        <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <!-- {{$type_abo_adherents = DB::table('type_abo_adherents')
                                                ->where('categ_abo_id', $cat->id)
                                                ->orderBy('periode')
                                                ->get()
                                                ->groupBy(function($item) {
                                                    return trim(explode('(', $item->des)[0]);
                                                })}} -->
                                                @if(!empty($type_abo_adherents))

                                                        @foreach($type_abo_adherents as $base => $items)

                                                                <div class="d-flex align-items-center mb-2" style="margin-top: 30px">
                                                                    <span class="badge p-50 w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                                    </span>
                                                                    <span class="fw-bold">{{ $base }}</span>
                                                                </div>
                                                                @foreach($items as $item)
                                                                    <div class="d-flex align-items-center border-primary py-3 px-4 border rounded mb-2">

                                                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                            <div class="me-3">
                                                                                <p class="mb-0 text-heading">{{ $item->periode }}</p>
                                                                                <a href="{{route('rejoignez_nous.devenir_adherent.inscription',$item->id)}}" class="small">Achetez</a>
                                                                            </div>
                                                                            <div class="user-progress">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <h5 class="mb-0">
                                                                                        {{$item->frais_ap_remise}}
                                                                                    </h5>
                                                                                    <small class="mt-auto mb-1 text-heading"> TND</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @endforeach

                                                        @endforeach

                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </div>
                </div>
                <!--/ Pricing Plans -->
                </div>
            </div>
        </div>
    </section>
@endsection
