@extends('layouts.app_vitrine')

@section('content')

{{-- Quill Snow CSS pour le rendu du contenu --}}
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<style>
    .article-content.ql-editor { border: none !important; box-shadow: none !important; }
    .article-content h1, .article-content h2 { margin-bottom: .5rem; font-weight: 600; }
    .article-content p { margin-bottom: 1rem; }
    .article-content ul, .article-content ol { padding-left: 1.5rem; margin-bottom: 1rem; }
    .article-content blockquote { border-left: 4px solid #ccc; padding-left: 1rem; color: #666; }
    .article-content img { max-width: 100%; border-radius: 6px; margin: 1rem 0; }
</style>

    @include('layouts.navbar_vitrine', ['menuprincipaleactive' => 'articles', 'menuactive' => ''])

    <!-- Header bannière -->
    <section class="first-section-pt" style="margin-top: -30px; margin-bottom: 0; padding-bottom: 0">
        <div class="container">
            <div class="col-md-12">
                <div class="card bg-dark border-0 text-white">
                    @if($article['photo_url'])
                        <img class="card-img" src="{{ $article['photo_url'] }}"
                             style="height: 350px; object-fit:cover; filter:brightness(0.6)"/>
                    @else
                        <img class="card-img"
                             src="{{ \Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png') }}"
                             style="height: 350px; object-fit:cover; filter:brightness(0.7)"/>
                    @endif
                    <div class="card-img-overlay d-flex flex-column justify-content-end" style="padding: 30px;">
                        @if($article['categ_desc'])
                            <span class="badge bg-primary mb-2" style="width:fit-content">{{ $article['categ_desc'] }}</span>
                        @endif
                        <h2 class="card-title fw-bold text-white mb-1">{{ $article['titre'] }}</h2>
                        <small class="text-white-50">
                            <i class="fa fa-calendar me-1"></i>
                            {{ \Carbon\Carbon::parse($article['created_at'])->format('d/m/Y') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenu de l'article -->
    <section class="section-py" style="padding-top: 30px">
        <div class="container">
            <div class="row">

                <!-- Contenu principal -->
                <div class="col-lg-8">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('accueil_vitrine') }}">Accueil</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('articles_vitrine') }}">Articles</a>
                            </li>
                            <li class="breadcrumb-item active">{{ Str::limit($article['titre'], 40) }}</li>
                        </ol>
                    </nav>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">
                            @if($article['contenu'])
                                <div class="article-content ql-editor" style="font-size:16px;line-height:1.8;color:#444;padding:0;">
                                    {!! $article['contenu'] !!}
                                </div>
                            @else
                                <p class="text-muted text-center py-4">Aucun contenu disponible.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Bouton retour -->
                    <div class="mt-4">
                        <a href="{{ route('articles_vitrine') }}" class="btn btn-outline-primary">
                            <i class="fa fa-arrow-left me-2"></i>Retour aux articles
                        </a>
                    </div>
                </div>

                <!-- Sidebar suggestions -->
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0" style="color:#fff !important;"><i class="fa fa-newspaper-o me-2"></i>Articles similaires</h6>
                        </div>
                        <div class="card-body p-3">
                            @if(count($suggestions) > 0)
                                @foreach($suggestions as $sug)
                                    <a href="{{ route('article_detail', $sug['id']) }}"
                                       class="text-decoration-none text-reset">
                                        <div class="d-flex gap-3 mb-3 pb-3 border-bottom"
                                             style="transition:opacity 0.2s"
                                             onmouseover="this.style.opacity='0.75'"
                                             onmouseout="this.style.opacity='1'">
                                            @if($sug['photo_url'])
                                                <img src="{{ $sug['photo_url'] }}"
                                                     style="width:70px;height:70px;object-fit:cover;border-radius:6px;flex-shrink:0;">
                                            @else
                                                <div style="width:70px;height:70px;background:#f0f0f0;border-radius:6px;flex-shrink:0;display:flex;align-items:center;justify-content:center;">
                                                    <i class="fa fa-image text-muted"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <p class="mb-1 fw-semibold small" style="line-height:1.4">{{ $sug['titre'] }}</p>
                                                <small class="text-muted">
                                                    <i class="fa fa-calendar me-1"></i>
                                                    {{ \Carbon\Carbon::parse($sug['created_at'])->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p class="text-muted small text-center py-2">Aucun article similaire.</p>
                            @endif

                            <a href="{{ route('articles_vitrine') }}" class="btn btn-outline-primary btn-sm w-100 mt-2">
                                Voir tous les articles
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <div class="text-center mb-3 pb-1">
                <span class="badge bg-label-primary">Contactez nous</span>
            </div>
            <h3 class="text-center mb-1"><span class="section-title">Travaillons</span> ensemble</h3>
            <p class="text-center mb-4">Une question ou une remarque ? écris-nous simplement un message</p>
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="contact-img-box position-relative border p-2 h-100">
                        <img src="https://shoutem.com/wp-content/uploads/2020/11/Fitness_phoneperson@2x-496x489.png"
                             alt="contact" class="contact-img w-100 img-fluid"/>
                        <div class="pt-3 px-4 pb-1">
                            <div class="row gy-3 gx-md-4">
                                <div class="col-md-6 col-lg-12 col-xl-7">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-primary rounded p-2 me-2"><i class="fa fa-envelope bx-sm"></i></div>
                                        <div>
                                            <p class="mb-0">Email</p>
                                            <h5 class="mb-0"><a href="mailto:contact@zengymhealth.com" class="text-heading">contact@zengymhealth.com</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-label-success rounded p-2 me-2"><i class="fa fa-phone bx-sm"></i></div>
                                        <div>
                                            <p class="mb-0">Téléphone</p>
                                            <h5 class="mb-0"><a href="tel:+21655688828" class="text-heading">+216 55 688 828</a></h5>
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
                            <h4 class="mb-4">Envoyer un message</h4>
                            <form>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Nom & Prénom</label>
                                        <input type="text" class="form-control" placeholder="john"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="johndoe@gmail.com"/>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Message</label>
                                        <textarea class="form-control" rows="6" placeholder="Votre message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
