<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu', ['menuprincipaleactive' => 'Paramétrage', 'menuactive' => 'article_categories'])
        <div class="layout-page">
            @include('layouts.admin.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4">Modifier la catégorie</h5>
                            <form method="POST" action="{{ route('admin.article_categories.update', $detail['id']) }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="desc" value="{{ $detail['desc'] }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Enregistrer</button>
                                <a href="{{ route('admin.article_categories.index') }}" class="btn btn-outline-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
