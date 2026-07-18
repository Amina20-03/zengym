
<div class="modal-onboarding modal fade animate__animated" id="type_event_Modal" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog" role="document" >
        <div class="modal-content text-center">
            <div class="modal-body p-0">

                <div class="onboarding-content mb-0">
                    <h4 class="onboarding-title text-body">
                        {{ __('content.choisir un type devennement') }}
                    </h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <select id="type_even_id" name="type_even_id" class="select2 form-select" required>
                                <!-- {{$list_type_even = \Illuminate\Support\Facades\DB::table('type_evenements')->get()}} -->
                                @for($i=0;$i<count($list_type_even);$i++)
                                    <option value="{{$list_type_even[$i]->id}}">{{$list_type_even[$i]->desc}}</option>

                                @endfor
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary">{{ __('content.Valider') }}</button>
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">{{ __('content.Annuler') }}</button>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
