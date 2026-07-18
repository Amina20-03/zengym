@extends('layouts.app_vitrine')

@section('content')

    @include('layouts.navbar_vitrine', ['menuprincipaleactive' => 'articles', 'menuactive' => ''])

    <!-- Header bannière -->
    <section class="first-section-pt" style="margin-top: -30px; margin-bottom: 0; padding-bottom: 0">
        <div class="container">
            <div class="col-md-12">
                <div class="card bg-dark border-0 text-white">
                    <img class="card-img"
                         src="{{ \Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png') }}"
                         style="height: 300px; object-fit:cover;"/>
                    <div class="card-img-overlay" style="margin-top: 100px">
                        <h5 class="card-title" style="font-size: 30px; color: black"><strong>Articles</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles par catégorie -->
    <section class="section-py" style="margin-top: 0; padding-top: 20px">
        <div class="container">

            @if(count($grouped) > 0)

                <!-- Onglets -->
                <ul class="nav nav-pills mb-4 flex-wrap gap-2">
                    @foreach($grouped as $index => $group)
                        <li class="nav-item">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                    data-bs-toggle="pill"
                                    data-bs-target="#cat_{{ $group['categ_id'] ?? 'null' }}">
                                {{ $group['categ_desc'] }}
                                <span class="badge bg-label-primary ms-1">{{ $group['total'] }}</span>
                            </button>
                        </li>
                    @endforeach
                </ul>

                <!-- Contenu -->
                <div class="tab-content">
                    @foreach($grouped as $index => $group)
                        @php $categ_id = $group['categ_id'] ?? 'null'; @endphp
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                             id="cat_{{ $categ_id }}">

                            <div class="row g-4" id="grid_{{ $categ_id }}">
                                @foreach($group['articles'] as $art)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <a href="{{ route('article_detail', $art['id']) }}" class="text-decoration-none text-reset">
                                        <div class="card h-100 border shadow-sm" style="transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='none'">
                                            @if($art['photo_url'])
                                                <img src="{{ $art['photo_url'] }}"
                                                     alt="{{ $art['titre'] }}"
                                                     loading="lazy"
                                                     style="height:200px;object-fit:cover;border-radius:6px 6px 0 0;">
                                            @endif
                                            <div class="card-body">
                                                <span class="badge bg-label-primary mb-2">{{ $group['categ_desc'] }}</span>
                                                <h6 class="fw-semibold mb-2">{{ $art['titre'] }}</h6>
                                                @if($art['contenu'])
                                                    <p class="text-muted small mb-0"
                                                       style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                                                        {{ strip_tags($art['contenu']) }}
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="card-footer bg-transparent border-0 pt-0">
                                                <small class="text-muted">
                                                    <i class="fa fa-calendar me-1"></i>
                                                    {{ \Carbon\Carbon::parse($art['created_at'])->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            @if($group['total'] > 10)
                                <div class="text-center mt-4" id="btn_wrap_{{ $categ_id }}">
                                    <button class="btn btn-outline-primary px-5"
                                            onclick="loadMore('{{ $categ_id }}', this)"
                                            data-offset="10"
                                            data-total="{{ $group['total'] }}">
                                        <i class="fa fa-plus-circle me-2"></i>
                                        Afficher plus d'articles
                                        <span class="text-muted ms-1" style="font-size:13px;">
                                            ({{ $group['total'] - 10 }} restants)
                                        </span>
                                    </button>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>

            @else
                <p class="text-muted text-center py-5">Aucun article disponible pour le moment.</p>
            @endif

        </div>
    </section>

    <!-- Contact -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <div class="text-center mb-3 pb-1">
                <span class="badge bg-label-primary">Contactez nous</span>
            </div>
            <h3 class="text-center mb-1"><span class="section-title">Travaillons</span> ensemble</h3>
            <p class="text-center mb-4 mb-lg-5 pb-md-3">Une question ou une remarque ? écris-nous simplement un message</p>
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

    <script>
        const WS_BASE_ART = "{{ env('API_URL') }}";

        function loadMore(categId, btn) {
            const offset = parseInt(btn.dataset.offset);
            const total  = parseInt(btn.dataset.total);
            const grid   = document.getElementById('grid_' + categId);
            const wrap   = document.getElementById('btn_wrap_' + categId);

            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Chargement...';

            fetch(WS_BASE_ART + 'articles/public/load_more?categ_id=' + categId + '&offset=' + offset + '&limit=10',
                { headers: { 'Accept': 'application/json' } })
                .then(r => r.json())
                .then(data => {
                    if (!data.status) return;

                    data.articles.forEach(art => {
                        const col = document.createElement('div');
                        col.className = 'col-12 col-md-6 col-lg-4';
                        const photo = art.photo_url
                            ? `<img src="${art.photo_url}" alt="${art.titre}" loading="lazy"
                                    style="height:200px;object-fit:cover;border-radius:6px 6px 0 0;">`
                            : '';
                        const contenu = art.contenu
                            ? `<p class="text-muted small mb-0" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">${art.contenu.replace(/<[^>]*>/g, '')}</p>`
                            : '';
                        col.innerHTML = `
                            <a href="/articles/${art.id}" class="text-decoration-none text-reset">
                            <div class="card h-100 border shadow-sm" style="transition:transform 0.2s;"
                                 onmouseover="this.style.transform='translateY(-4px)'"
                                 onmouseout="this.style.transform='none'">
                                ${photo}
                                <div class="card-body">
                                    <h6 class="fw-semibold mb-2">${art.titre}</h6>
                                    ${contenu}
                                </div>
                            </div>
                            </a>`;
                        grid.appendChild(col);
                    });

                    const newOffset = data.offset;
                    const restants  = total - newOffset;

                    if (data.has_more) {
                        btn.dataset.offset = newOffset;
                        btn.disabled = false;
                        btn.innerHTML = `<i class="fa fa-plus-circle me-2"></i>Afficher plus d'articles <span class="text-muted ms-1" style="font-size:13px;">(${restants} restants)</span>`;
                    } else {
                        wrap.style.display = 'none';
                    }
                })
                .catch(() => {
                    btn.disabled = false;
                    btn.innerHTML = "<i class='fa fa-plus-circle me-2'></i>Afficher plus d'articles";
                });
        }
    </script>

@endsection
