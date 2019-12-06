{{-- Situation --}}
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title"> <i class="fa fa-home"></i> Situation</div>
                </div>
            </div>
            <div class="card-body">
                <h6>Situation familliale</h6>
                {{-- Situation --}}
                <div class="form-group row">
                    {{-- Situation --}}
                    <div class="col-sm-6 mb-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Situation</span>
                            </div>
                            <select class="custom-select fiche-input" name="sf" id="sf">
                                {{-- Situation --}}
                                <option value="" selected>------</option>
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié(e)">Marié(e)</option>
                                <option value="Divorcé(e)">Divorcé(e)</option>
                                <option value="Séparé(e)">Séparé(e)</option>
                                <option value="Pascsé(e)">Pascsé(e)</option>
                                <option value="Concubin">Concubin</option>
                                <option value="Veuf (veuve)">Veuf (veuve)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Enfants --}}
                    <div class="col-sm-6 mb-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="padding-left: 22px;">Enfants</span>
                            </div>
                            <input type="text" class="form-control fiche-input" name="nbr_enfants" id="nbr_enfants" placeholder="Enfants">
                        </div>
                    </div>
                </div>
                
                <h6> Revenu </h6>
                <div class="form-group row">
                
                    {{-- Signe --}}
                    <div class="col-sm-2 mb-1">
                        <small class="text-muted">&nbsp</small>
                        <div class="input-group">
                            
                            <select class="custom-select fiche-input s_rev" name="s_rev" id="inputGroupSelect01">
                                {{-- Signe --}}
                                <option value=">" selected> > </option>
                                <option value="<"> < </option>
                                <option value="="> = </option>
                            </select>
                        </div>
                    </div>

                    {{-- Année --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Année</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="rev_annee" id="rev_annee" placeholder="Année">
                        </div>
                    </div>

                    {{-- Mois --}}
                    <div class="col-sm-4 mb-1">
                        <small class="text-muted">Mois</small>
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="rev_mois" id="rev_mois" placeholder="Mois">
                        </div>
                    </div>

                    {{-- NET --}}
                    <div class="col-sm-1  mt-4">
                        <div class="input-group form-check">
                            <input class="form-check-input  fiche-input" type="radio" name="net" value="1" id="net" checked>
                            <label class="form-check-label" for="net">
                                NET
                            </label>
                        </div>
                    </div>

                    {{-- BRUT --}}
                    <div class="col-sm-1 mt-4">
                        <div class="input-group form-check">
                            <input class="form-check-input fiche-input" type="radio" name="net" value="0" id="brut">
                            <label class="form-check-label" for="brut">
                                BRUT
                            </label>
                        </div>
                    </div>
                </div>

                <h6> Echéance / Loyer (rp) </h6>
                <div class="form-group row">
                    <div class="col-sm-4 mb-1">
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="loy_eche" id="loy_eche" placeholder="Echéance / Loyer (rp)">
                        </div>
                    </div>


                    {{-- Locataire --}}
                    <div class="col-sm-2">
                        <div class="input-group form-check">
                            <input class="form-check-input fiche-input" type="radio" name="locataire" value="0" id="loca">
                            <label class="form-check-label" for="loca">
                                Locataire
                            </label>
                        </div>
                    </div>

                    {{-- BRUT --}}
                    <div class="col-sm-3">
                        <div class="input-group form-check">
                            <input class="form-check-input fiche-input" type="radio" name="locataire" value="1" id="prop">
                            <label class="form-check-label" for="prop">
                                Propriétaire
                            </label>
                        </div>
                    </div>
                    {{-- BRUT --}}
                    <div class="col-sm-3">
                        <div class="input-group form-check">
                            <input class="form-check-input fiche-input" type="radio" name="locataire" value="2" id="gratuit">
                            <label class="form-check-label" for="gratuit">
                                Gratuit
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Revenu --}}
                <h6> Revenu locatif (mois)</h6>
                <div class="form-group row">

                    {{-- Année --}}
                    <div class="col-sm-6 mb-1">
                        <div class="input-group">
                            <input type="number" class="form-control fiche-input" name="rev_loc" id="rev_loc" placeholder="Rev locatif par mois">
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>