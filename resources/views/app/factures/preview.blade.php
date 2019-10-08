@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-shadow mb-4 p-md-5">
            <div class="card-body">
                    <div class="row py-4">
                        <div class="col-sm-8">
                            <img src="{{ url('/common/logo_black.png') }}" srcset="{{ url('/common/logo_black.png') }}" alt=""/>

                            <h1 class="text-info weight300 my-5">Facture {{ $facture->id }}</h1>
                        </div>
                        <div class="col-sm-4">
                            <address class="mb-5">
                                <strong>Armonya</strong>
                                <br> <span class="text-muted">Adresse de Armonya</span>
                                <br> <span class="text-muted">Adresse part2</span>
                            </address>

                            <address>
                                <strong>{{$facture->partenaire->name}}</strong>
                                <br> <span class="text-muted">PO Box 16122 Collins Street West</span>
                                <br> <span class="text-muted">Victoria 8007 Australia</span>
                            </address>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-4">
                                <small class="text-muted text-uppercase weight600">Somme Total</small>
                                <h5 class="mb-0">21000</h5>
                            </div>
                            <div class="col-4">
                                <small class="text-muted text-uppercase weight600">date</small>
                                <h5 class="mb-0">{{ $facture->created_at->format('d/m/y')}}</h5>
                            </div>
                            <div class="col-4">
                                <small class="text-muted text-uppercase weight600">facture #</small>
                                <h5 class="mb-0">{{ $facture->id }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom et prenom</th>
                                        <th scope="col">Date du rendez-vous</th>
                                        <th scope="col">Ville du rendez-vous</th>
                                        <th scope="col">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody class="text-muted">
                                    @foreach($facture->fiches as $fiche)
                                    <tr>
                                        <td>{{$fiche->id}}</td>
                                        <td>{{ $fiche->name }} {{ $fiche->prenom }}</td>
                                        <td>{{ $fiche->d_rv->format('d/m/y h:m') }}</td>
                                        <td>{{ $fiche->ville }}</td>
                                        <td>{{ $fiche->partenaire->prix_fiche  }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mt-4 mb-5">
                            <strong class="text-uppercase f12">Payment Policy</strong>
                            <br> <span class="text-muted">* Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vestibulum magna nec dignissim sagittis</span>
                            <br> <span class="text-muted">* Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <table class="table invoice-table text-muted" style="margin-top: -1.01rem">
                            <thead>
                                <tr>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">$2150.00</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Discount (10%)</td>
                                <td>- $215</td>
                            </tr>
                            <tr>
                                <th class="text-dark">Total</th>
                                <th><span class="f24 text-dark">$2000.00</span></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection