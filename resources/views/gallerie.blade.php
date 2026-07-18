@extends('layouts.app_vitrine')

@section('content')

    @include('layouts.navbar_vitrine', ['menuprincipaleactive' => 'gallerie', 'menuactive' => ''])

    <!-- Header bannière -->
    <section class="first-section-pt" style="margin-top: -30px; margin-bottom: 0; padding-bottom: 0">
        <div class="container">
            <div class="row mb-12 g-12">
                <div class="col-md-12 col-xl-12">
                    <div class="card bg-dark border-0 text-white">
                        <img class="card-img"
                             src="{{ \Illuminate\Support\Facades\URL::asset('images/devenir_franchise_affiche_zengym.png') }}"
                             style="height: 300px"/>
                        <div class="card-img-overlay" style="margin-top: 100px">
                            <h5 class="card-title" style="font-size: 30px; color: black">
                                <strong>Gallerie</strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallerie par catégorie -->
    <section class="section-py" style="margin-top: 0; padding-top: 20px">
        <div class="container">

            @if(count($grouped) > 0)

                {{-- Onglets de catégories --}}
                <ul class="nav nav-pills mb-4 flex-wrap gap-2" id="gallerieTab">
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

                {{-- Contenu des onglets --}}
                <div class="tab-content">
                    @foreach($grouped as $index => $group)
                        @php $categ_id = $group['categ_id'] ?? 'null'; @endphp
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                             id="cat_{{ $categ_id }}">

                            {{-- Grille d'images --}}
                            <div class="row g-3" id="grid_{{ $categ_id }}">
                                @foreach($group['images'] as $img)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div style="overflow:hidden;border-radius:8px;cursor:pointer;"
                                             onclick="openLightbox('{{ $img['photo_url'] }}', '{{ addslashes($img['titre'] ?? '') }}')">
                                            <img src="{{ $img['photo_url'] }}"
                                                 alt="{{ $img['titre'] ?? 'Gallerie ZenGym' }}"
                                                 loading="lazy"
                                                 style="width:100%;height:200px;object-fit:cover;transition:transform 0.3s;"
                                                 onmouseover="this.style.transform='scale(1.04)'"
                                                 onmouseout="this.style.transform='scale(1)'">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Bouton "Afficher plus" --}}
                            @if($group['total'] > 10)
                                <div class="text-center mt-4" id="btn_wrap_{{ $categ_id }}">
                                    <button class="btn btn-outline-primary px-5"
                                            onclick="loadMore('{{ $categ_id }}', this)"
                                            data-offset="10"
                                            data-total="{{ $group['total'] }}">
                                        <i class="fa fa-plus-circle me-2"></i>
                                        Afficher plus d'images
                                        <span class="text-muted ms-1" style="font-size:13px;">
                                            ({{ $group['total'] - 10 }} restantes)
                                        </span>
                                    </button>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>

            @else
                <p class="text-muted text-center py-5">Aucune image disponible pour le moment.</p>
            @endif

        </div>
    </section>

    <!-- Lightbox -->
    <div id="lightbox" onclick="closeLightbox()"
         style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;
                background:rgba(0,0,0,0.85);z-index:9999;align-items:center;
                justify-content:center;flex-direction:column;">
        <button onclick="closeLightbox()"
                style="position:absolute;top:20px;right:30px;background:none;border:none;color:#fff;font-size:32px;">&times;</button>
        <img id="lightbox_img" src="" alt=""
             style="max-width:90%;max-height:80vh;border-radius:8px;box-shadow:0 4px 30px rgba(0,0,0,0.5);">
        <p id="lightbox_caption" style="color:#fff;margin-top:12px;font-size:16px;"></p>
    </div>

    <!-- Contact Us -->
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
                             alt="contact" class="contact-img w-100 scaleX-n1-rtl img-fluid"/>
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
                            <h4 class="mb-1">Envoyer un message</h4>
                            <p class="mb-4"><br><br></p>
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
                                        <textarea class="form-control" rows="9" placeholder="Write a message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                            <p class="mb-4"><br><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const WS_BASE = "{{ env('API_URL') }}";

        // Charger plus d'images pour une catégorie
        function loadMore(categId, btn) {
            const offset = parseInt(btn.dataset.offset);
            const total  = parseInt(btn.dataset.total);
            const grid   = document.getElementById('grid_' + categId);
            const wrap   = document.getElementById('btn_wrap_' + categId);

            // État chargement
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Chargement...';

            const url = WS_BASE + 'gallerie/public/load_more?categ_id=' + categId + '&offset=' + offset + '&limit=10';

            fetch(url, { headers: { 'Accept': 'application/json' } })
                .then(r => r.json())
                .then(data => {
                    if (!data.status) return;

                    // Ajouter les nouvelles images à la grille
                    data.images.forEach(img => {
                        const col = document.createElement('div');
                        col.className = 'col-6 col-md-4 col-lg-3';
                        col.innerHTML = `
                            <div style="overflow:hidden;border-radius:8px;cursor:pointer;"
                                 onclick="openLightbox('${img.photo_url}', '${(img.titre || '').replace(/'/g, "\\'")}')">
                                <img src="${img.photo_url}"
                                     alt="${img.titre || ''}"
                                     loading="lazy"
                                     style="width:100%;height:200px;object-fit:cover;transition:transform 0.3s;"
                                     onmouseover="this.style.transform='scale(1.04)'"
                                     onmouseout="this.style.transform='scale(1)'">
                            </div>`;
                        grid.appendChild(col);
                    });

                    const newOffset = data.offset;
                    const restantes = total - newOffset;

                    if (data.has_more) {
                        // Mettre à jour l'offset et le compteur
                        btn.dataset.offset = newOffset;
                        btn.disabled = false;
                        btn.innerHTML = `<i class="fa fa-plus-circle me-2"></i>Afficher plus d'images
                            <span class="text-muted ms-1" style="font-size:13px;">(${restantes} restantes)</span>`;
                    } else {
                        // Plus d'images — masquer le bouton
                        wrap.style.display = 'none';
                    }
                })
                .catch(() => {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa fa-plus-circle me-2"></i>Afficher plus d\'images';
                });
        }

        function openLightbox(url, caption) {
            document.getElementById('lightbox_img').src = url;
            document.getElementById('lightbox_caption').textContent = caption;
            document.getElementById('lightbox').style.display = 'flex';
        }
        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
    </script>

@endsection
