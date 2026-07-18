<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu', ['menuprincipaleactive' => 'articles', 'menuactive' => 'articles'])
        <div class="layout-page">
            @include('layouts.admin.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Formulaire ajout -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fa fa-plus-circle me-2"></i>Ajouter un article</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Catégorie <span class="text-danger">*</span></label>
                                        <select name="categ_id" class="form-select" required>
                                            <option value="">-- Choisir --</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat['id'] }}">{{ $cat['desc'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Titre <span class="text-danger">*</span></label>
                                        <input type="text" name="titre" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Contenu</label>
                                        <style>
                                            .quill-wrapper { border: 1px solid #d4d8dd; border-radius: 6px; overflow: hidden; }
                                            .quill-wrapper .ql-toolbar { border: none; border-bottom: 1px solid #d4d8dd; }
                                            .quill-wrapper .ql-container { border: none; }
                                            .quill-wrapper .ql-editor { min-height: 180px; max-height: 250px; overflow-y: auto; }
                                        </style>
                                        <div class="quill-wrapper">
                                            <div id="quill_toolbar_add">
                                                <span class="ql-formats">
                                                    <select class="ql-font"></select>
                                                    <select class="ql-size"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-bold"></button>
                                                    <button class="ql-italic"></button>
                                                    <button class="ql-underline"></button>
                                                    <button class="ql-strike"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <select class="ql-color"></select>
                                                    <select class="ql-background"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-header" value="1"></button>
                                                    <button class="ql-header" value="2"></button>
                                                    <button class="ql-blockquote"></button>
                                                    <button class="ql-code-block"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-list" value="ordered"></button>
                                                    <button class="ql-list" value="bullet"></button>
                                                    <button class="ql-indent" value="-1"></button>
                                                    <button class="ql-indent" value="+1"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-align" value=""></button>
                                                    <button class="ql-align" value="center"></button>
                                                    <button class="ql-align" value="right"></button>
                                                    <button class="ql-align" value="justify"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-link"></button>
                                                    <button class="ql-image"></button>
                                                    <button class="ql-video"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-clean"></button>
                                                </span>
                                            </div>
                                            <div id="quill_editor_add"></div>
                                        </div>
                                        <input type="hidden" name="contenu" id="contenu_add">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Image</label>
                                        <input type="file" name="photo" id="photoInput" class="form-control" accept="image/*">
                                        <small class="text-muted">JPG, PNG, WebP — Max 10 Mo — Conversion auto WebP 1200px</small>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Ordre</label>
                                        <input type="number" name="ordre" class="form-control" value="0" min="0">
                                    </div>
                                    <div class="col-12">
                                        <img id="photoPreview" src="" style="display:none;max-height:120px;border-radius:6px;margin-top:8px;">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">
                                    <i class="fa fa-save me-1"></i> Enregistrer
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Articles groupés par catégorie -->
                    @foreach($grouped as $group)
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fa fa-folder-open me-2 text-primary"></i>
                                    {{ $group['categ_desc'] }}
                                    <span class="badge bg-label-primary ms-2">{{ count($group['articles']) }}</span>
                                </h5>
                            </div>
                            <div class="card-body">
                                @if(count($group['articles']) == 0)
                                    <p class="text-muted text-center py-3">Aucun article.</p>
                                @else
                                    <div class="row g-3">
                                        @foreach($group['articles'] as $art)
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="card h-100 border">
                                                    @if($art['photo_url'])
                                                        <img src="{{ $art['photo_url'] }}"
                                                             style="height:160px;object-fit:cover;border-radius:6px 6px 0 0;">
                                                    @else
                                                        <div style="height:80px;background:#f0f0f0;display:flex;align-items:center;justify-content:center;border-radius:6px 6px 0 0;">
                                                            <i class="fa fa-image fa-2x text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div class="card-body p-3">
                                                        <h6 class="fw-semibold mb-1 text-truncate">{{ $art['titre'] }}</h6>
                                                        <p class="small text-muted mb-2" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                            {!! strip_tags($art['contenu'] ?? '') !!}
                                                        </p>
                                                        <span class="badge {{ $art['active'] ? 'bg-label-success' : 'bg-label-secondary' }} mb-2">
                                                            {{ $art['active'] ? 'Visible' : 'Masqué' }}
                                                        </span>
                                                        <div class="d-flex gap-1">
                                                            <a href="{{ route('admin.articles.edit', $art['id']) }}"
                                                               class="btn btn-sm btn-outline-primary flex-grow-1">
                                                                <i class="fa fa-pencil"></i> Modifier
                                                            </a>
                                                            <form method="POST" action="{{ route('admin.articles.delete') }}"
                                                                  style="display:inline"
                                                                  onsubmit="return confirm('Supprimer cet article ?')">
                                                                @csrf
                                                                <input type="hidden" name="champ_id" value="{{ $art['id'] }}">
                                                                <button class="btn btn-sm btn-outline-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    @if(count($grouped) == 0)
                        <div class="card">
                            <div class="card-body text-center py-5">
                                <p class="text-muted">Aucun article. Commencez par en ajouter un.</p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    // Quill éditeur — formulaire ajout
    const quillAdd = new Quill('#quill_editor_add', {
        modules: { toolbar: '#quill_toolbar_add' },
        theme: 'snow',
        placeholder: 'Rédigez le contenu de l\'article...',
    });

    // Injecter le HTML dans le champ hidden avant submit
    document.querySelector('form[action="{{ route('admin.articles.store') }}"]')
        .addEventListener('submit', function () {
            document.getElementById('contenu_add').value = quillAdd.root.innerHTML;
        });

    document.getElementById('photoInput').addEventListener('change', function () {
        const preview = document.getElementById('photoPreview');
        if (this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
