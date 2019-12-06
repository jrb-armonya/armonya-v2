<form method="POST" action="{{ route('partenaires.add-email', $partenaire->id) }}">
    @csrf
    <input type="hidden" name="partenaire_id" value="{{$partenaire->id}}">
    {{-- EMAIL --}}
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" placeholder="Ajouter un email" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
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

