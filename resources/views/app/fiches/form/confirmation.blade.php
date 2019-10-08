{{-- CONFIRMATION --}}
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title"> <i class="fa fa-thumbs-o-up"></i> CONFIRMATION</div>
                </div>
            </div>
            <div class="card-body">

                {{-- CONFIRMATION --}}
                <div class="form-group row">
                    {{-- SANS --}}
                    <div class="col-sm-6 mb-1">
                        <div class="input-group form-check">
                            <input class="form-check-input fiche-input" type="radio" name="sms_conf" value="0" id="sans" checked>
                            <label class="form-check-label" for="sans">
                                Sans
                            </label>
                        </div>
                    </div>
                    {{-- SMS Prise de rendez-vous --}}
                    <div class="col-sm-6 mb-1">
                            <div class="input-group form-check">
                                <input class="form-check-input fiche-input" type="radio" name="sms_conf" value="1" id="sms_prise">
                                <label class="form-check-label" for="sms_prise">
                                    SMS prise de rendez-vous
                                </label>
                            </div>
                    </div>
                    {{-- SMS De confirmation --}}
                    <div class="col-sm-6 mb-1">
                            <div class="input-group form-check">
                                <input class="form-check-input fiche-input" type="radio" name="sms_conf" value="2" id="sms_conf">
                                <label class="form-check-label" for="sms_conf">
                                    SMS de confirmation
                                </label>
                            </div>
                    </div>
                    {{-- NON DU CONSULTANT --}}
                    <div class="col-sm-6 mb-1">
                            <div class="input-group form-check">
                                <input class="form-check-input fiche-input" type="checkbox" name="cgp" id="cgp">
                                <label class="form-check-label" for="cgp">
                                    Nom du consultaant
                                </label>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>