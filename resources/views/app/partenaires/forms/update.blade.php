<form method="POST" action="{{ route('partenaires.update', $partenaire->id) }}">
    {{ method_field('PUT') }}
    @csrf
    {{-- NOM --}}
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label ">Nom</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $partenaire->name }}" placeholder="Nom du partenaire" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    {{-- EMAIL --}}
    <div class="form-group row">
        <label for="prix_fiche" class="col-md-4 col-form-label ">{{ __('Prix Fiche') }}</label>
        <div class="col-md-6">
            <input id="prix_fiche" type="number" class="form-control{{ $errors->has('prix_fiche') ? ' is-invalid' : '' }}" name="prix_fiche" value="{{ $partenaire->prix_fiche }}" placeholder="Prix de la fiche" required>
            @if ($errors->has('prix_fiche'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('prix_fiche') }}</strong>
                </span>
            @endif
        </div>
    </div>
    {{-- DESC --}}
    <div class="form-group row">
        <label for="desc" class="col-md-4 col-form-label ">Description</label>
        <div class="col-md-6">
            <input id="desc" type="text" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" value="{{ $partenaire->desc }}" placeholder="Description du partenaire">
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