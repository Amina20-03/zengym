




@extends('layouts.app_vitrine')

@section('content')
@include('layouts.navbar_vitrine',['menuprincipaleactive' =>'','menuactive' =>''])

<!-- Sections:Start -->

<section id="landingContact" class="section-py bg-body">
    <div class="container" style="margin-top: 20px">
        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('evenement.details',$detail['id'])}}">
                                {{ __('content.Détails') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('evenement.details.photos',$detail['id'])}}">
                                {{ __('content.photos') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">
                                {{ __('content.video') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Navbar pills -->
        <div class="card" style="padding: 10px">


            <div class="card-body row g-3">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
                        <div class="me-1">
                            <h5 class="mb-1">{{$detail['titre']}}</h5>
                            <p class="mb-1">{{$detail['desc']}}</p>
                        </div>
                    </div>
                    <div class="card academy-content shadow-none border">

                        <div class="card-body">
                            <div class="row">
                                @foreach($detail_videos as $video)
                                <div class="col-md-4">
                                    <video class="w-100" controls>
                                        <source src="{{asset('project/storage/app/'.$video['path'])}}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>




    </div>
</section>
<!-- Contact Us: End -->

<!-- Contact Us: Start -->
<section id="landingContact" class="section-py landing-contact">
    <div class="container">
        <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Contactez nous</span>
        </div>
        <h3 class="text-center mb-1"><span class="section-title">Travaillons</span> ensemble</h3>
        <p class="text-center mb-4 mb-lg-5 pb-md-3">Une question ou une remarque ? écris-nous simplement un message</p>
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="contact-img-box position-relative border p-2 h-100">
                    <img src="https://shoutem.com/wp-content/uploads/2020/11/Fitness_phoneperson@2x-496x489.png" alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" />
                    <div class="pt-3 px-4 pb-1">
                        <div class="row gy-3 gx-md-4">
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge bg-label-primary rounded p-2 me-2"><i class="fa fa-envelope bx-sm"></i></div>
                                    <div>
                                        <p class="mb-0">Email</p>
                                        <h5 class="mb-0">
                                            <a href="mailto:example@gmail.com" class="text-heading">zengym@gmail.com</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge bg-label-success rounded p-2 me-2">
                                        <i class="fa fa-phone bx-sm"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0">Téléphone</p>
                                        <h5 class="mb-0"><a href="tel:+21658130010" class="text-heading">+216 58 130 010</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-1">Envoyer un message</h4>
                        <p class="mb-4">
                            <br>
                            <br>
                        </p>
                        <form>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="contact-form-fullname">Nom & Prénom</label>
                                    <input type="text" class="form-control" id="contact-form-fullname" placeholder="john" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="contact-form-email">Email</label>
                                    <input type="text" id="contact-form-email" class="form-control" placeholder="johndoe@gmail.com" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="contact-form-message">Message</label>
                                    <textarea id="contact-form-message" class="form-control" rows="9" placeholder="Write a message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                        <p class="mb-4">
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us: End -->
@endsection
@section('datatable')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

@endsection
