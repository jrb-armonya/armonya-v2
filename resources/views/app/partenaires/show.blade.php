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

    @endcomponent
        
    {{-- Data table email-partenaire --}}
    @component('app.parts.tables.index')
        @slot('description')
            Ajouter des emails au partenaire
        @endslot

        @include('app.partenaires.tables.emails')
        @include('app.partenaires.modals.confirm-delete-email');
    @endcomponent
@endsection()

@section('javascript')
<script src="{{ asset('backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/js-init/init-datatable.js') }}"></script>
<script src="{{ asset('/backend/app/partenaires/partenaires.js') }}"></script>
@endsection