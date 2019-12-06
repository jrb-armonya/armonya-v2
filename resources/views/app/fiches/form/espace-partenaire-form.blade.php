<form method="POST" action="{{url('/espace-partenaire/send-cr')}}" class="form" id="fiche-form">
    @csrf
    @if( \Request::route()->getName() != 'fiche.create' ) 
    <input type="hidden" name="id" id="id" value="">
    @endif
    @include('app.fiches.form.rendez-vous')
    @include('app.fiches.form.prospect')
    <dl class="toggle">
        <dt>
            <a 
                style="
                background-image: linear-gradient(#0f192f, #232a40);
                text-align:center;
                color: white;">
                <span style="">Détails ...</span>
            </a>
        </dt>
        <dd>
            @include('app.fiches.form.adresse')
            @include('app.fiches.form.situation')
            @include('app.fiches.form.impot')
            @include('app.fiches.form.credit')
        </dd>
    </dl>
    @include('app.fiches.form.compte-rendu')
    <div class="row">
        {{-- @include('app.fiches.form.submit') --}}
        <div class="col-xl-12" style="margin-top:20px;">
            {{-- RESET  --}}
            <input 
            onClick=""
            type="submit" class="btn btn-success btn-lg btn-block rounded-0" value="Envoyer" id="">
        </div>
    </div>

</form> 