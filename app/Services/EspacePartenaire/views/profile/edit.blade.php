@extends('espace-partenaire::layouts.espace-partenaire')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-inline-block ">
    <ol class="breadcrumb p-0">
        <li class="breadcrumb-item"><a href="{{url('/espace-partenaire')}}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="icon-fontawesome.html#">Sécurité</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Sécurité</li>
    </ol>
</nav>
@endsection
@section('content')

<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                Sécurité
            </div>
        </div>
        <div class="card-body">
            <p>
                Vous pouvez modifier votre mot de passe.
            </p>
            <form id="partenaire-edit-password" action="{{ route('part.update.profile') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="form-row align-items-center">
                            <div class="col-md-12">
                                <label for="password" class="col-form-label">Mot de passe <small> doit comporter au moins 8 caractères.</small></label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="mot de passe">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="password_confirmation" class="col-form-label">Confirmation du mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirmation du mot de passe">
                            </div>
                        </div>
                    </div>
                </div>
            
                <input type="submit" class="btn btn-primary btn-success col-md-12" value="Enregistrer">
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')

    <!--jquery validate-->
    <script type="text/javascript"  src="{{ url('/backend/assets/vendor/jquery-validation/jquery.validate.min.js')}} "></script>
    <script type="text/javascript"  src="{{url('/backend/assets/vendor/js-init/init-jquery-validate.js')}}"></script>
@endsection