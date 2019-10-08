{{-- CREDITS --}}
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title"> <i class="fa fa-money"></i> CREDITS</div>
                </div>
            </div>
            <div class="card-body">

                {{-- CREDIT --}}
                <div class="form-group row">

                    {{-- cre_res --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Autre Résidence</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="cre_res" id="cre_res" placeholder="(rs/locatif)">
                        </div>
                    </div>

                    {{-- cre_auto --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Crédit Auto</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="cre_auto" id="cre_auto" placeholder="Crédit Auto">
                        </div>
                    </div>
                    
                    {{-- cre_conso --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Crédit Conso</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="cre_conso" id="cre_conso" placeholder="Crédit Conso">
                        </div>
                    </div>
                    

                </div>
                {{-- CREDIT 2 --}}
                <div class="form-group row">

                    {{-- cre_autre --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Autre Crédit</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="cre_autre" id="cre_autre" placeholder="Autre Crédit">
                        </div>
                    </div>

                    {{-- cre_total --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Crédits Total</small>
                        <div class="input-group">
                            <input type="number" class="form-control" name="cre_total" id="cre_total" placeholder="Crédits Total"  readonly="readonly">
                        </div>
                    </div>

                    {{-- taux --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Taux Endettement %</small>
                        <div class="input-group">
                            <input type="number" class="form-control" name="taux" id="taux" placeholder="%"  readonly="readonly">
                        </div>
                    </div>
                    
                </div>

                
            </div>
        </div>
    </div>
</div>