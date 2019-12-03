{{-- Adresse --}}
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-success">
                    <div class="custom-title"> <i class="fa fa-map-o"></i> Adresse</div>
                </div>
            </div>
            <div class="card-body">

                {{-- Adress --}}
                <h6>Adresse, ville et code postal</h6>
                <div class="form-group row">
                    {{-- Adresse --}}
                    <div class="col-sm-6 mb-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                            </div>
                            <input type="text" class="form-control fiche-input" name="adresse" id="adresse" placeholder="Adresse">
                        </div>
                    </div>

                    

                    {{-- CP --}}
                    <div class="col-sm-2 mb-1">
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="cp" id="cp" placeholder="CP">
                        </div>
                    </div>
                    
                    {{-- Ville --}}
                    <div class="col-sm-4 mb-1">
                        <div class="input-group">
                            <input type="text" class="form-control fiche-input" name="ville" id="ville" placeholder="Ville">
                        </div>
                    </div>
                </div>

                {{-- <h6> Téléphone </h6> --}}
                {{-- TEL --}}
                <div class="form-group row">

                    {{-- FIXE --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Fixe</small>
                        <div class="input-group">
                            <input type="text" class="form-control fiche-input tel-mask" name="tel_fix" id="tel_fix" placeholder="Fixe" value="">
                        </div>
                    </div>
                    {{-- Mobile --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Mobile</small>
                        <div class="input-group">

                            <input type="text" class="form-control fiche-input tel-mask" name="tel_mobile" id="tel_mobile" placeholder="Mobile">
                        </div>
                    </div>
                    {{-- BUR --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Bureau</small>
                        <div class="input-group">
                            <input type="text" class="form-control fiche-input tel-mask" name="tel_bureau" id="tel_bureau" placeholder="Bureau">
                        </div>
                    </div>

                </div>

                {{-- EMAIL --}}
                <div class="form-group row">
                    {{-- EMAIL --}}
                    <div class="col-sm-12 mb-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope-open-o"></i></span>
                            </div>
                            <input type="text" class="form-control fiche-input email-input" name="email" id="inputmask_9" placeholder="Email">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
    </div>
</div>