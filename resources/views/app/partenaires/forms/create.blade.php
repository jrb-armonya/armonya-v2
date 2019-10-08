<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Manager <small class="text-muted">Vous pouvez ajouter des Partenaires</small></h4></div>
            </div>
        </div>
        <div class="card-body">
            <dl class="toggle">
                <dt>
                    <a href="" class="text-center"><h4>Cliquez pour ajouter un partenaires</h4></a>
                </dt>
                <dd>
                    <form method="POST" action="{{ route('partenaires.store') }}">
                        @csrf

                        {{-- NOM --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nom du partenaire" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email du partenaire" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                        {{-- Prix fiche --}}
                        <div class="form-group row">
                            <label for="prix_fiche" class="col-md-4 col-form-label text-md-right">Prix de la fiche (€)</label>
                            <div class="col-md-6">
                                <input id="prix_fiche" type="number" class="form-control{{ $errors->has('prix_fiche') ? ' is-invalid' : '' }}" name="prix_fiche" value="{{ old('prix_fiche') }}" placeholder="Prix  de la fiche" required>
                                @if ($errors->has('prix_fiche'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prix_fiche') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- DESC --}}
                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <input id="desc" type="text" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" value="{{ old('desc') }}" placeholder="Description du partenaire">
                                @if ($errors->has('desc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success form-pill">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>

                </dd>
            </dl>
        </div>
    </div>
</div>