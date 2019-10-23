<!DOCTYPE html>
<head>
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ URL::asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css"/>
    
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <!------ Include the above in your HEAD tag ---------->

    <style>
        body , html { margin:0; padding:0;}
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="{{ URL::asset('common/logo_black.png') }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <table width="100%">
                            <tr>
                                <td class="font-weight-bold">Armonya</td>
                                <td class="font-weight-bold text-right">FACTURE #{{$data->uiid}}</td>
                            </tr>
                            <tr>
                                <td>CENTRE AFFAIRE 4</td>
                                <td class="text-right">Date</td>
                            </tr>
                            <tr>
                                <td>LA MARSA/TUNIS 2070</td>
                                <td class="text-right">To: {{ ucfirst(strtoupper($data->partenaire->name)) }} </td>
                            </tr>
                            <tr>
                                <td>TUNISIE</td>
                                <td class="text-right">Adresse</td>
                            </tr>
                            <tr>
                                <td>P.O. BOX 2654313</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Capital 30 000 TND</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table"  cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">PRIX UNITAIRE</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->fiches as $fiche)
                                    <tr style="background-color: #b9cdce;">
                                        <td style="padding: 0;"> {{ ucfirst($fiche->name) }} {{ ucfirst($fiche->prenom) }} </td>
                                        <td style="padding: 0;"> 1 </td>
                                        <td style="padding: 0;"> {{$data->partenaire->prix_fiche}} </td>
                                        <td style="padding: 0;"> - </td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 1px;" colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce; padding: 1px;" class="text-uppercase small font-weight-bold">SOUS TOTAL</td>
                                        <td style="background-color: #b9cdce; padding: 1px;" class="text-right">50 €</td>
                                    </tr>


                                    <tr >
                                        <td style="padding: 1px;" colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce; padding: 1px;" class="text-uppercase small font-weight-bold">MONTANT TOTAL</td>
                                        <td style="background-color: #b9cdce; padding: 1px;" class="text-right">50 €</td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 1px;" colspan="2">&nbsp;</td>
                                        <td style="background-color: #b9cdce; padding: 1px;" class="text-uppercase small font-weight-bold">TOTAL DUE</td>
                                        <td style="background-color: #b9cdce; padding: 1px;" class="text-right">50 €</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="small">
        <p>
            We do expect payment within 7 days, so please process this invoice within that time.
        </p>
        <p>
            We will exercise our statutory right to claim interest (at 8 per cent over the Bank of BANK ABC base rate) and compensation.
        </p>
        <p>
            for debt recovery costs under the Late Payment legislation if we are not paid according to our agreed credit terms.
        </p>
        <p>
            MONEY TRANSFERT TO THE ACCOUNT BELOW
        </p>
    </div>
    <div class="small text-center font-weight-bold">
        Thank you for your business
    </div>

</div>

<script src="{{ URL::asset('backend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
</body>
</html>