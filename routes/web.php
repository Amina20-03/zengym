<?php

use Illuminate\Support\Facades\Route;

//https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/

Route::get('/', function () {
    $Formations = DB::table('formations')->get();

    $Evenements = DB::table('evenements')
        ->select('id', 'titre', 'date_deb', 'date_fin', 'heure_deb', 'heure_fin',
                 'frais', 'devise', 'salle', 'approuver', 'type_even_id',
                 'instructeur_id', 'pays_id', 'affiche', 'sujet', 'desc', 'fait')
        ->get();

    // PROGRAMMES corrigé
    $Programmes = DB::table('programmes')
        ->select('id', 'titre', 'description', 'niveau', 'duree_semaines', 
                 'photo', 'actif')
        ->where('actif', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('welcome', [
        'Formations' => $Formations,
        'Evenements' => $Evenements,
        'Programmes' => $Programmes,
    ]);
})->name('accueil_vitrine');

Route::get('/devenir_instructeur', function () {
    return view('rejoignez_nous.devenir_instructeur');
})->name('rejoignez_nous.devenir_instructeur');
Route::get('/devenir_instructeur_demarche_iframe', function () {
    return view('rejoignez_nous.devenir_instructeur_demarche_iframe');
})->name('rejoignez_nous.devenir_instructeur_demarche_iframe');

Route::get('/devenir_representant', function () {
    return view('rejoignez_nous.devenir_represantant');
})->name('rejoignez_nous.devenir_representant');
Route::get('/devenir_representant_demarche_iframe', function () {
    return view('rejoignez_nous.devenir_represantant_demarche_iframe');
})->name('rejoignez_nous.devenir_representant_demarche_iframe');

Route::get('/devenir_franchise', function () {
    return view('rejoignez_nous.devenir_franchise');
})->name('rejoignez_nous.devenir_franchise');
Route::get('/devenir_franchise_demarche_iframe', function () {
    return view('rejoignez_nous.devenir_franchise_demarche_iframe');
})->name('rejoignez_nous.devenir_franchise_demarche_iframe');

Route::get('/devenir_adherent', function () {
    return view('rejoignez_nous.devenir_adherent');
})->name('rejoignez_nous.devenir_adherent');
Route::get('/devenir_adherent/inscription/{id_type_abo}', function ($id_type_abo) {
    $detail_type_abo = \Illuminate\Support\Facades\DB::table('type_abo_adherents')
        ->where('id', $id_type_abo)->first();
    return view('rejoignez_nous.devenir_adherent_inscrit', [
        'detail_type_abo' => $detail_type_abo,
    ]);
})->name('rejoignez_nous.devenir_adherent.inscription');

Route::get('/rejoignez_communaute_iframe', function () {
    return view('rejoignez_communaute_iframe');
})->name('rejoignez_communaute_iframe');
Route::get('/utilisation_marque_depose_iframe', function () {
    return view('utilisation_marque_depose_iframe');
})->name('utilisation_marque_depose_iframe');
Route::get('/notre_message_iframe', function () {
    return view('notre_message_iframe');
})->name('notre_message_iframe');

Route::get('/zengym_hotels', function () {
    return view('zengym_hotels.zengym_hotels');
})->name('zengym_hotels.zengym_hotels');
Route::get('/zengym_hotels/presentation_zengym_iframe', function () {
    return view('zengym_hotels.presentation_zengym_iframe');
})->name('zengym_hotels.presentation_zengym_iframe');
Route::get('/zengym_hotels/slogon_iframe', function () {
    return view('zengym_hotels.slogon_iframe');
})->name('zengym_hotels.slogon_iframe');
Route::get('/zengym_hotels/pourquoi_zengym_iframe', function () {
    return view('zengym_hotels.pourquoi_zengym_iframe');
})->name('zengym_hotels.pourquoi_zengym_iframe');
Route::get('/zengym_hotels/les_valeurs_fondamentales_du_zengym_iframe', function () {
    return view('zengym_hotels.les_valeurs_fondamentales_du_zengym_iframe');
})->name('zengym_hotels.les_valeurs_fondamentales_du_zengym_iframe');
Route::get('/zengym_hotels/innovation_fondée_prevention_bienveillance', function () {
    return view('zengym_hotels.innovation_fondée_prevention_bienveillance');
})->name('zengym_hotels.innovation_fondée_prevention_bienveillance');
Route::get('/zengym_hotels/formules_proposees', function () {
    return view('zengym_hotels.formules_proposees');
})->name('zengym_hotels.formules_proposees');
Route::get('/zengym_hotels/avantages_pour_hotel_iframe', function () {
    return view('zengym_hotels.avantages_pour_hotel_iframe');
})->name('zengym_hotels.avantages_pour_hotel_iframe');
Route::get('/zengym_hotels/collaboration_proposee_iframe', function () {
    return view('zengym_hotels.collaboration_proposee_iframe');
})->name('zengym_hotels.collaboration_proposee_iframe');

// -----------------------------------------------------------------------
// GALLERIE VITRINE — remplace l'ancienne route qui lisait la DB directement
// -----------------------------------------------------------------------
Route::get('/gallerie', function () {
    $response = \Illuminate\Support\Facades\Http::withHeaders([
        'Accept' => 'application/json',
    ])->get(env('API_URL') . 'gallerie/public');

    $data    = $response->json();
    $grouped = ($data['status'] ?? false) ? ($data['grouped'] ?? []) : [];

    return view('gallerie', ['grouped' => $grouped]);
})->name('gallerie');

Auth::routes();
Route::get('/formations_by_categ/{val}', [App\Http\Controllers\FormationController::class, 'index_formation'])->name('formations_by_categ');
Route::get('/formations/demande/details/{val}', [App\Http\Controllers\FormationController::class, 'detail_demande_formation'])->name('demande_formation.details');
Route::get('formation/details/iframe_carousel_photos/{val}', [App\Http\Controllers\FormationController::class, 'iframe_carousel_photos'])->name('formation.details.iframe_carousel_photos');
Route::get('formation/details/inscription_form/{val}', [App\Http\Controllers\FormationController::class, 'detail_formation_inscription_form'])->name('formation.details.inscription_form');
Route::post('formation/details/nouvelle_inscription/{val}', [App\Http\Controllers\FormationController::class, 'inscription_candidat'])->name('formation.details.new_inscription_candidat');
Route::post("formation/details/connexion", [App\Http\Controllers\FormationController::class, "connexion"])->name('formation.details.connexion');
Route::post('formation/details/payer_inscription/{val}', [App\Http\Controllers\FormationController::class, 'payer_candidat'])->name('formation.details.payer_candidat');
Route::get('formation/photos/{val}', [App\Http\Controllers\InstructeurController\FormationController::class, 'photos_formation'])->name('formation.photos');

Route::post('devenir_adherent/payer_inscription/{val}', [App\Http\Controllers\DevenirAdherentController::class, 'payer_candidat'])->name('devenir_adherent.payer_candidat');

Route::get('/a_propos', function () {
    return view('a_propos.a_propos');
})->name('a_propos_vitrine');
Route::get('/a_propos/ZenGym_Presentation_iframe', function () {
    return view('a_propos.ZenGym_Presentation_iframe');
})->name('a_propos.ZenGym_Presentation_iframe');
Route::get('/a_propos/Slogan_ZenGym_iframe', function () {
    return view('a_propos.Slogan_ZenGym_iframe');
})->name('a_propos.Slogan_ZenGym_iframe');
Route::get('/a_propos/Le_Concept_ZENGYM_iframe', function () {
    return view('a_propos.Le_Concept_ZENGYM_iframe');
})->name('a_propos.Le_Concept_ZENGYM_iframe');

Route::get('/contact', function () {
    return view('contact');
})->name('contact_vitrine');
Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs_vitrine');
Route::get('/blog-1', function () {
    return view('blog-1');
})->name('blog_1_vitrine');
Route::get('/blog-2', function () {
    return view('blog-2');
})->name('blog_2_vitrine');
Route::get('/blog-3', function () {
    return view('blog-3');
})->name('blog_3_vitrine');
Route::get('/blog-4', function () {
    return view('blog-4');
})->name('blog_4_vitrine');
Route::get('/instructeurs_by_categ/{val}', [App\Http\Controllers\InstructeurController::class, 'index_instructeur'])->name('instructeur_by_categ');
Route::get('instructeurs_by_categ/profile/{val}', [App\Http\Controllers\InstructeurController::class, 'index_profile'])->name('instructeur_by_categ.profile');
Route::get('instructeurs_by_categ/profile/photos/{val}', [App\Http\Controllers\InstructeurController::class, 'index_photo'])->name('instructeur_by_categ.profile.photos');
Route::get('instructeurs_by_categ/profile/videos/{val}', [App\Http\Controllers\InstructeurController::class, 'index_video'])->name('instructeur_by_categ.profile.videos');
Route::get('instructeurs_by_categ/profile/docs/{val}', [App\Http\Controllers\InstructeurController::class, 'index_doc'])->name('instructeur_by_categ.profile.docs');

Route::get('/evenements_by_categ/{val}', [App\Http\Controllers\EvenementController::class, 'index_evenement'])->name('evenement_by_categ');
Route::get('/evenements/details/{val}', [App\Http\Controllers\EvenementController::class, 'detail_evenement'])->name('evenement.details');
Route::get('/evenements/details/photos/{val}', [App\Http\Controllers\EvenementController::class, 'detail_evenement_photo'])->name('evenement.details.photos');
Route::get('evennements/photos/{val}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'photos_evennement'])->name('evennement.photos');

Route::get('/evenements/details/videos/{val}', [App\Http\Controllers\EvenementController::class, 'detail_evenement_video'])->name('evenement.details.videos');
Route::get('/evenements/details/inscription/{val}', [App\Http\Controllers\EvenementController::class, 'inscription_evenement'])->name('evenement.details.inscription');
Route::post('/evenements/details/inscription/connexion', [App\Http\Controllers\EvenementController::class, 'inscription_evenement_connexion'])->name('evenement.details.inscription.connexion');
Route::post('/evenements/details/inscription/new_candidat', [App\Http\Controllers\EvenementController::class, 'inscription_candidat_evenement'])->name('evenement.details.inscription.new_candidat');
Route::post('evenements/details/payer_inscription/{val}', [App\Http\Controllers\EvenementController::class, 'payer_candidat'])->name('evenement.details.payer_candidat');

Route::get('/cours', [App\Http\Controllers\CoursController::class, 'index_cours'])->name('cours_page');
Route::get('/cours_by_categ/{val}', [App\Http\Controllers\CoursController::class, 'index_cours_by_categ'])->name('cours_page_by_categ');
Route::post('/cours_by_categ/search', [App\Http\Controllers\CoursController::class, 'search_cours'])->name('cours_page_by_categ.search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('lang/change', 'App\Http\Controllers\LangController@change')->name('changeLang');

Route::get('/cours/en_ligne', [App\Http\Controllers\CoursController::class, 'index_enligne_cours'])->name('cours.en_ligne.index');

Route::get("shop", [App\Http\Controllers\ProduitController::class, "index"])->name('shop');
Route::get("shop/products/by_categorie/{val}", [App\Http\Controllers\ProduitController::class, "produit_by_categ"])->name('shop.by_categorie');
Route::get("shop/products/details/{val}", [App\Http\Controllers\ProduitController::class, "detail_produit"])->name('shop.produit.details');
Route::post("shop/products/add-to-card/{val}", [App\Http\Controllers\ProduitController::class, "cart_store"])->name('shop.produit.cart_store');
Route::get("shop/products/my-card/{val}", [App\Http\Controllers\ProduitController::class, "cart_index"])->name('shop.produit.cart_index');
Route::delete("shop/products/my-card/destroy/{val}", [App\Http\Controllers\ProduitController::class, "cart_destroy"])->name('shop.produit.cart_destroy');
Route::post("shop/products/my-card/connexion", [App\Http\Controllers\ProduitController::class, "connexion"])->name('shop.produit.cart.connexion');
Route::post("shop/products/my-card/inscription", [App\Http\Controllers\ProduitController::class, "inscription"])->name('shop.produit.cart.inscription');
Route::post("shop/products/my-card/payer", [App\Http\Controllers\ProduitController::class, "payer"])->name('shop.produit.cart.payer');

Route::get('/clear', function () {
    Cache::flush();
    Artisan::call('view:clear');
    Artisan::call('route:cache');
});

Route::get('admin/home', function () {
    return view('admin.dashboard.dashboard_component');
})->name('admin.home');
Route::get('instructeur/home', function () {
    return view('instructeur.dashboard.dashboard_component');
})->name('instructeur.home');
Route::get('candidat/home', function () {
    return view('candidat.dashboard.dashboard_component');
})->name('candidat.home');

Route::get('admin/liste_pays', [App\Http\Controllers\AdminControllers\PaysController::class, 'index_pays'])->name('admin.pays.index')->middleware('is_admin');
Route::get('admin/edit_pays/{val}', [App\Http\Controllers\AdminControllers\PaysController::class, 'edit_pays'])->name('admin.pays.edit')->middleware('is_admin');
Route::post('admin/update_pays/{val}', [App\Http\Controllers\AdminControllers\PaysController::class, 'update_pays'])->name('admin.pays.update')->middleware('is_admin');
Route::post('admin/suppression_pays', [App\Http\Controllers\AdminControllers\PaysController::class, 'delete_pays'])->name('admin.pays.delete')->middleware('is_admin');
Route::post('admin/ajout_pays', [App\Http\Controllers\AdminControllers\PaysController::class, 'add_pays'])->name('admin.pays.add')->middleware('is_admin');

Route::get('admin/liste_categorie_instructeur', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'index_cat_instructeur'])->name('admin.categorie_instructeur.index')->middleware('is_admin');
Route::post('admin/ajout_categorie_instructeur', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'add_cat_instructeur'])->name('admin.categorie_instructeur.add')->middleware('is_admin');
Route::get('admin/edit_categorie_instructeur/{val}', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'edit_cat_instructeur'])->name('admin.categorie_instructeur.edit')->middleware('is_admin');
Route::post('admin/update_categorie_instructeur/{val}', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'update_cat_instructeur'])->name('admin.categorie_instructeur.update')->middleware('is_admin');
Route::post('admin/suppression_categorie_instructeur', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'delete_cat_instructeur'])->name('admin.categorie_instructeur.delete')->middleware('is_admin');

