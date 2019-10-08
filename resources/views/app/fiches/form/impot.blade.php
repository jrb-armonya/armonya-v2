{{-- IMPOTS --}}
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title"> <i class="fa fa-bank"></i> Impot</div>
                </div>
            </div>
            <div class="card-body">

                {{-- IMPOT --}}
                <div class="form-group row">
                
                    {{-- Signe --}}
                    <div class="col-sm-2 mb-1">
                        <small class="text-muted">&nbsp</small>
                        <div class="input-group">
                            
                            <select class="custom-select fiche-input s_imp" name="s_imp" id="inputGroupSelect01" id="s_imp">
                                {{-- Signe --}}
                                <option value=">" selected> &nbsp > &nbsp </option>
                                <option value="<"> &nbsp < &nbsp </option>
                                <option value="="> &nbsp = &nbsp </option>
                            </select>
                            {{-- <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Situation</span>
                            </div> --}}
                            
                        </div>
                    </div>

                    {{-- Année --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Année</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="imp_annee" id="imp_annee" placeholder="Année">
                        </div>
                    </div>

                    {{-- Mois --}}
                    <div class="col-sm-6 mb-1">
                        <small class="text-muted">Mois</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="imp_mois" id="imp_mois" placeholder="Mois">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>