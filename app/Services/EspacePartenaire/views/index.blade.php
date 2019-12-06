@extends('espace-partenaire::layouts.espace-partenaire')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-inline-block ">
    <ol class="breadcrumb p-0">
        {{-- <li class="breadcrumb-item"><a href="{{url('/espace-partenaire')}}">Dashboard</a></li> --}}
        {{-- <li class="breadcrumb-item"><a href="icon-fontawesome.html#">Icons</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
@endsection
@section('content')


{{-- @dd(Auth::user()->partenaire()); --}}
<div class="row">
    {{-- MES RENDEZ-VOUS --}}
    <div class="col-xl-4 col-md-4">
        <div class="card bg-primary text-white mb-4 py-1">
            <div class="card-body card-widget">
                <div class="float-right">
                    <i class="fa fa-handshake-o fa-2x text-white"></i>
                </div>
                <h5 class="font-weight-bold mt-0" title="Number of Orders">Rendez-vous du mois</h5>
                <h4 class="mt-3 mb-3 text-white">{{$fiches->count()}}</h4>
                
            </div>
        </div>
    </div>

    {{-- MES CRs --}}
    <div class="col-xl-4 col-md-4">
        <div class="card bg-success text-white mb-4 py-1">
            <div class="card-body card-widget">
                <div class="float-right">
                    <i class="fa fa-address-card-o fa-2x text-white"></i>
                </div>
                <h5 class="font-weight-bold mt-0" title="Number of Orders">CR en attente</h5>
                <h4 class="mt-3 mb-3 text-white">{{$crs}}</h4>
                
            </div>
        </div>
    </div>

    {{-- MES Factures --}}
    <div class="col-xl-4 col-md-4">
        <div class="card text-white mb-4 py-1" style="background-color: #ffa604;">
            <div class="card-body card-widget">
                <div class="float-right">
                    <i class="icon-credit-card fa-2x text-white"></i>
                </div>
                <h5 class="font-weight-bold mt-0" title="Number of Orders">Factures en attente</h5>
                <h4 class="mt-3 mb-3 text-white">0</h4>
                
            </div>
        </div>
    </div>
</div>
@endsection