Route::get('admin/liste_categorie_representant', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'index_cat_rep'])->name('admin.categorie_representant.index')->middleware('is_admin');
Route::post('admin/ajout_categorie_representant', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'add_cat_rep'])->name('admin.categorie_representant.add')->middleware('is_admin');
Route::get('admin/edit_categorie_representant/{val}', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'edit_cat_rep'])->name('admin.categorie_representant.edit')->middleware('is_admin');
Route::post('admin/update_categorie_representant/{val}', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'update_cat_rep'])->name('admin.categorie_representant.update')->middleware('is_admin');
Route::post('admin/suppression_categorie_representant', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'delete_cat_rep'])->name('admin.categorie_representant.delete')->middleware('is_admin');

Route::get('admin/liste_instructeurs', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'index_instructeur'])->name('admin.instructeur.index')->middleware('is_admin');
Route::post('admin/ajout_instructeur', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'add_instructeur'])->name('admin.instructeur.add')->middleware('is_admin');
Route::get('admin/edit_instructeur/{val}', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'edit_instructeur'])->name('admin.instructeur.edit')->middleware('is_admin');
Route::get('admin/update_instructeur_diplome_status/{val}', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'update_instructeur_diplome_status'])->name('admin.instructeur.update_diplome_status')->middleware('is_admin');
Route::post('admin/update_instructeur/{val}', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'update_instructeur'])->name('admin.instructeur.update')->middleware('is_admin');
Route::post('admin/update_instructeur_password/{val}', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'update_instructeur_password'])->name('admin.instructeur.updatepassword')->middleware('is_admin');
Route::post('admin/suppression_instructeur', [App\Http\Controllers\AdminControllers\InstructeurController::class, 'delete_instructeur'])->name('admin.instructeur.delete')->middleware('is_admin');

Route::get('admin/liste_representants', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'index_representant'])->name('admin.representant.index')->middleware('is_admin');
Route::post('admin/ajout_representant', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'add_representant'])->name('admin.representant.add')->middleware('is_admin');
Route::get('admin/edit_representant/{val}', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'edit_representant'])->name('admin.representant.edit')->middleware('is_admin');
Route::post('admin/update_representant/{val}', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'update_representant'])->name('admin.representant.update')->middleware('is_admin');
Route::post('admin/update_representant_password/{val}', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'update_representant_password'])->name('admin.representant.updatepassword')->middleware('is_admin');
Route::post('admin/suppression_representant', [App\Http\Controllers\AdminControllers\RepresentantController::class, 'delete_representant'])->name('admin.representant.delete')->middleware('is_admin');

Route::get('admin/liste_admins', [App\Http\Controllers\AdminControllers\AdminController::class, 'index_admin'])->name('admin.admin.index')->middleware('is_admin');
Route::post('admin/ajout_admin', [App\Http\Controllers\AdminControllers\AdminController::class, 'add_admin'])->name('admin.admin.add')->middleware('is_admin');
Route::get('admin/edit_admin/{val}', [App\Http\Controllers\AdminControllers\AdminController::class, 'edit_admin'])->name('admin.admin.edit')->middleware('is_admin');
Route::post('admin/update_admin/{val}', [App\Http\Controllers\AdminControllers\AdminController::class, 'update_admin'])->name('admin.admin.update')->middleware('is_admin');
Route::post('admin/update_admin_password/{val}', [App\Http\Controllers\AdminControllers\AdminController::class, 'update_admin_password'])->name('admin.admin.updatepassword')->middleware('is_admin');
Route::post('admin/suppression_admin', [App\Http\Controllers\AdminControllers\AdminController::class, 'delete_admin'])->name('admin.admin.delete')->middleware('is_admin');

