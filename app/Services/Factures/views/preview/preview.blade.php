@extends('layouts.app')
@section('css')
<link href="{{ asset('/backend/assets/vendor/select2/css/select2.css') }}" rel="stylesheet">
@endsection
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
                            <p class="font-weight-bold mb-4">Facture #{{ $facture->uiid }}</p>
                            <p class="mb-1"><span class="text-muted">Date:</span>  {{$facture->created_at->format('d/m/Y')}} </p>
                            <p class="mb-1"><span class="text-muted">To: </span> {{$facture->partenaire->name}}</p>
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
                                    @if($facture->type == 1)
                                        @foreach($facture->fiches as $fiche)
                                        <tr style="background-color: #b9cdce;">
                                            <td>{{ ucfirst($fiche->name) }} {{ ucfirst($fiche->prenom) }}</td>
                                            <td>1</td>
                                            <td>{{$facture->partenaire->prix_fiche}}</td>
                                            <td>-</td>
                                        </tr>
                                        @endforeach
                                    {{-- Facture Groupé --}}
                                    @else

                                        <tr style="background-color: #b9cdce;">
                                            <td>{{$facture->fiches->count()}} rendez-vous</td>
                                            <td>{{$facture->fiches->count()}}</td>
                                            <td>{{$facture->partenaire->prix_fiche}}</td>
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
                                            {{ $facture->fiches->count() * $facture->partenaire->prix_fiche }} €
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce;"
                                            class="text-uppercase small font-weight-bold">MONTANT TOTAL</td>
                                        <td style="background-color: #b9cdce;">
                                            {{ $facture->fiches->count() * $facture->partenaire->prix_fiche }} €
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce;"
                                            class="text-uppercase small font-weight-bold">TOTAL DUE</td>
                                        <td style="background-color: #b9cdce;">
                                            {{ $facture->fiches->count() * $facture->partenaire->prix_fiche }} €
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

    <div class="row" style="margin-bottom: 20px;">

        <div class="col-md-6">
            <a href="{{url('facturation/factures/generatePdf', $facture->id)}}"><button
                    class="btn btn-warning col-md-12">PDF</button></a>
        </div>
        <div class="col-md-6">
            <button class="btn btn-success col-md-12" data-toggle="modal" data-target="#emailPartenaireModal"
                @if($facture->pdf_id == null || $facture->status == "Envoyée") disabled @endif>Envoyer
                par email</button>
        </div>

    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="emailPartenaireModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Emails du partenaire {{$facture->partenaire->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/facturation/sendFacture')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="facture_id" value="{{ $facture->id }}">
                    <div class="input-group row">
                        <label for="facture_emails" class="col-sm-2 col-form-label">Email Principal</label>
                        <select class="custom-select" id="facture_emails" name="facture_emails[]" multiple="multiple"
                            style="width: 100% !important; border: 1px solid darkgrey; border-radius: 5px;">
                            @foreach($partenaire->emails as $email)
                            <option value="{{$email->id}}">{{$email->email}}</option>
                            {{$email}}
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group row">
                        <label for="facture_emails_cc" class="col-sm-2 col-form-label">Emails en CC</label>
                        <select class="custom-select" id="facture_emails_cc" name="facture_emails_cc[]"
                            multiple="multiple"
                            style="width: 100% !important; border: 1px solid darkgrey; border-radius: 5px;">
                            @foreach($partenaire->emails as $email)
                            <option value="{{$email->id}}">{{$email->email}}</option>
                            {{$email}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" name="sumbit" value="Envoyer" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="{{ asset('/backend/assets/vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/init-select2.js') }}"></script>
@endsection