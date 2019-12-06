{{-- Prospect --}}
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title"> 
                        <h5><i class="fa fa-address-card-o"></i> 
                            Prospect
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding-bottom: 0;">
                {{-- Genre, Prenom, Age --}}
                
                <div class="form-group row">
                    
                    <div class="col-sm-6 mb-1" >
                        <small class="text-muted">Genre, Nom</small>
                        <div class="input-group" id="genre-select">
                            <select class="custom-select col-sm-4 fiche-input" name="genre" id="genre">
                                {{-- Genre --}}
                                <option value="1" selected>Mr</option>
                                <option value="2">Mme</option>
                                <option value="3">Mlle</option>
                            </select>
                            {{-- Nom --}}
                            
                            <input type="text" class="form-control col-sm-8 fiche-input" id="name" name="name" placeholder="Nom" required>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 mb-1">
                        {{-- Prenom --}}
                        <small class="text-muted">Prenom, Age</small>
                        <div class="input-group">
                            <input type="text" class="form-control col-sm-8 fiche-input" id="prenom" name="prenom" placeholder="Prenom" required>
                            <input type="number" class="form-control col-sm-4 fiche-input" id="age" name="age" placeholder="Age">
                        </div>
                    </div>
                </div>


                {{-- Societe, Profession --}}
                <div class="form-group row">
                    <div class="col-sm-6 mb-1">
                        {{-- Société --}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="padding-right: 37px;" >Société</span>
                            </div>
                            <input type="text" class="form-control fiche-input" id="societe" name="societe" placeholder="Société">

                        </div>
                    </div>
                    <div class="col-sm-6 mb-1">
                        {{-- Profession --}}
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Profession</span>
                            </div>
                            <input type="text" class="form-control fiche-input" id="profession" name="profession" placeholder="Profession">
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

        
    </div>
</div>