Route::get('admin/evenement/liste_types', [App\Http\Controllers\AdminControllers\EvenementController::class, 'index_type'])->name('admin.evenement.type.index')->middleware('is_admin');
Route::get('admin/evenement/edit_type/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'edit_type'])->name('admin.evenement.type.edit')->middleware('is_admin');
Route::post('admin/evenement/update_type/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'update_type'])->name('admin.evenement.type.update')->middleware('is_admin');
Route::post('admin/evenement/suppression_type', [App\Http\Controllers\AdminControllers\EvenementController::class, 'delete_type'])->name('admin.evenement.type.delete')->middleware('is_admin');
Route::post('admin/evenement/ajout_types', [App\Http\Controllers\AdminControllers\EvenementController::class, 'add_type'])->name('admin.evenement.type.add')->middleware('is_admin');

Route::get('admin/evenements', [App\Http\Controllers\AdminControllers\EvenementController::class, 'index_evenement'])->name('admin.evenement.index')->middleware('is_admin');
Route::get('admin/evenements/create', [App\Http\Controllers\AdminControllers\EvenementController::class, 'create_evenement'])->name('admin.evenement.create')->middleware('is_admin');
Route::post('admin/evenements/create2', [App\Http\Controllers\AdminControllers\EvenementController::class, 'create2_evenement'])->name('admin.evenement.create2')->middleware('is_admin');
Route::post('admin/evenements/suppression', [App\Http\Controllers\AdminControllers\EvenementController::class, 'delete_evenement'])->name('admin.evenement.delete')->middleware('is_admin');
Route::post('admin/evenements/add', [App\Http\Controllers\AdminControllers\EvenementController::class, 'add_evenement'])->name('admin.evenement.add')->middleware('is_admin');
Route::get('admin/evenements/details/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'detail_evenement'])->name('admin.evenement.details')->middleware('is_admin');
Route::get('admin/evenements/details/photos/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'detail_evenement_photo'])->name('admin.evenement.details.photos')->middleware('is_admin');
Route::get('admin/evenements/details/videos/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'detail_evenement_video'])->name('admin.evenement.details.videos')->middleware('is_admin');
Route::post('admin/evenements/details/photos/add/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'add_evenement_photo'])->name('admin.evenement.details.photos.add')->middleware('is_admin');
Route::post('admin/evenements/details/videos/add/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'add_evenement_video'])->name('admin.evenement.details.videos.add')->middleware('is_admin');
Route::get('admin/evenements/details/photos/delete/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'delete_evenement_photo'])->name('admin.evenement.details.photos.delete')->middleware('is_admin');
Route::get('admin/evenements/details/videos/delete/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'delete_evenement_video'])->name('admin.evenement.details.videos.delete')->middleware('is_admin');

Route::post('admin/evenements/affecter_user/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'affecter_user'])->name('admin.evenement.affecter_user')->middleware('is_admin');
Route::post("admin/evenements/affecter_users/delete", [App\Http\Controllers\AdminControllers\EvenementController::class, "delete_affect_user"])->name('admin.evenement.affecter_user.delete')->middleware('is_admin');
Route::post("admin/evenements/affecter_candidats/delete", [App\Http\Controllers\AdminControllers\EvenementController::class, "delete_affect_candidat"])->name('admin.evenement.affecter_candidats.delete')->middleware('is_admin');

Route::get('admin/evenements/demande/liste', [App\Http\Controllers\AdminControllers\EvenementController::class, 'liste_demande_evenement'])->name('admin.evenement.demande.index')->middleware('is_admin');
Route::get('admin/evenements/demande/details/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'detail_demande_evenement'])->name('admin.evenement.demande.details')->middleware('is_admin');
Route::get('admin/evenements/demande/approuver/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'aprouver_dmd_evenement'])->name('admin.evenement.demande.aprouver')->middleware('is_admin');
Route::get('admin/evenements/demande/refuser/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'refuser_dmd_evenement'])->name('admin.evenement.demande.refuser')->middleware('is_admin');

Route::get('admin/evenements/candidats/liste/{val}', [App\Http\Controllers\AdminControllers\EvenementController::class, 'get_candidats_evennement'])->name('admin.evenement.candidats.liste')->middleware('is_admin');
Route::post('admin/evenements/candidats/change_payment_status', [App\Http\Controllers\AdminControllers\EvenementController::class, 'change_candidat_payment_status'])->name('admin.evenement.candidats.change_payment_status')->middleware('is_admin');

Route::get('admin/pourcentages', [App\Http\Controllers\AdminControllers\PourcentageController::class, 'index'])->name('admin.pourcentage.index')->middleware('is_admin');
Route::get('admin/pourcentages/edit/{val}', [App\Http\Controllers\AdminControllers\PourcentageController::class, 'edit'])->name('admin.pourcentage.edit')->middleware('is_admin');
Route::post('admin/pourcentages/update/{val}', [App\Http\Controllers\AdminControllers\PourcentageController::class, 'update'])->name('admin.pourcentage.update')->middleware('is_admin');
Route::post('admin/pourcentages/suppression', [App\Http\Controllers\AdminControllers\PourcentageController::class, 'delete'])->name('admin.pourcentage.delete')->middleware('is_admin');
Route::post('admin/pourcentages/ajout', [App\Http\Controllers\AdminControllers\PourcentageController::class, 'add'])->name('admin.pourcentage.add')->middleware('is_admin');

Route::get('admin/produits/categories', [App\Http\Controllers\AdminControllers\ProduitController::class, 'index_cat_produit'])->name('admin.categorie_produit.index')->middleware('is_admin');
Route::get('admin/produits/categories/edit/{val}', [App\Http\Controllers\AdminControllers\ProduitController::class, 'edit_cat_produit'])->name('admin.categorie_produit.edit')->middleware('is_admin');
Route::post('admin/produits/categories/update/{val}', [App\Http\Controllers\AdminControllers\ProduitController::class, 'update_cat_produit'])->name('admin.categorie_produit.update')->middleware('is_admin');
Route::post('admin/produits/categories/suppression', [App\Http\Controllers\AdminControllers\ProduitController::class, 'delete_cat_produit'])->name('admin.categorie_produit.delete')->middleware('is_admin');
Route::post('admin/produits/categories/ajout', [App\Http\Controllers\AdminControllers\ProduitController::class, 'add_cat_produit'])->name('admin.categorie_produit.add')->middleware('is_admin');

Route::get('admin/produits', [App\Http\Controllers\AdminControllers\ProduitController::class, 'index_produit'])->name('admin.produit.index')->middleware('is_admin');
Route::get('admin/produits/edit/{val}', [App\Http\Controllers\AdminControllers\ProduitController::class, 'edit_produit'])->name('admin.produit.edit')->middleware('is_admin');
Route::post('admin/produits/update/{val}', [App\Http\Controllers\AdminControllers\ProduitController::class, 'update_produit'])->name('admin.produit.update')->middleware('is_admin');
Route::post('admin/produits/suppression', [App\Http\Controllers\AdminControllers\ProduitController::class, 'delete_produit'])->name('admin.produit.delete')->middleware('is_admin');
Route::post('admin/produits/ajout', [App\Http\Controllers\AdminControllers\ProduitController::class, 'add_produit'])->name('admin.produit.add')->middleware('is_admin');

Route::get('admin/cours/categories', [App\Http\Controllers\AdminControllers\CoursController::class, 'index_categ_cours'])->name('admin.categ_cours.index')->middleware('is_admin');
Route::get('admin/cours/categories/edit/{val}', [App\Http\Controllers\AdminControllers\CoursController::class, 'edit_categ_cours'])->name('admin.categ_cours.edit')->middleware('is_admin');
Route::post('admin/cours/categories/update/{val}', [App\Http\Controllers\AdminControllers\CoursController::class, 'update_categ_cours'])->name('admin.categ_cours.update')->middleware('is_admin');
Route::post('admin/cours/categories/suppression', [App\Http\Controllers\AdminControllers\CoursController::class, 'delete_categ_cours'])->name('admin.categ_cours.delete')->middleware('is_admin');
Route::post('admin/cours/categories/ajout', [App\Http\Controllers\AdminControllers\CoursController::class, 'add_categ_cours'])->name('admin.categ_cours.add')->middleware('is_admin');

Route::get('admin/candidats/categories', [App\Http\Controllers\AdminControllers\CandidatController::class, 'index_categ_candidat'])->name('admin.categ_candidat.index')->middleware('is_admin');
Route::get('admin/candidats/categories/edit/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'edit_categ_candidat'])->name('admin.categ_candidat.edit')->middleware('is_admin');
Route::post('admin/candidats/categories/update/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'update_categ_candidat'])->name('admin.categ_candidat.update')->middleware('is_admin');
Route::post('admin/candidats/categories/suppression', [App\Http\Controllers\AdminControllers\CandidatController::class, 'delete_categ_candidat'])->name('admin.categ_candidat.delete')->middleware('is_admin');
Route::post('admin/candidats/categories/ajout', [App\Http\Controllers\AdminControllers\CandidatController::class, 'add_categ_candidat'])->name('admin.categ_candidat.add')->middleware('is_admin');

Route::get('admin/candidats/salle_de_sports', [App\Http\Controllers\AdminControllers\CandidatController::class, 'index_salle_sport'])->name('admin.candidat.salle_de_sports.index')->middleware('is_admin');
Route::get('admin/candidats/salle_de_sports/edit/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'edit_salle_sport'])->name('admin.candidat.salle_de_sports.edit')->middleware('is_admin');
Route::post('admin/candidats/salle_de_sports/update/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'update_salle_sport'])->name('admin.candidat.salle_de_sports.update')->middleware('is_admin');
Route::post('admin/candidats/salle_de_sports/suppression', [App\Http\Controllers\AdminControllers\CandidatController::class, 'delete_salle_sport'])->name('admin.candidat.salle_de_sports.delete')->middleware('is_admin');
Route::post('admin/candidats/salle_de_sports/ajout', [App\Http\Controllers\AdminControllers\CandidatController::class, 'add_salle_sport'])->name('admin.candidat.salle_de_sports.add')->middleware('is_admin');

Route::get('admin/candidats', [App\Http\Controllers\AdminControllers\CandidatController::class, 'index_candidat'])->name('admin.candidat.index')->middleware('is_admin');
Route::get('admin/candidats/edit/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'edit_candidat'])->name('admin.candidat.edit')->middleware('is_admin');
Route::post('admin/candidats/update/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'update_candidat'])->name('admin.candidat.update')->middleware('is_admin');
Route::post('admin/candidats/suppression', [App\Http\Controllers\AdminControllers\CandidatController::class, 'delete_candidat'])->name('admin.candidat.delete')->middleware('is_admin');
Route::post('admin/candidats/ajout', [App\Http\Controllers\AdminControllers\CandidatController::class, 'add_candidat'])->name('admin.candidat.add')->middleware('is_admin');

Route::get('admin/vente_abonnement/abonnements/categories', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'index_categ_abo'])->name('admin.categ_abo.index')->middleware('is_admin');
Route::get('admin/vente_abonnement/abonnements/categories/edit/{val}', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'edit_categ_abo'])->name('admin.categ_abo.edit')->middleware('is_admin');
Route::post('admin/vente_abonnement/abonnements/categories/update/{val}', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'update_categ_abo'])->name('admin.categ_abo.update')->middleware('is_admin');
Route::post('admin/vente_abonnement/abonnements/categories/suppression', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'delete_categ_abo'])->name('admin.categ_abo.delete')->middleware('is_admin');
Route::post('admin/vente_abonnement/abonnements/categories/ajout', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'add_categ_abo'])->name('admin.categ_abo.add')->middleware('is_admin');

Route::get('admin/vente_abonnement/abonnements/types', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'index_type_abo'])->name('admin.type_abo.index')->middleware('is_admin');
Route::get('admin/vente_abonnement/abonnements/types/edit/{val}', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'edit_type_abo'])->name('admin.type_abo.edit')->middleware('is_admin');
Route::post('admin/vente_abonnement/abonnements/types/update/{val}', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'update_type_abo'])->name('admin.type_abo.update')->middleware('is_admin');
Route::post('admin/vente_abonnement/abonnements/types/suppression', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'delete_type_abo'])->name('admin.type_abo.delete')->middleware('is_admin');
Route::post('admin/vente_abonnement/abonnements/types/ajout', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'add_type_abo'])->name('admin.type_abo.add')->middleware('is_admin');

Route::get('admin/abonnements/adherents/categories', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'index_categ_abo'])->name('admin.abo.adherent.categ_abo.index')->middleware('is_admin');
Route::get('admin/abonnements/adherents/categories/edit/{val}', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'edit_categ_abo'])->name('admin.abo.adherent.categ_abo.edit')->middleware('is_admin');
Route::post('admin/abonnements/adherents/categories/update/{val}', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'update_categ_abo'])->name('admin.abo.adherent.categ_abo.update')->middleware('is_admin');
Route::post('admin/abonnements/adherents/categories/suppression', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'delete_categ_abo'])->name('admin.abo.adherent.categ_abo.delete')->middleware('is_admin');
Route::post('admin/abonnements/adherents/categories/ajout', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'add_categ_abo'])->name('admin.abo.adherent.categ_abo.add')->middleware('is_admin');

Route::get('admin/abonnements/adherents/types', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'index_type_abo'])->name('admin.abonnements.adherents.type_abo.index')->middleware('is_admin');
Route::get('admin/abonnements/adherents/types/edit/{val}', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'edit_type_abo'])->name('admin.abonnements.adherents.type_abo.edit')->middleware('is_admin');
Route::post('admin/abonnements/adherents/types/update/{val}', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'update_type_abo'])->name('admin.abonnements.adherents.type_abo.update')->middleware('is_admin');
Route::post('admin/abonnements/adherents/types/suppression', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'delete_type_abo'])->name('admin.abonnements.adherents.type_abo.delete')->middleware('is_admin');
Route::post('admin/abonnements/adherents/types/ajout', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'add_type_abo'])->name('admin.abonnements.adherents.type_abo.add')->middleware('is_admin');

