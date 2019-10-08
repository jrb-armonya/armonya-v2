@extends('layouts.app')
@section('content')

<div class="row">
    {{-- Titre --}}
    <div class="col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Facture # {{$facture->uiid}}</div>
                </div>
            </div>
            <div class="card-body">
                <h3>
                    Partenaire <small class="text-muted">{{ $partenaire->name }} <span class="badge">{{ $facture->status }}</span></small>
                </h3>
            </div>
        </div>
    </div>

    {{-- prix de la fiche --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-shadow mb-4">
            <div class="card-body">
                <div class="media d-flex align-items-center">
                    <div class="mr-4 rounded-circle bg-success sr-icon-box ">
                        <i class="icon-docs"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="text-uppercase mb-0 weight500">{{ $facture->partenaire->prix_fiche }} €</h4>
                        <span class="text-muted">Prix de la fiche <small>(<a href="{{ url('/configuration/partenaires', $facture->partenaire_id) }}">modifier</a>)</small></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- prix de la facture --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-shadow mb-4">
            <div class="card-body">
                <div class="media d-flex align-items-center ">
                    <div class="mr-4 rounded-circle bg-warning sr-icon-box ">
                        <i class="icon-credit-card"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="text-uppercase mb-0 weight500">{{$facture->fiches->count()}} fiche(s) = {{ $facture->fiches->count() * $facture->partenaire->prix_fiche }} €</h4>
                        <span class="text-muted">Prix de la facture</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- 2 datatables --}}
<div class="col-md-12 mt-3">
    <div class="card card-shadow mb-4 p-2">
        <div class="card-body">
            <div class="row col-12">
                @include('factures::tables.list-fiches-partenaire')
                @include('factures::tables.list-fiches-facture')
                <a href="{{ url( '/facturation/factures/preview', $facture->id ) }}" class="col-md-12"><button class="btn btn-success col-md-12" @if($facture->fiches->count() == 0) disabled @endif>Preview</button></a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <!--init datatable-->
    <script src="{{asset('/backend/assets/vendor/js-init/init-datatable.js')}}"></script>
@endsection