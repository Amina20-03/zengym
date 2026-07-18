<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu', ['menuprincipaleactive' => 'articles', 'menuactive' => 'articles'])
        <div class="layout-page">
            @include('layouts.admin.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Modifier l'article</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.articles.update', $detail['id']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Catégorie</label>
                                        <select name="categ_id" class="form-select">
                                            <option value="">-- Sans catégorie --</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat['id'] }}" {{ $detail['categ_id'] == $cat['id'] ? 'selected' : '' }}>
                                                    {{ $cat['desc'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Titre <span class="text-danger">*</span></label>
                                        <input type="text" name="titre" class="form-control" value="{{ $detail['titre'] }}" required>
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
                                            <div id="quill_toolbar_edit">
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
                                            <div id="quill_editor_edit"></div>
                                        </div>
                                        <input type="hidden" name="contenu" id="contenu_edit">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Image (laisser vide pour conserver l'actuelle)</label>
                                        <input type="file" name="photo" id="photoInput" class="form-control" accept="image/*">
                                        @if($detail['photo_url'])
                                            <img src="{{ $detail['photo_url'] }}" id="photoPreview"
                                                 style="max-height:120px;border-radius:6px;margin-top:8px;">
                                        @else
                                            <img id="photoPreview" src="" style="display:none;max-height:120px;border-radius:6px;margin-top:8px;">
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label fw-semibold">Ordre</label>
                                        <input type="number" name="ordre" class="form-control" value="{{ $detail['ordre'] }}" min="0">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Visibilité</label>
                                        <select name="active" class="form-select">
                                            <option value="1" {{ $detail['active'] ? 'selected' : '' }}>Visible</option>
                                            <option value="0" {{ !$detail['active'] ? 'selected' : '' }}>Masqué</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="fa fa-save me-1"></i> Enregistrer
                                    </button>
                                    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Annuler</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    const quillEdit = new Quill('#quill_editor_edit', {
        modules: { toolbar: '#quill_toolbar_edit' },
        theme: 'snow',
    });

    // Charger le contenu existant
    const existingContent = {!! json_encode($detail['contenu'] ?? '') !!};
    if (existingContent) {
        quillEdit.root.innerHTML = existingContent;
    }

    // Injecter dans le champ hidden avant submit
    document.querySelector('form[action="{{ route('admin.articles.update', $detail['id']) }}"]')
        .addEventListener('submit', function () {
            document.getElementById('contenu_edit').value = quillEdit.root.innerHTML;
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