Route::get('admin/formations/categories', [App\Http\Controllers\AdminControllers\FormationController::class, 'index_cat_formation'])->name('admin.categorie_formation.index')->middleware('is_admin');
Route::get('admin/formations/categories/edit/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'edit_cat_formation'])->name('admin.categorie_formation.edit')->middleware('is_admin');
Route::post('admin/formations/categories/update/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'update_cat_formation'])->name('admin.categorie_formation.update')->middleware('is_admin');
Route::post('admin/formations/categories/suppression', [App\Http\Controllers\AdminControllers\FormationController::class, 'delete_cat_formation'])->name('admin.categorie_formation.delete')->middleware('is_admin');
Route::post('admin/formations/categories/ajout', [App\Http\Controllers\AdminControllers\FormationController::class, 'add_cat_formation'])->name('admin.categorie_formation.add')->middleware('is_admin');

Route::get('admin/formations/demande/liste', [App\Http\Controllers\AdminControllers\FormationController::class, 'liste_demande_formation'])->name('admin.demande_formation.index')->middleware('is_admin');
Route::get('admin/formations/demande/details/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'detail_demande_formation'])->name('admin.demande_formation.details')->middleware('is_admin');
Route::get('admin/formations/demande/details/livret_scientifique/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'detail_demande_formation_livret_scientifique'])->name('admin.demande_formation.details.livret_scientifique')->middleware('is_admin');
Route::get('admin/formations/demande/details/prog_de_formation/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'detail_demande_formation_prog_de_formation'])->name('admin.demande_formation.details.prog_de_formation')->middleware('is_admin');
Route::get('admin/formations/demande/details/presentation_power_point/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'detail_demande_formation_presentation_power_point'])->name('admin.demande_formation.details.presentation_power_point')->middleware('is_admin');
Route::get('admin/formations/demande/details/video_basic_one/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'detail_demande_formation_video_basic_one'])->name('admin.demande_formation.details.video_basic_one')->middleware('is_admin');

Route::get('admin/formations/details/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'detail_formation'])->name('admin.formation.details')->middleware('is_admin');
Route::get('admin/formations/demande/details/approuver/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'aprouver_dmd_formation'])->name('admin.demande_formation.details.approuver')->middleware('is_admin');
Route::get('admin/formations/demande/details/refuser/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'refuser_dmd_formation'])->name('admin.demande_formation.details.refuser')->middleware('is_admin');
Route::post('admin/formations/affecter_candidat/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'affecter_candidat'])->name('admin.formation.affecter_candidat')->middleware('is_admin');
Route::post("admin/formations/affecter_candidats/delete/{val}", [App\Http\Controllers\AdminControllers\FormationController::class, "delete_affect_candidat"])->name('admin.formation.affecter_candidat.delete')->middleware('is_admin');
Route::get("admin/formations/affecter_candidats/transferer_candidat_vers_instructeur/{id_user}/{id_formation}", [App\Http\Controllers\AdminControllers\FormationController::class, "transferer_candidat_vers_instructeur"])->name('admin.formation.affecter_candidat.transferer_candidat_vers_instructeur')->middleware('is_admin');

Route::get('admin/formations', [App\Http\Controllers\AdminControllers\FormationController::class, 'index_formation'])->name('admin.formation.index')->middleware('is_admin');

Route::get('admin/vente_prods', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'index_vente_prod'])->name('admin.vente_prod.index')->middleware('is_admin');
Route::get('admin/vente_prods/create', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'create_vente_prod'])->name('admin.vente_prod.create')->middleware('is_admin');
Route::post('admin/vente_prods/ajout', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'add_vente'])->name('admin.vente_prod.add')->middleware('is_admin');
Route::post('admin/vente_prods/suppression', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'delete_vente'])->name('admin.vente_prod.delete')->middleware('is_admin');
Route::post('admin/vente_prods/ligne_vente/suppression', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'delete_ligne_vente'])->name('admin.vente_prod.ligne_vente.delete')->middleware('is_admin');
Route::get('admin/vente_prods/edit/{val}', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'edit_vente'])->name('admin.vente_prod.edit')->middleware('is_admin');
Route::post('admin/vente_prods/search', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'search'])->name('admin.vente_prod.search')->middleware('is_admin');
Route::get('admin/vente_prods/encaisse/{val}', [App\Http\Controllers\AdminControllers\VenteProdController::class, 'encaisse_vente'])->name('admin.vente_prod.encaisse')->middleware('is_admin');

Route::get('admin/vente_abos', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'index_abo'])->name('admin.vente_abo.index')->middleware('is_admin');
Route::post('admin/vente_abos/suppression', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'delete_abo'])->name('admin.vente_abo.delete')->middleware('is_admin');
Route::get('admin/vente_abos/create', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'create_vente_abo'])->name('admin.vente_abo.create')->middleware('is_admin');
Route::post('admin/vente_abos/add', [App\Http\Controllers\AdminControllers\VenteAboController::class, 'add_abo'])->name('admin.vente_abo.add')->middleware('is_admin');

Route::get('admin/abonnement/adherent', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'index_abo'])->name('admin.abonnement.adherent.index')->middleware('is_admin');
Route::get('admin/abonnement/adherent/valider/{val}', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'valider_abo_adherent'])->name('admin.abonnement.adherent.valider')->middleware('is_admin');
Route::post('admin/abonnement/adherent/suppression', [App\Http\Controllers\AdminControllers\AboAdherentController::class, 'delete_abo'])->name('admin.abonnement.adherent.delete')->middleware('is_admin');

Route::get('admin/stock_vente/Liste_fournisseur', [App\Http\Controllers\AdminControllers\StockVenteControllers\FournisseursController::class, 'index'])->name('admin.stock_vente.fournisseur.index')->middleware('is_admin');
Route::get('admin/stock_vente/fournisseur/edit/{val}', [App\Http\Controllers\AdminControllers\StockVenteControllers\FournisseursController::class, 'edit'])->name('admin.stock_vente.fournisseur.edit')->middleware('is_admin');
Route::post('admin/stock_vente/fournisseur/add', [App\Http\Controllers\AdminControllers\StockVenteControllers\FournisseursController::class, 'add'])->name('admin.stock_vente.fournisseur.add')->middleware('is_admin');
Route::post('admin/stock_vente/fournisseur/update/{val}', [App\Http\Controllers\AdminControllers\StockVenteControllers\FournisseursController::class, 'update'])->name('admin.stock_vente.fournisseur.update')->middleware('is_admin');
Route::post('admin/stock_vente/fournisseur/delete', [App\Http\Controllers\AdminControllers\StockVenteControllers\FournisseursController::class, 'delete'])->name('admin.stock_vente.fournisseur.delete')->middleware('is_admin');

Route::get('admin/stock_vente/Liste_bon_entre', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonEntreController::class, 'index'])->name('admin.stock_vente.bon_entre.index')->middleware('is_admin');
Route::get('admin/stock_vente/bon_entre/create', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonEntreController::class, 'create'])->name('admin.stock_vente.bon_entre.create')->middleware('is_admin');
Route::post('admin/stock_vente/bon_entre/add', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonEntreController::class, 'add'])->name('admin.stock_vente.bon_entre.add')->middleware('is_admin');
Route::get('admin/stock_vente/bon_entre/edit/{val}', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonEntreController::class, 'edit'])->name('admin.stock_vente.bon_entre.edit')->middleware('is_admin');
Route::post('admin/stock_vente/bon_entre/update/{val}', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonEntreController::class, 'update'])->name('admin.stock_vente.bon_entre.update')->middleware('is_admin');
Route::post('admin/stock_vente/bon_entre/delete', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonEntreController::class, 'delete'])->name('admin.stock_vente.bon_entre.delete')->middleware('is_admin');
Route::post('admin/stock_vente/bon_entre/search', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonEntreController::class, 'search'])->name('admin.stock_vente.bon_entre.search')->middleware('is_admin');

