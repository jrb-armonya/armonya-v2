<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Manager <small class="text-muted">Vous pouvez ajouter des Sociétés</small></h4></div>
            </div>
        </div>
        <div class="card-body">
            <dl class="toggle">
                <dt>
                    <a href="" class="text-center"><h4>Cliquez pour ajouter une société</h4></a>
                </dt>
                <dd>
                    <form method="POST" action="{{ route('societe.create') }}" class="needs-validation" id="add-societe" novalidate>     
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom </label>
                            <input type="text" value="{{old('name') }}" class="form-control" name="name" id="name_societe" aria-describedby="nameHelp" placeholder="Nom de société" required>
                            <div class="invalid-feedback">
                                Veuillez choisir un nom de société.
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="adresse">Adresse </label>
                            <input type="text" value="{{old('adresse') }}" class="form-control" name="adresse" id="adresse" aria-describedby="adresseHelp" placeholder="Adresse de société" required>
                            <div class="invalid-feedback">
                                Veuillez tappez une adresse.
                            </div>
                        </div>
                        {{-- Standard --}}
                        <div class="form-group">
                            <label for="standard">Standard</label>
                            <input type="text" class="form-control tel-mask-standard" name="standard" id="standard" placeholder="Standard" value="{{old('standard') }}">
                            <div class="invalid-feedback">
                                Veuillez indiquer le numéro du standard.
                            </div>
                        </div>
                        {{-- nbr numero --}}
                        <div class="form-group">
                            <label for="nbr">Nombre de numéro</label>
                            <input type="number" value="{{old('nbr') }}" class="form-control" id="nbr" name="nbr" aria-describedby="numberHelp"  placeholder="Nombre de numéros" required>
                            <small id="numberHelp" class="form-text text-muted">Nombre de numéro à générer.</small>
                            <div class="invalid-feedback">
                                Veuillez indiquer le nombre de numéros souhaité.
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="mode">Mode</label>
                            <select class="form-control" id="mode" name="mode">
                                <option value="asc">asc</option>
                                <option value="desc">desc</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" id="add-btn" >Ajouter</button>
                    </form>
                </dd>
            </dl>
        </div>
    </div>
</div>
