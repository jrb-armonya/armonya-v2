@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-3">
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('common/logo_black.png') }}">
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">ARMONYA</p>
                            <p class="mb-1">CENTRE AFFAIRE 4</p>
                            <p>LA MARSA / TUNIS 2070</p>
                            <p class="mb-1">TUNISIE</p>
                            <p class="mb-1">P.O. BOX 2654313</p>
                            <p class="mb-1">Capital 30 000 TND</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Facture #{{ $data->uiid }}</p>
                            <p class="mb-1"><span class="text-muted">Date:</span>  {{$data->created_at->format('d/m/Y')}} </p>
                            <p class="mb-1"><span class="text-muted">To: </span> {{$data->partenaire->name}}</p>
                            <p class="mb-1"><span class="text-muted">Adresse: </span> </p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">PRIX UNITAIRE</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Facture Détaillé --}}
                                    @if($data->type == 1)
                                        @foreach($data->fiches as $fiche)
                                        <tr style="background-color: #b9cdce;">
                                            <td>{{ ucfirst($fiche->name) }} {{ ucfirst($fiche->prenom) }}</td>
                                            <td>1</td>
                                            <td>{{$data->partenaire->prix_fiche}}</td>
                                            <td>-</td>
                                        </tr>
                                        @endforeach
                                    {{-- Facture Groupé --}}
                                    @else

                                        <tr style="background-color: #b9cdce;">
                                            <td>{{$data->fiches->count()}} rendez-vous</td>
                                            <td>{{$data->fiches->count()}}</td>
                                            <td>{{$data->partenaire->prix_fiche}}</td>
                                            <td>-</td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce;"
                                            class="text-uppercase small font-weight-bold">SOUS TOTAL</td>
                                        <td style="background-color: #b9cdce;">
                                            {{ $data->fiches->count() * $data->partenaire->prix_fiche }} €
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce;"
                                            class="text-uppercase small font-weight-bold">MONTANT TOTAL</td>
                                        <td style="background-color: #b9cdce;">
                                            {{ $data->fiches->count() * $data->partenaire->prix_fiche }} €
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce;"
                                            class="text-uppercase small font-weight-bold">TOTAL DUE</td>
                                        <td style="background-color: #b9cdce;">
                                            {{ $data->fiches->count() * $data->partenaire->prix_fiche }} €
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 mb-5 small">
        <p>
            We do expect payment within 7 days, so please process this invoice within that time.
        </p>
        <p>
            We will exercise our statutory right to claim interest (at 8 per cent over the Bank of BANK ABC base rate)
            and compensation.
        </p>
        <p>
            for debt recovery costs under the Late Payment legislation if we are not paid according to our agreed credit
            terms.
        </p>
        <p>
            MONEY TRANSFERT TO THE ACCOUNT BELOW
        </p>
    </div>
    <div class="mt-5 mb-5 small text-center font-weight-bold">
        Thank you for your business
    </div>


</div>

@endsection