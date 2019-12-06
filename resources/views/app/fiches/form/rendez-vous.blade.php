{{-- Prospect --}}
<div class="row">
    <div class="col-xl-12 col-md-12">
                {{-- <h6>Date, heure et lieu</h6> --}}
                {{-- Date, lieu --}}
                <div class="form-group row" style="margin-bottom: 2px;">
                    {{-- Date du rendez-vous sm-6 --}}
                    <div class="col-sm-4 mb-1">
                        <div class="input-group date" style="height: 50px;">
                            <div class="input-group-append">
                                <button  id="date_rendez_vous" class="btn btn-outline-secondary fiche-input" type="button"><i class="fa fa-calendar"></i></button>
                            </div>
                            <input type="text" class="form-control date-set fiche-input" id="date_rendez_vous_input"
                                name="date_rendez_vous"
                                aria-label="Right Icon" aria-describedby="date_rendez_vous"
                                placeholder="Date rendez-vous"
                                style="height: 50px; font-size:30px; border-color:#3970f4;"
                                required>
                        </div>
                    </div>
                    {{-- heure --}}
                    <div class="col-sm-4 mb-1">
                        <div class="input-group clockpicker" style="height: 50px;" data-placement="left" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control fiche-input" placeholder="Heure rendez-vous" id="heure_rendez_vous_input"
                            style="height: 50px; font-size:30px; border-color:#3970f4;"
                            name="heure_rendez_vous">
                            
                        </div>
                    </div>
                    {{-- lieux du rendez-vous --}}
                    <div class="col-sm-4 input-group">
                        <div class="input-group" id="l_rv" style="height: 50px;">
                            <div class="input-group-prepend">
                                <button  id="lieux_rendez_vous" class="btn btn-outline-secondary fiche-input" type="button"
                                    style="border: 1px solid #3970f4; border-radius: 0;"><i class="fa fa-building"></i></button>
                            </div>
                            <select class="custom-select fiche-input" name="l_rv" id="inputGroupSelect01" style="height: 50px; font-size:30px;padding-top: 2px;border: 1px solid #3970f4;">
                                <option value="1" selected>Domicile</option>
                                <option value="4">Domicile Semaine</option>
                                <option value="2">Bureau</option>
                                <option value="3">Cabinet</option>
                            </select>
                        </div>
                    </div>
                    @if(Auth::user()->role_id != 2)
                        <div class="input-group col-sm-12" style="display: none;" id="arrondissement">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding-right: 37px;">Arrondisseement</span>
                                </div>
                                <input type="text" class="form-control fiche-input" id="arrondissement-input" name="arrondissement" placeholder="Arrondisseement" autocomplete="off" disabled="">

                            </div>
                        </div>
                    @endif
                </div>
    </div>
</div>