Route::get('admin/stock_vente/Liste_bon_sortie', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonSortieController::class, 'index'])->name('admin.stock_vente.bon_sortie.index')->middleware('is_admin');
Route::get('admin/stock_vente/bon_sortie/create', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonSortieController::class, 'create'])->name('admin.stock_vente.bon_sortie.create')->middleware('is_admin');
Route::post('admin/stock_vente/bon_sortie/add', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonSortieController::class, 'add'])->name('admin.stock_vente.bon_sortie.add')->middleware('is_admin');
Route::get('admin/stock_vente/bon_sortie/edit/{val}', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonSortieController::class, 'edit'])->name('admin.stock_vente.bon_sortie.edit')->middleware('is_admin');
Route::post('admin/stock_vente/bon_sortie/update/{val}', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonSortieController::class, 'update'])->name('admin.stock_vente.bon_sortie.update')->middleware('is_admin');
Route::post('admin/stock_vente/bon_sortie/delete', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonSortieController::class, 'delete'])->name('admin.stock_vente.bon_sortie.delete')->middleware('is_admin');
Route::post('admin/stock_vente/bon_sortie/search', [App\Http\Controllers\AdminControllers\StockVenteControllers\BonSortieController::class, 'search'])->name('admin.stock_vente.bon_sortie.search')->middleware('is_admin');
////////////////
Route::get('admin/programmes',                [App\Http\Controllers\AdminControllers\ProgrammeController::class, 'index'])->name('admin.programmes.index')->middleware('is_admin');
Route::get('admin/programmes/create',         [App\Http\Controllers\AdminControllers\ProgrammeController::class, 'create'])->name('admin.programmes.create')->middleware('is_admin');
Route::post('admin/programmes/store',         [App\Http\Controllers\AdminControllers\ProgrammeController::class, 'store'])->name('admin.programmes.store')->middleware('is_admin');
Route::get('admin/programmes/edit/{id}',      [App\Http\Controllers\AdminControllers\ProgrammeController::class, 'edit'])->name('admin.programmes.edit')->middleware('is_admin');
Route::post('admin/programmes/update/{id}',   [App\Http\Controllers\AdminControllers\ProgrammeController::class, 'update'])->name('admin.programmes.update')->middleware('is_admin');
Route::post('admin/programmes/delete', [App\Http\Controllers\AdminControllers\ProgrammeController::class, 'destroy'])->name('admin.programmes.delete')->middleware('is_admin');Route::get('admin/programmes/video/delete/{video_id}', [App\Http\Controllers\AdminControllers\ProgrammeController::class, 'deleteVideo'])->name('admin.programmes.video.delete')->middleware('is_admin');
////////////////////////////
Route::get('admin/stock_vente/Liste_stock', [App\Http\Controllers\AdminControllers\StockVenteControllers\StockController::class, 'index'])->name('admin.stock_vente.stock.index')->middleware('is_admin');
Route::get('admin/instructeurs/comptes', [App\Http\Controllers\AdminControllers\CompteController::class, 'index_compte'])->name('admin.instructeur.compte.index')->middleware('is_admin');
Route::get('admin/instructeurs/comptes/operations/{val}', [App\Http\Controllers\AdminControllers\CompteController::class, 'index_operation'])->name('admin.instructeur.compte.operation.index')->middleware('is_admin');
Route::post('admin/instructeurs/comptes/operations', [App\Http\Controllers\AdminControllers\CompteController::class, 'search'])->name('admin.instructeur.compte.operation.search')->middleware('is_admin');
Route::post('admin/instructeurs/comptes/operations/add', [App\Http\Controllers\AdminControllers\CompteController::class, 'add_operation'])->name('admin.instructeur.compte.operation.add')->middleware('is_admin');

Route::get('admin/cours', [App\Http\Controllers\AdminControllers\CoursController::class, 'index_cours'])->name('admin.cours.index')->middleware('is_admin');
Route::get('admin/cours/details/{val}', [App\Http\Controllers\AdminControllers\CoursController::class, 'detail_cours'])->name('admin.cours.details')->middleware('is_admin');
Route::get('admin/cours/demande/liste', [App\Http\Controllers\AdminControllers\CoursController::class, 'liste_demande_cours'])->name('admin.demande_cours.index')->middleware('is_admin');
Route::get('admin/cours/demande_details/{val}', [App\Http\Controllers\AdminControllers\CoursController::class, 'detail_demande_cours'])->name('admin.demande_cours.details')->middleware('is_admin');
Route::get('admin/cours/demande/details/approuver/{val}', [App\Http\Controllers\AdminControllers\CoursController::class, 'aprouver_dmd_cours'])->name('admin.demande_cours.details.approuver')->middleware('is_admin');
Route::get('admin/cours/demande/details/refuser/{val}', [App\Http\Controllers\AdminControllers\CoursController::class, 'refuser_dmd_cours'])->name('admin.demande_cours.details.refuser')->middleware('is_admin');
Route::post('admin/cours/affecter_candidat/{val}', [App\Http\Controllers\AdminControllers\CoursController::class, 'affecter_candidat'])->name('admin.cours.affecter_candidat')->middleware('is_admin');
Route::post("admin/cours/affecter_candidats/delete", [App\Http\Controllers\AdminControllers\CoursController::class, "delete_affect_candidat"])->name('admin.cours.affecter_candidat.delete')->middleware('is_admin');
Route::post('admin/cours/add', [App\Http\Controllers\AdminControllers\CoursController::class, 'add_cours'])->name('admin.cours.add')->middleware('is_admin');

Route::get('admin/categorie_media/photos', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'index_cat_photos'])->name('admin.categorie_media.photos.index')->middleware('is_admin');
Route::post('admin/categorie_media/photos/add', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'add_cat_photos'])->name('admin.categorie_media.photos.add')->middleware('is_admin');
Route::get('admin/categorie_media/photos/edit/{val}', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'edit_cat_photos'])->name('admin.categorie_media.photos.edit')->middleware('is_admin');
Route::post('admin/categorie_media/photos/update/{val}', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'update_cat_photos'])->name('admin.categorie_media.photos.update')->middleware('is_admin');
Route::post('admin/categorie_media/photos/delete', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'delete_cat_photos'])->name('admin.categorie_media.photos.delete')->middleware('is_admin');

Route::get('admin/categorie_media/videos', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'index_cat_videos'])->name('admin.categorie_media.videos.index')->middleware('is_admin');
Route::post('admin/categorie_media/videos/add', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'add_cat_videos'])->name('admin.categorie_media.videos.add')->middleware('is_admin');
Route::get('admin/categorie_media/videos/edit/{val}', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'edit_cat_videos'])->name('admin.categorie_media.videos.edit')->middleware('is_admin');
Route::post('admin/categorie_media/videos/update/{val}', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'update_cat_videos'])->name('admin.categorie_media.videos.update')->middleware('is_admin');
Route::post('admin/categorie_media/videos/delete', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'delete_cat_videos'])->name('admin.categorie_media.videos.delete')->middleware('is_admin');

Route::get('admin/categorie_media/documents', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'index_cat_documents'])->name('admin.categorie_media.documents.index')->middleware('is_admin');
Route::post('admin/categorie_media/documents/add', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'add_cat_documents'])->name('admin.categorie_media.documents.add')->middleware('is_admin');
Route::get('admin/categorie_media/documents/edit/{val}', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'edit_cat_documents'])->name('admin.categorie_media.documents.edit')->middleware('is_admin');
Route::post('admin/categorie_media/documents/update/{val}', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'update_cat_documents'])->name('admin.categorie_media.documents.update')->middleware('is_admin');
Route::post('admin/categorie_media/documents/delete', [App\Http\Controllers\AdminControllers\CategorieMediaController::class, 'delete_cat_documents'])->name('admin.categorie_media.documents.delete')->middleware('is_admin');

Route::post('admin/formations/suppression', [App\Http\Controllers\AdminControllers\FormationController::class, 'delete_formation'])->name('admin.formation.delete')->middleware('is_admin');
Route::get('admin/formations/encaisse/{val}', [App\Http\Controllers\AdminControllers\FormationController::class, 'encaisse_formation'])->name('admin.formation.encaisse')->middleware('is_admin');

