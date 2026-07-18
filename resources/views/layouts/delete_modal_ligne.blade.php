
<div class="modal-onboarding modal fade animate__animated" id="deleteLigneModal" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog" role="document" >
        <div class="modal-content text-center">
            <div class="modal-body p-0">
                <div class="onboarding-media">
                    <div class="mx-2">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/man-throwing-trash-9062426-7408544.png?f=webp" style="width:200px">
                    </div>
                </div>
                <div class="onboarding-content mb-0">
                    <h4 class="onboarding-title text-body">{{ __('content.Êtes-vous-sûr?') }}</h4>






                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">

                                <input class="form-control" placeholder="Enter your full name..." type="hidden" value="" tabindex="0" id="champ_ligne_id" name="champ_id">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary">{{ __('content.Oui') }}</button>
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">{{ __('content.Non') }}</button>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
