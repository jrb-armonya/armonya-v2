@extends('layouts.app')

@section('content')

    {{-- Update the Partenaire --}}
    @component('app.parts.cards.card')
        @slot('class', 'col-md-12')
        @slot('title', 'Manager')
        @slot('desc', "Vous pouvez modifier le partenaire" )
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h4>Modifier {{ $partenaire->name }}</h4>
                    @include('app.partenaires.forms.update')
                </div>
                <div class="col-md-4">
                    <h4>Ajouter un email</h4>
                    @include('app.partenaires.forms.add-email')
                </div>
            </div>
            <hr>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Espace Partenaire</h4>
                    
                    <a href="{{route('espace-partenaire.create', $partenaire->id)}}">
                        <button class="btn btn-warning btn-large">
                            <h5>
                                <i class="icon-info"></i> Créer un espace partenaire
                            </h5>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    @endcomponent
        
    {{-- Data table email-partenaire --}}
    @component('app.parts.tables.index')
        @slot('description')
            Ajouter des emails au partenaire
        @endslot

        @include('app.partenaires.tables.emails')
    @endcomponent
@endsection()