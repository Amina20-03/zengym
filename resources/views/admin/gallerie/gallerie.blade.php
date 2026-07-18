<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu', ['menuprincipaleactive' => 'gallerie', 'menuactive' => 'gallerie'])

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

                    <!-- Upload card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fa fa-upload me-2"></i>Ajouter des images</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.gallerie.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Catégorie <span class="text-danger">*</span></label>
                                        <select name="categ_id" class="form-select" required>
                                            <option value="">-- Choisir une catégorie --</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat['id'] }}">{{ $cat['desc'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Images <span class="text-danger">*</span></label>
                                        <input type="file" name="images[]" id="imagesInput" class="form-control"
                                               multiple accept="image/*" required>
                                        <small class="text-muted">JPG, PNG, GIF, WebP — Max 10 Mo — Conversion auto WebP 1200px</small>
                                    </div>
                                </div>

                                <!-- Prévisualisation -->
                                <div id="preview_container" class="row g-2 mt-2" style="display:none"></div>

                                <button type="submit" class="btn btn-primary mt-3">
                                    <i class="fa fa-cloud-upload me-1"></i> Envoyer
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Images par catégorie -->
                    @foreach($grouped as $group)
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fa fa-folder-open me-2 text-primary"></i>
                                    {{ $group['categ_desc'] }}
                                    <span class="badge bg-label-primary ms-2">{{ count($group['images']) }}</span>
                                </h5>
                            </div>
                            <div class="card-body">
                                @if(count($group['images']) == 0)
                                    <p class="text-muted text-center py-3">Aucune image dans cette catégorie.</p>
                                @else
                                    <div class="row g-3">
                                        @foreach($group['images'] as $img)
                                            <div class="col-6 col-md-3 col-lg-2">
                                                <div class="card h-100 border">
                                                    <div style="height:140px;overflow:hidden;background:#f8f8f8;">
                                                        <img src="{{ $img['photo_url'] }}"
                                                             alt="{{ $img['titre'] ?? '' }}"
                                                             style="width:100%;height:100%;object-fit:cover;">
                                                    </div>
                                                    <div class="card-body p-2">
                                                        <p class="small mb-1 text-truncate fw-semibold">{{ $img['titre'] ?? '—' }}</p>
                                                        <span class="badge {{ $img['active'] ? 'bg-label-success' : 'bg-label-secondary' }} mb-2" style="font-size:10px;">
                                                            {{ $img['active'] ? 'Visible' : 'Masquée' }}
                                                        </span>
                                                        <div class="d-flex gap-1">
                                                            <button class="btn btn-sm btn-outline-primary flex-grow-1"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalEdit"
                                                                    onclick="openEdit(
                                                                        {{ $img['id'] }},
                                                                        '{{ addslashes($img['titre'] ?? '') }}',
                                                                        '{{ addslashes($img['description'] ?? '') }}',
                                                                        {{ $img['categ_id'] ?? 'null' }},
                                                                        {{ $img['ordre'] }},
                                                                        {{ $img['active'] ? 'true' : 'false' }}
                                                                    )">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                    onclick="confirmDelete({{ $img['id'] }})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
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
                                <p class="text-muted">Aucune image dans la gallerie.</p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modifier -->
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <form action="" method="POST" id="formEdit">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier l'image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Catégorie</label>
                        <select name="categ_id" id="edit_categ_id" class="form-select">
                            <option value="">-- Sans catégorie --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat['id'] }}">{{ $cat['desc'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input type="text" name="titre" id="edit_titre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ordre d'affichage</label>
                        <input type="number" name="ordre" id="edit_ordre" class="form-control" min="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Visibilité</label>
                        <select name="active" id="edit_active" class="form-select">
                            <option value="1">Visible sur la vitrine</option>
                            <option value="0">Masquée</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Form suppression -->
<form id="formDelete" action="{{ route('admin.gallerie.delete') }}" method="POST" style="display:none">
    @csrf
    <input type="hidden" name="champ_id" id="delete_id">
</form>

<script>
    function openEdit(id, titre, description, categ_id, ordre, active) {
        document.getElementById('formEdit').action = '/admin/gallerie/update/' + id;
        document.getElementById('edit_titre').value = titre;
        document.getElementById('edit_description').value = description;
        document.getElementById('edit_categ_id').value = categ_id ?? '';
        document.getElementById('edit_ordre').value = ordre;
        document.getElementById('edit_active').value = active ? '1' : '0';
    }

    function confirmDelete(id) {
        if (confirm('Supprimer cette image ? Cette action est irréversible.')) {
            document.getElementById('delete_id').value = id;
            document.getElementById('formDelete').submit();
        }
    }

    document.getElementById('imagesInput').addEventListener('change', function () {
        const container = document.getElementById('preview_container');
        container.innerHTML = '';
        container.style.display = 'none';
        if (!this.files.length) return;
        container.style.display = 'flex';
        container.style.flexWrap = 'wrap';
        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const col = document.createElement('div');
                col.className = 'col-3 col-md-2';
                col.innerHTML = `<img src="${e.target.result}" style="width:100%;height:80px;object-fit:cover;border-radius:6px;border:1px solid #ddd">`;
                container.appendChild(col);
            };
            reader.readAsDataURL(file);
        });
    });
</script>
