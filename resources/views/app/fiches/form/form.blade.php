<form method="POST" action="/fiches/store" class="form" id="fiche-form">
    @csrf
    @if( \Request::route()->getName() != 'fiche.create' )
    <input type="hidden" name="id" id="id" value="">
    @endif
    @include('app.fiches.form.rendez-vous')
    @include('app.fiches.form.prospect')
    @include('app.fiches.form.adresse')
    @include('app.fiches.form.situation')
    @include('app.fiches.form.impot')
    @include('app.fiches.form.credit')
    @include('app.fiches.form.confirmation')
    @include('app.fiches.form.commentaire')
    <div class="row">

    
        @if( \Request::route()->getName() != 'fiche.create' ) 
            
                @include('app.fiches.form.status')
                @include('app.fiches.form.date-heure-rappel')
                @include('app.fiches.form.email-partenaire')
            
        @endif
        
        
    </div>
    <div class="row">

        @include('app.fiches.form.submit')
        {{-- Bouton Archiver Temporary feature need to be deleted --}}
        @if(isset($status->id) && $status->id == 10)
            @include('app.fiches.form.archiver')
        @endif
    </div>
</form>


{{-- CR Zone has its own <form> --}}
@if(isset($status->id) && ($status->id == 7 || $status->id == 10 || $status->id == 8))
    @include('app.fiches.form.cr-zone')
@endif
        