Route::get('admin/candidat/passage_vers_instructeur/form/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'passage_vers_instructeur_form'])->name('admin.candidat.passage_vers_instructeur.form')->middleware('is_admin');
Route::post('admin/candidat/passage_vers_instructeur/{val}', [App\Http\Controllers\AdminControllers\CandidatController::class, 'passage_vers_instructeur'])->name('admin.candidat.passage_vers_instructeur')->middleware('is_admin');

// -----------------------------------------------------------------------
// ARTICLES VITRINE
// -----------------------------------------------------------------------
Route::get('/articles', function () {
    $response = \Illuminate\Support\Facades\Http::withHeaders([
        'Accept' => 'application/json',
    ])->get(env('API_URL') . 'articles/public');

    $data    = $response->json();
    $grouped = ($data['status'] ?? false) ? ($data['grouped'] ?? []) : [];

    return view('articles', ['grouped' => $grouped]);
})->name('articles_vitrine');

Route::get('/articles/{id}', function ($id) {
    $response = \Illuminate\Support\Facades\Http::withHeaders([
        'Accept' => 'application/json',
    ])->get(env('API_URL') . 'articles/public/' . $id);

    $data = $response->json();
    if (!($data['status'] ?? false)) abort(404);

    return view('article_detail', [
        'article'     => $data['article'],
        'suggestions' => $data['suggestions'] ?? [],
    ]);
})->name('article_detail');

// -----------------------------------------------------------------------
// GALLERIE ADMIN
// -----------------------------------------------------------------------
Route::get('admin/gallerie', [App\Http\Controllers\AdminControllers\GallerieController::class, 'index'])->name('admin.gallerie.index')->middleware('is_admin');
Route::post('admin/gallerie/store', [App\Http\Controllers\AdminControllers\GallerieController::class, 'store'])->name('admin.gallerie.store')->middleware('is_admin');
Route::post('admin/gallerie/update/{id}', [App\Http\Controllers\AdminControllers\GallerieController::class, 'update'])->name('admin.gallerie.update')->middleware('is_admin');
Route::post('admin/gallerie/delete', [App\Http\Controllers\AdminControllers\GallerieController::class, 'delete'])->name('admin.gallerie.delete')->middleware('is_admin');

// -----------------------------------------------------------------------
// ARTICLES ADMIN
// -----------------------------------------------------------------------
Route::get('admin/article_categories', [App\Http\Controllers\AdminControllers\ArticleCategorieController::class, 'index'])->name('admin.article_categories.index')->middleware('is_admin');
Route::post('admin/article_categories/add', [App\Http\Controllers\AdminControllers\ArticleCategorieController::class, 'add'])->name('admin.article_categories.add')->middleware('is_admin');
Route::get('admin/article_categories/edit/{id}', [App\Http\Controllers\AdminControllers\ArticleCategorieController::class, 'edit'])->name('admin.article_categories.edit')->middleware('is_admin');
Route::post('admin/article_categories/update/{id}', [App\Http\Controllers\AdminControllers\ArticleCategorieController::class, 'update'])->name('admin.article_categories.update')->middleware('is_admin');
Route::post('admin/article_categories/delete', [App\Http\Controllers\AdminControllers\ArticleCategorieController::class, 'delete'])->name('admin.article_categories.delete')->middleware('is_admin');

Route::get('admin/articles', [App\Http\Controllers\AdminControllers\ArticleController::class, 'index'])->name('admin.articles.index')->middleware('is_admin');
Route::post('admin/articles/store', [App\Http\Controllers\AdminControllers\ArticleController::class, 'store'])->name('admin.articles.store')->middleware('is_admin');
Route::get('admin/articles/edit/{id}', [App\Http\Controllers\AdminControllers\ArticleController::class, 'edit'])->name('admin.articles.edit')->middleware('is_admin');
Route::post('admin/articles/update/{id}', [App\Http\Controllers\AdminControllers\ArticleController::class, 'update'])->name('admin.articles.update')->middleware('is_admin');
Route::post('admin/articles/delete', [App\Http\Controllers\AdminControllers\ArticleController::class, 'delete'])->name('admin.articles.delete')->middleware('is_admin');

Route::get('instructeur/candidats', [App\Http\Controllers\InstructeurController\CandidatController::class, 'index_candidat'])->name('instructeur.candidat.index')->middleware('is_instructeur');
Route::get('instructeur/candidats/show/{val}', [App\Http\Controllers\InstructeurController\CandidatController::class, 'show_candidat'])->name('instructeur.candidat.show')->middleware('is_instructeur');
Route::get("instructeur/candidats/{candidat_id}/rendez-vous", [App\Http\Controllers\InstructeurController\RendezVousController::class, "ficheRdv"])->name("instructeur.fiche_rdv")->middleware("is_instructeur");

// Candidat — Programmes
Route::get('candidat/programmes', [App\Http\Controllers\CandidatControllers\ProgrammeController::class, 'index'])->name('candidat.programmes.index')->middleware('is_candidat');
Route::get('candidat/programmes/{id}', [App\Http\Controllers\CandidatControllers\ProgrammeController::class, 'show'])->name('candidat.programmes.show')->middleware('is_candidat');

// Candidat — Profil
Route::get('candidat/profile',                [App\Http\Controllers\CandidatControllers\ProfileController::class, 'index'])->name('candidat.profile')->middleware('is_candidat');
Route::post('candidat/profile/update',        [App\Http\Controllers\CandidatControllers\ProfileController::class, 'update'])->name('candidat.profile.update')->middleware('is_candidat');
Route::post('candidat/profile/photo',         [App\Http\Controllers\CandidatControllers\ProfileController::class, 'uploadPhoto'])->name('candidat.profile.photo')->middleware('is_candidat');

// Candidat — Profil Santé
Route::get("candidat/profil-sante",              [App\Http\Controllers\CandidatControllers\ProfilSanteController::class, "index"])->name("candidat.profil_sante.index")->middleware("is_candidat");
Route::get("candidat/profil-sante/ajouter",      [App\Http\Controllers\CandidatControllers\ProfilSanteController::class, "create"])->name("candidat.profil_sante.create")->middleware("is_candidat");
Route::post("candidat/profil-sante/store",       [App\Http\Controllers\CandidatControllers\ProfilSanteController::class, "store"])->name("candidat.profil_sante.store")->middleware("is_candidat");
Route::get("candidat/profil-sante/edit/{id}",    [App\Http\Controllers\CandidatControllers\ProfilSanteController::class, "edit"])->name("candidat.profil_sante.edit")->middleware("is_candidat");
Route::post("candidat/profil-sante/update/{id}", [App\Http\Controllers\CandidatControllers\ProfilSanteController::class, "update"])->name("candidat.profil_sante.update")->middleware("is_candidat");
Route::get("candidat/profil-sante/delete/{id}",  [App\Http\Controllers\CandidatControllers\ProfilSanteController::class, "destroy"])->name("candidat.profil_sante.delete")->middleware("is_candidat");
Route::get("candidat/profil-sante/historique",    [App\Http\Controllers\CandidatControllers\ProfilSanteController::class, "historique"])->name("candidat.profil_sante.historique")->middleware("is_candidat");

// Candidat — Rendez-vous
Route::get("candidat/rendez-vous",              [App\Http\Controllers\CandidatControllers\RendezVousController::class, "index"])->name("candidat.rdv.index")->middleware("is_candidat");
Route::get("candidat/rendez-vous/create",       [App\Http\Controllers\CandidatControllers\RendezVousController::class, "create"])->name("candidat.rdv.create")->middleware("is_candidat");
Route::post("candidat/rendez-vous/store",       [App\Http\Controllers\CandidatControllers\RendezVousController::class, "store"])->name("candidat.rdv.store")->middleware("is_candidat");
Route::get("candidat/rendez-vous/delete/{id}", [App\Http\Controllers\CandidatControllers\RendezVousController::class, "destroy"])->name("candidat.rdv.delete")->middleware("is_candidat");
//Route::get('instructeur/programmes',                [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'index'])->name('instructeur.programmes.index')->middleware('is_instructeur');
//Route::get('instructeur/programmes/create',         [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'create'])->name('instructeur.programmes.create')->middleware('is_instructeur');
//Route::post('instructeur/programmes/store',         [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'store'])->name('instructeur.programmes.store')->middleware('is_instructeur');
//Route::get('instructeur/programmes/edit/{id}',      [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'edit'])->name('instructeur.programmes.edit')->middleware('is_instructeur');
//Route::post('instructeur/programmes/update/{id}',   [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'update'])->name('instructeur.programmes.update')->middleware('is_instructeur');
//Route::get('instructeur/programmes/delete/{id}',          [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'destroy'])->name('instructeur.programmes.delete')->middleware('is_instructeur');
//Route::get('instructeur/programmes/video/delete/{video_id}', [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'deleteVideo'])->name('instructeur.programmes.video.delete')->middleware('is_instructeur');
Route::get('instructeur/programmes', [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'index'])->name('instructeur.programmes.index')->middleware('is_instructeur');
Route::get('instructeur/programmes/details/{id}', [App\Http\Controllers\InstructeurController\ProgrammeController::class, 'show'])->name('instructeur.programmes.details')->middleware('is_instructeur');
// Programmes candidat
Route::get('instructeur/candidat/{candidat_id}/programmes',              [App\Http\Controllers\InstructeurController\CandidatProgrammeController::class, 'index'])->name('instructeur.candidat_programmes.index')->middleware('is_instructeur');
Route::get("instructeur/candidat/{candidat_id}/rendez-vous", [App\Http\Controllers\InstructeurController\RendezVousController::class, "ficheRdv"])->name("instructeur.fiche_rdv")->middleware("is_instructeur");
Route::post('instructeur/candidat/{candidat_id}/programmes/assign',      [App\Http\Controllers\InstructeurController\CandidatProgrammeController::class, 'assign'])->name('instructeur.candidat_programmes.assign')->middleware('is_instructeur');
Route::post('instructeur/candidat/programmes/unassign/{pivot_id}',       [App\Http\Controllers\InstructeurController\CandidatProgrammeController::class, 'unassign'])->name('instructeur.candidat_programmes.unassign')->middleware('is_instructeur');
// Rendez-vous instructeur
Route::get("instructeur/rendez-vous",                [App\Http\Controllers\InstructeurController\RendezVousController::class, "index"])->name("instructeur.rendez_vous.index")->middleware("is_instructeur");
Route::post("instructeur/rendez-vous/accepter/{id}", [App\Http\Controllers\InstructeurController\RendezVousController::class, "accepter"])->name("instructeur.rendez_vous.accepter")->middleware("is_instructeur");
Route::post("instructeur/rendez-vous/refuser/{id}",  [App\Http\Controllers\InstructeurController\RendezVousController::class, "refuser"])->name("instructeur.rendez_vous.refuser")->middleware("is_instructeur");
Route::get("instructeur/rendez-vous/delete/{id}",    [App\Http\Controllers\InstructeurController\RendezVousController::class, "destroy"])->name("instructeur.rendez_vous.delete")->middleware("is_instructeur");

Route::post('instructeur/candidat/programmes/statut/{pivot_id}',         [App\Http\Controllers\InstructeurController\CandidatProgrammeController::class, 'updateStatut'])->name('instructeur.candidat_programmes.statut')->middleware('is_instructeur');
Route::get('instructeur/suivi-sante/{candidat_id}',         [App\Http\Controllers\InstructeurController\SuiviSanteController::class, 'index'])->name('instructeur.suivi_sante.index')->middleware('is_instructeur');
Route::get("instructeur/candidat/{candidat_id}/profil-sante", [App\Http\Controllers\InstructeurController\SuiviSanteController::class, "profilSanteCandidat"])->name("instructeur.profil_sante_candidat")->middleware("is_instructeur");
Route::get('instructeur/suivi-sante/{candidat_id}/ajouter', [App\Http\Controllers\InstructeurController\SuiviSanteController::class, 'create'])->name('instructeur.suivi_sante.create')->middleware('is_instructeur');
Route::post('instructeur/suivi-sante/{candidat_id}/store',  [App\Http\Controllers\InstructeurController\SuiviSanteController::class, 'store'])->name('instructeur.suivi_sante.store')->middleware('is_instructeur');
Route::get('instructeur/suivi-sante/edit/{id}',             [App\Http\Controllers\InstructeurController\SuiviSanteController::class, 'edit'])->name('instructeur.suivi_sante.edit')->middleware('is_instructeur');
Route::post('instructeur/suivi-sante/update/{id}',          [App\Http\Controllers\InstructeurController\SuiviSanteController::class, 'update'])->name('instructeur.suivi_sante.update')->middleware('is_instructeur');
Route::get('instructeur/suivi-sante/delete/{id}',           [App\Http\Controllers\InstructeurController\SuiviSanteController::class, 'destroy'])->name('instructeur.suivi_sante.delete')->middleware('is_instructeur');
Route::get('instructeur/candidats/edit/{val}', [App\Http\Controllers\InstructeurController\CandidatController::class, 'edit_candidat'])->name('instructeur.candidat.edit')->middleware('is_instructeur');
Route::get("instructeur/suivi-sante/{candidat_id}/rapport", [App\Http\Controllers\InstructeurController\SuiviSanteController::class, "rapport"])->name("instructeur.suivi_sante.rapport")->middleware("is_instructeur");
Route::post("instructeur/suivi-sante/{candidat_id}/rapport/email", [App\Http\Controllers\InstructeurController\SuiviSanteController::class, "sendRapportEmail"])->name("instructeur.suivi_sante.rapport.email")->middleware("is_instructeur");
Route::post('instructeur/candidats/update/{val}', [App\Http\Controllers\InstructeurController\CandidatController::class, 'update_candidat'])->name('instructeur.candidat.update')->middleware('is_instructeur');
Route::post('instructeur/candidats/suppression', [App\Http\Controllers\InstructeurController\CandidatController::class, 'delete_candidat'])->name('instructeur.candidat.delete')->middleware('is_instructeur');
Route::post('instructeur/candidats/ajout', [App\Http\Controllers\InstructeurController\CandidatController::class, 'add_candidat'])->name('instructeur.candidat.add')->middleware('is_instructeur');

Route::get('instructeur/vente_prods', [App\Http\Controllers\InstructeurController\VenteProdController::class, 'index_vente_prod'])->name('instructeur.vente_prod.index')->middleware('is_instructeur');
Route::get('instructeur/vente_prods/create', [App\Http\Controllers\InstructeurController\VenteProdController::class, 'create_vente_prod'])->name('instructeur.vente_prod.create')->middleware('is_instructeur');
Route::post('instructeur/vente_prods/ajout', [App\Http\Controllers\InstructeurController\VenteProdController::class, 'add_vente'])->name('instructeur.vente_prod.add')->middleware('is_instructeur');
Route::post('instructeur/vente_prods/suppression', [App\Http\Controllers\InstructeurController\VenteProdController::class, 'delete_vente'])->name('instructeur.vente_prod.delete')->middleware('is_instructeur');
Route::post('instructeur/vente_prods/ligne_vente/suppression', [App\Http\Controllers\InstructeurController\VenteProdController::class, 'delete_ligne_vente'])->name('instructeur.vente_prod.ligne_vente.delete')->middleware('is_instructeur');
Route::get('instructeur/vente_prods/edit/{val}', [App\Http\Controllers\InstructeurController\VenteProdController::class, 'edit_vente'])->name('instructeur.vente_prod.edit')->middleware('is_instructeur');

Route::get('instructeur/vente_abos', [App\Http\Controllers\InstructeurController\VenteAboController::class, 'index_abo'])->name('instructeur.vente_abo.index')->middleware('is_instructeur');
Route::post('instructeur/vente_abos/suppression', [App\Http\Controllers\InstructeurController\VenteAboController::class, 'delete_abo'])->name('instructeur.vente_abo.delete')->middleware('is_instructeur');
Route::get('instructeur/vente_abos/create', [App\Http\Controllers\InstructeurController\VenteAboController::class, 'create_vente_abo'])->name('instructeur.vente_abo.create')->middleware('is_instructeur');
Route::post('instructeur/vente_abos/add', [App\Http\Controllers\InstructeurController\VenteAboController::class, 'add_abo'])->name('instructeur.vente_abo.add')->middleware('is_instructeur');

Route::get('instructeur/evennements', [App\Http\Controllers\InstructeurController\EvenementController::class, 'index_evennement'])->name('instructeur.evennement.index')->middleware('is_instructeur');
Route::get('instructeur/evennements/realiser/{val}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'realiser_evenement'])->name('instructeur.evennement.realiser')->middleware('is_instructeur');
Route::get('instructeur/evennements/demandes', [App\Http\Controllers\InstructeurController\EvenementController::class, 'index_dmd_evennement'])->name('instructeur.evennement.demande.index')->middleware('is_instructeur');
Route::get('instructeur/evennements/mes-demandes', [App\Http\Controllers\InstructeurController\EvenementController::class, 'mes_demandes'])->name('instructeur.evennement.mes_demandes')->middleware('is_instructeur');
Route::get('instructeur/evennements/demandes/create', [App\Http\Controllers\InstructeurController\EvenementController::class, 'create_demande'])->name('instructeur.evennement.demande.create')->middleware('is_instructeur');
Route::post('instructeur/evennements/demandes/add', [App\Http\Controllers\InstructeurController\EvenementController::class, 'add_evennement'])->name('instructeur.evennement.demande.add')->middleware('is_instructeur');
Route::post('instructeur/evennements/demandes/update/{id}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'update_demande'])->name('instructeur.evennement.demande.update')->middleware('is_instructeur');
Route::post('instructeur/evennements/demandes/delete', [App\Http\Controllers\InstructeurController\EvenementController::class, 'delete_dmd_evennement'])->name('instructeur.evennement.demande.delete')->middleware('is_instructeur');
Route::get('instructeur/evennements/medias/{id}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'medias_evennement'])->name('instructeur.evennement.medias')->middleware('is_instructeur');
Route::post('instructeur/evennements/photos/add/{val}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'add_photos_evennement'])->name('instructeur.evennement.photos.add')->middleware('is_instructeur');
Route::get('instructeur/evennements/photos/delete/{val}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'delete_photo_evennement'])->name('instructeur.evennement.photos.delete')->middleware('is_instructeur');
Route::post('instructeur/evennements/videos/add/{val}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'add_video_evennement'])->name('instructeur.evennement.videos.add')->middleware('is_instructeur');
Route::get('instructeur/evennements/videos/delete/{val}', [App\Http\Controllers\InstructeurController\EvenementController::class, 'delete_video_evennement'])->name('instructeur.evennement.videos.delete')->middleware('is_instructeur');

Route::get('/calendar', function () {
    try {
        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . session('TOKEN'),
        ])->get(env('API_URL') . 'fetch_evennements_cal');

        if ($response->successful()) {
            $data   = $response->json();
            $events = $data['evenlist'] ?? [];

            $formattedEvents = array_map(function ($event) {
                return [
                    'id'    => $event['id'],
                    'title' => $event['code'] . ' - ' . $event['desc'],
                    'start' => $event['start'] ?? ($event['date_deb'] . 'T' . $event['heure_deb']),
                    'end'   => $event['end'] ?? ($event['date_fin'] . 'T' . $event['heure_fin']),
                    'allDay' => $event['allDay'] ?? false,
                    'extendedProps' => [
                        'date_deb'        => $event['date_deb'],
                        'date_fin'        => $event['date_fin'],
                        'code'            => $event['code'],
                        'desc'            => $event['desc'],
                        'frais'           => $event['frais'],
                        'devise'          => $event['devise'],
                        'type_desc'       => $event['type_desc'],
                        'instructeur'     => ($event['nom_instructeur'] ?? '') . ' ' . ($event['prenom_instructeur'] ?? ''),
                        'nbr_participant' => $event['nbr_participant'],
                        'nbr_place_dispo' => $event['nbr_place_dispo'],
                        'nbr_place_restant' => $event['nbr_place_restant'],
                    ],
                ];
            }, $events);

            $holidays = [
                ['title' => 'Journée mondiale contre le cancer', 'start' => '2025-04-25', 'display' => 'background', 'color' => '#ff9999'],
                ['title' => 'Jour férié', 'start' => '2025-04-13', 'display' => 'background', 'color' => '#ffe6cc'],
            ];

            return view('instructeur.evennement.demande.ajouter.par_calendrier.calendar', [
                'events'   => $formattedEvents,
                'holidays' => $holidays,
            ]);
        }

        $errorData = $response->json();
        if (isset($errorData['message'])) {
            return redirect()->route('login')->with('error', 'Session expired. Please login again.');
        }
        return back()->with('error', 'Failed to fetch events. Please try again.');

    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred while loading the calendar.');
    }
});

Route::get('instructeur/formations', [App\Http\Controllers\InstructeurController\FormationController::class, 'index_formation'])->name('instructeur.formation.index')->middleware('is_instructeur');
Route::post('instructeur/formations/partager_url', [App\Http\Controllers\FormationController::class, 'add_enligne_url'])->name('instructeur.formation.partager_url')->middleware('is_instructeur');
Route::post('instructeur/formations/suppression', [App\Http\Controllers\InstructeurController\FormationController::class, 'delete_formation'])->name('instructeur.formation.delete')->middleware('is_instructeur');
Route::post('instructeur/formations/add', [App\Http\Controllers\InstructeurController\FormationController::class, 'add_formation'])->name('instructeur.formation.add')->middleware('is_instructeur');
Route::get('instructeur/formations/{val}', [App\Http\Controllers\InstructeurController\FormationController::class, 'edit_formation'])->name('instructeur.formation.edit')->middleware('is_instructeur');
Route::post('instructeur/formations/update/{val}', [App\Http\Controllers\InstructeurController\FormationController::class, 'update_formation'])->name('instructeur.formation.update')->middleware('is_instructeur');
Route::get('instructeur/formations/realiser/{val}', [App\Http\Controllers\InstructeurController\FormationController::class, 'realiser_formation'])->name('instructeur.formation.realiser')->middleware('is_instructeur');
Route::post('instructeur/formations/photos/add/{val}', [App\Http\Controllers\InstructeurController\FormationController::class, 'add_photos_formation'])->name('instructeur.formation.photos.add')->middleware('is_instructeur');
Route::get('instructeur/formations/photos/delete_photo/{val}', [App\Http\Controllers\InstructeurController\FormationController::class, 'delete_photo_formation'])->name('instructeur.formation.photos.delete_photo')->middleware('is_instructeur');

Route::get('instructeur/demande_formations', [App\Http\Controllers\InstructeurController\FormationController::class, 'index_liste_demande'])->name('instructeur.demande_formation.index')->middleware('is_instructeur');
Route::get('instructeur/demande_formations/create', [App\Http\Controllers\InstructeurController\FormationController::class, 'create_demande'])->name('instructeur.demande_formation.create')->middleware('is_instructeur');
Route::post('instructeur/demande_formations/create/media', [App\Http\Controllers\InstructeurController\FormationController::class, 'create_demande_media_part'])->name('instructeur.demande_formation.create.media')->middleware('is_instructeur');
Route::post('instructeur/demande_formations/create/media/prog_de_formation', [App\Http\Controllers\InstructeurController\FormationController::class, 'create_demande_prog_de_formation_part'])->name('instructeur.demande_formation.create.media.prog_de_formation')->middleware('is_instructeur');
Route::post('instructeur/demande_formations/create/media/presentation_power_point', [App\Http\Controllers\InstructeurController\FormationController::class, 'create_demande_presentation_power_point_part'])->name('instructeur.demande_formation.create.media.presentation_power_point')->middleware('is_instructeur');
Route::post('instructeur/demande_formations/create/media/video_basic_one', [App\Http\Controllers\InstructeurController\FormationController::class, 'create_demande_video_basic_one_part'])->name('instructeur.demande_formation.create.media.video_basic_one')->middleware('is_instructeur');

Route::get('instructeur/profile', [App\Http\Controllers\InstructeurController\ProfileController::class, 'index_profile'])->name('instructeur.profile')->middleware('is_instructeur');
Route::post('instructeur/profile/edit_info_perso/{val}', [App\Http\Controllers\InstructeurController\ProfileController::class, 'edit_info_perso'])->name('instructeur.profile.edit_info_perso')->middleware('is_instructeur');
Route::post('instructeur/profile/payer_abonnement', [App\Http\Controllers\InstructeurController\ProfileController::class, 'payer_abonnement'])->name('instructeur.profile.payer_abonnement')->middleware('is_instructeur');
Route::post('instructeur/profile/update_password/{val}', [App\Http\Controllers\InstructeurController\ProfileController::class, 'update_password'])->name('instructeur.profile.update_password')->middleware('is_instructeur');

Route::get('instructeur/profile/photos', [App\Http\Controllers\InstructeurController\ProfileController::class, 'index_photo'])->name('instructeur.profile.photos')->middleware('is_instructeur');
Route::post('instructeur/profile/photos/categ/add', [App\Http\Controllers\InstructeurController\ProfileController::class, 'add_categ'])->name('instructeur.profile.photos.categ.add')->middleware('is_instructeur');
Route::post('instructeur/profile/photos/add', [App\Http\Controllers\InstructeurController\ProfileController::class, 'add_photos'])->name('instructeur.profile.photos.add')->middleware('is_instructeur');
Route::post('instructeur/profile/photos/suppression', [App\Http\Controllers\InstructeurController\ProfileController::class, 'delete_photo'])->name('instructeur.profile.photos.delete')->middleware('is_instructeur');
Route::post('instructeur/profile/photos/search', [App\Http\Controllers\InstructeurController\ProfileController::class, 'search_photo'])->name('instructeur.profile.photos.search')->middleware('is_instructeur');

Route::get('instructeur/profile/videos', [App\Http\Controllers\InstructeurController\ProfileController::class, 'index_video'])->name('instructeur.profile.videos')->middleware('is_instructeur');
Route::post('instructeur/profile/videos/suppression', [App\Http\Controllers\InstructeurController\ProfileController::class, 'delete_video'])->name('instructeur.profile.videos.delete')->middleware('is_instructeur');
Route::post('instructeur/profile/videos/categ/add', [App\Http\Controllers\InstructeurController\ProfileController::class, 'add_categ_video'])->name('instructeur.profile.videos.categ.add')->middleware('is_instructeur');
Route::post('instructeur/profile/videos/add', [App\Http\Controllers\InstructeurController\ProfileController::class, 'add_videos'])->name('instructeur.profile.videos.add')->middleware('is_instructeur');
Route::post('instructeur/profile/videos/search', [App\Http\Controllers\InstructeurController\ProfileController::class, 'search_video'])->name('instructeur.profile.videos.search')->middleware('is_instructeur');

Route::get('instructeur/profile/playlist', [App\Http\Controllers\InstructeurController\ProfileController::class, 'index_playlist'])->name('instructeur.profile.playlist')->middleware('is_instructeur');

Route::get('instructeur/profile/docs', [App\Http\Controllers\InstructeurController\ProfileController::class, 'index_doc'])->name('instructeur.profile.docs')->middleware('is_instructeur');
Route::post('instructeur/profile/docs/suppression', [App\Http\Controllers\InstructeurController\ProfileController::class, 'delete_doc'])->name('instructeur.profile.docs.delete')->middleware('is_instructeur');
Route::post('instructeur/profile/docs/categ/add', [App\Http\Controllers\InstructeurController\ProfileController::class, 'add_categ_doc'])->name('instructeur.profile.docs.categ.add')->middleware('is_instructeur');
Route::post('instructeur/profile/docs/add', [App\Http\Controllers\InstructeurController\ProfileController::class, 'add_docs'])->name('instructeur.profile.docs.add')->middleware('is_instructeur');
Route::post('instructeur/profile/docs/search', [App\Http\Controllers\InstructeurController\ProfileController::class, 'search_doc'])->name('instructeur.profile.docs.search')->middleware('is_instructeur');
Route::get('instructeur/profile/docs/get_document/{val}', [App\Http\Controllers\InstructeurController\ProfileController::class, 'getDocument'])->name('instructeur.profile.docs.get_document')->middleware('is_instructeur');

Route::get('instructeur/demande_cours/create', [App\Http\Controllers\InstructeurController\CoursController::class, 'create_demande'])->name('instructeur.demande_cours.create')->middleware('is_instructeur');
Route::post('instructeur/demande_cours/add', [App\Http\Controllers\InstructeurController\CoursController::class, 'add_cours'])->name('instructeur.demande_cours.add')->middleware('is_instructeur');
Route::get('instructeur/demande_cours', [App\Http\Controllers\InstructeurController\CoursController::class, 'index_liste_demande'])->name('instructeur.demande_cours.index')->middleware('is_instructeur');
Route::get('instructeur/cours', [App\Http\Controllers\InstructeurController\CoursController::class, 'index_cours'])->name('instructeur.cours.index')->middleware('is_instructeur');
Route::post('instructeur/cours/realiser/{val}', [App\Http\Controllers\InstructeurController\CoursController::class, 'realiser_cours'])->name('instructeur.cours.realiser')->middleware('is_instructeur');
Route::post('instructeur/cours/suppression', [App\Http\Controllers\InstructeurController\CoursController::class, 'delete_cours'])->name('instructeur.cours.delete')->middleware('is_instructeur');
Route::get('instructeur/cours/{val}', [App\Http\Controllers\InstructeurController\CoursController::class, 'edit_cours'])->name('instructeur.cours.edit')->middleware('is_instructeur');

Route::get('instructeur/formations/en_ligne/show/{val}', [App\Http\Controllers\FormationController::class, 'show_formation'])->name('instructeur.formation.show')->middleware('is_instructeur');

Route::get('candidat/formations', [App\Http\Controllers\CandidatControllers\FormationController::class, 'index_formation'])->name('candidat.formation.index')->middleware('is_candidat');
Route::get('candidat/formations/details/{val}', [App\Http\Controllers\CandidatControllers\FormationController::class, 'candidat_detail_formation'])->name('candidat.formation.details')->middleware('is_candidat');
Route::get('candidat/formations/details/livret_scientifique/{val}', [App\Http\Controllers\CandidatControllers\FormationController::class, 'candidat_detail_formation_livret_scientifique'])->name('candidat.formation.details.livret_scientifique')->middleware('is_candidat');
Route::get('candidat/formations/details/prog_de_formation/{val}', [App\Http\Controllers\CandidatControllers\FormationController::class, 'candidat_detail_formation_prog_de_formation'])->name('candidat.formation.details.prog_de_formation')->middleware('is_candidat');
Route::get('candidat/formations/details/presentation_power_point/{val}', [App\Http\Controllers\CandidatControllers\FormationController::class, 'candidat_detail_formation_presentation_power_point'])->name('candidat.formation.details.presentation_power_point')->middleware('is_candidat');
Route::get('candidat/formations/details/video_basic_one/{val}', [App\Http\Controllers\CandidatControllers\FormationController::class, 'candidat_detail_formation_video_basic_one'])->name('candidat.formation.details.video_basic_one')->middleware('is_candidat');

Route::get('candidat/QCM/Examen/page', [App\Http\Controllers\CandidatControllers\QCMController::class, 'examen_page'])->name('candidat.qcm.examen.page')->middleware('is_candidat');
Route::post('candidat/QCM/Examen/Valider', [App\Http\Controllers\CandidatControllers\QCMController::class, 'valider_examen'])->name('candidat.qcm.examen.valider')->middleware('is_candidat');
Route::get('candidat/QCM/Examen/Certificat/{val}', [App\Http\Controllers\CandidatControllers\QCMController::class, 'get_cerif'])->name('candidat.qcm.examen.cerif')->middleware('is_candidat');

Route::get('candidat/evenements', [App\Http\Controllers\CandidatControllers\EvenementController::class, 'index_evenement'])->name('candidat.evenement.index')->middleware('is_candidat');

Route::get('candidat/formations/en_ligne/show/{val}', [App\Http\Controllers\FormationController::class, 'show_formation'])->name('candidat.formation.show')->middleware('is_candidat');
