<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin.menu', ['menuprincipaleactive' => 'Paramétrage', 'menuactive' => 'article_categories'])
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

                    <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                        <div class="card" style="padding:10px">
                            <div class="row row-bordered g-0">
                                <div class="col-md-12" style="padding:10px;display:grid;">
                                    <div class="card-body">
                                        <div class="text-center fw-semibold">Ajouter une catégorie d'articles</div>
                                    </div>
                                    <form method="POST" action="{{ route('admin.article_categories.add') }}" class="row g-3">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="desc" placeholder="Description de la catégorie" required>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-datatable table-responsive">
                            <table class="datatables-users table">
                                <thead class="border-top">
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($liste as $item)
                                        <tr>
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['code'] }}</td>
                                            <td>{{ $item['desc'] }}</td>
                                            <td>
                                                <a href="{{ route('admin.article_categories.edit', $item['id']) }}"
                                                   class="btn btn-sm btn-outline-primary me-1">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.article_categories.delete') }}"
                                                      style="display:inline"
                                                      onsubmit="return confirm('Supprimer cette catégorie ?')">
                                                    @csrf
                                                    <input type="hidden" name="champ_id" value="{{ $item['id'] }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
