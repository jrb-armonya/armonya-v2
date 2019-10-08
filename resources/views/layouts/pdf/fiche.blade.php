<center>
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 6px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 6px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg .tg-baqh{text-align:center;vertical-align:top}
        .tg .tg-yw4l{vertical-align:top}
    
        .fiche-pdf-title{
            background-color: #e6b9b8;
        }
    </style>
    <h1>
        @if($data->partenaire_id == null)
            @php if($data->genre == 1) { $genre = "Mr"; } @endphp
            @php if($data->genre == 2) { $genre = "Mme";} @endphp
            @php if($data->genre == 3) { $genre = "Mlle"; } @endphp

            {{ $genre }} {{ $data->name}} {{ $data->prenom }}
            {{-- TODO: remettre le nom du partenaire mais le nouveau l'ancien donc il faut dans FicheCOntroller update la fiche avec le nouveau partenaire puis envoyer au pdf --}}
        @else
            {{-- $data->partenaire->name --}}
        @endif
    </h1>
    
    
    <table class="tg"  style="undefined;table-layout: fixed; width: 700px; border: 0;">
        
        <?php
        if(isset($data->genre)){

        ?> 
        @php if($data->genre == 1) { $genre = "Mr"; } @endphp
        @php if($data->genre == 2) { $genre = "Mme";} @endphp
        @php if($data->genre == 3) { $genre = "Mlle"; } @endphp
        <?php
        }
        ?>
        <tr>
            <td class="tg-baqh fiche-pdf-title"><b>Nom</b></td>
            <td class="tg-baqh fiche-pdf-title"><b>Prénom</b></td>
            <td class="tg-baqh fiche-pdf-title"><b>Date RDV</b></td>
            <td class="tg-baqh fiche-pdf-title"> <b>Heure RDV</b> </td>
        </tr>
        <tr>
            <td class="tg-baqh">@if(isset($genre)){{ $genre }} @endif {{ strtoupper($data->name) }}</td>
            <td class="tg-baqh">{{ ucfirst($data->prenom) }}</td>
            <td class="tg-baqh"> <b>{{ $data->d_rv->format('d/m/Y')}}</b> </td>
            <td class="tg-baqh"> <b>{{ $data->h_rv }}</b> <br></td>
        </tr>
        <tr>
            <td class="tg-baqh" colspan="3"></td>

            @php if($data->l_rv == 1) { $l_rv = "Domicile"; } @endphp
            @php if($data->l_rv == 2) { $l_rv = "Bureau"; } @endphp
            @php if($data->l_rv == 3) { $l_rv = "Cabinet"; } @endphp
            @php if($data->l_rv == 4) { $l_rv = "Domicile"; } @endphp

            <td class="tg-baqh fiche-pdf-title " > <b>Lieu RDV: {{ $l_rv }} </b> <br> @if($data->lieux_rendez_vous == "Cabinet") <b></sup>  </b> @endif</td>
        </tr>
        <tr>
            <td class="tg-baqh fiche-pdf-title"> <b>ADRESSE</b> </td>
            <td class="tg-baqh fiche-pdf-title"> <b>SOCIETE</b> </td>
            <td class="tg-baqh fiche-pdf-title"><b>PROFESSION</b> </td>
            <td class="tg-baqh fiche-pdf-title"> <b>TELEPHONES</b> </td>
        </tr>
        <tr>
            <td class="tg-baqh">{{ ucfirst($data->adresse) }}, {{ $data->ville }}, {{ $data->cp }}</td>
            <td class="tg-baqh">{{ $data->societe }}</td>
            <td class="tg-baqh">{{ ucfirst($data->profession) }}</td>
            <td class="tg-baqh">Domicile <br> 
                @if($data->tel_fix == "+33") -- @else {{ str_replace(" ", "", $data->tel_fix) }} @endif 
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l"> <b>EMAIL: </b> @if(is_null($data->email)) -- @else  {{ $data->email }} @endif</td>
            <td class="tg-yw4l"></td>
            <td class="tg-yw4l"></td>
            <td class="tg-baqh">Mobile <br> 
                @if($data->tel_mobile == "+33") -- @else {{ str_replace(" ", "",  $data->tel_mobile ) }} @endif 
            </td>
        </tr>
        <tr>
            <td class="tg-yw4l"></td>
            <td class="tg-yw4l"></td>
            <td class="tg-yw4l"></td>
            <td class="tg-baqh">Bureau <br> 
            @if($data->tel_bureau == "+33") -- @else {{ str_replace(" ", "", $data->tel_bureau) }} @endif 
        </tr>
        <tr>
            <td class="tg-baqh fiche-pdf-title"> <b>AGE</b> </td>
            <td class="tg-baqh fiche-pdf-title"> <b>SITUATION</b> </td>
            <td class="tg-baqh fiche-pdf-title"><b>REVENUE ANNUEL</b></td>
            <td class="tg-baqh fiche-pdf-title"><b>CREDITS EN COURS</b></td>
        </tr>
        <tr>
            <td class="tg-baqh">
                @if(is_null($data->age)) -- 
                @else  {{ $data->age }} @endif 

            <td class="tg-baqh">{{ $data->sf }} avec {{ $data->nbr_enfants }} enfant(s) <br> 
                @if($data->proprietaire == 1) Propriétaire <br> Echéance à {{ $data->loy_eche }} €  
                @elseif($data->locataire == 1) Locataire à {{ $data->loy_eche }} € 
                @elseif ($data->gratuit == 1) Logé à titre gratuit. @endif </td>
            <td class="tg-baqh">
                @if ($data->rev_annee != null)  {{ $data->s_rev }} à {{ $data->rev_annee }} € / {{ $data->net == 1 ? "NET" : "BRUT" }} @else -- @endif <br>
                @if($data->rev_loc != null) Locatif: {{ $data->rev_loc }} € / mois @endif
            </td>
            <td class="tg-baqh">
                <b>AUTO:</b> @if(is_null($data->cre_auto)) 0 @else {{ $data->cre_auto  }} € @endif<br> 
                <b>CONSO:</b> @if(is_null($data->cre_conso)) 0 @else {{ $data->cre_conso  }} € @endif<br>
                <b>RP:</b> @if(is_null($data->cre_res)) 0 @else {{ $data->cre_res  }} € @endif<br>
                <b>AUTRE:</b> @if(is_null($data->cre_autre)) 0 @else {{ $data->cre_autre  }} € @endif<br>
                
            </td>
        </tr>
        <tr>
            <td class="tg-baqh fiche-pdf-title"> <b>IMPOT ANNUEL</b>  </td>
            <td class="tg-baqh fiche-pdf-title" colspan="2"><b>TELECONSEILLER</b></td>
            <td class="tg-baqh fiche-pdf-title"><b>DATE PRISE RDV</b></td>
    
        </tr>
        <tr>
            <td class="tg-baqh">{{ $data->s_imp }} à {{ $data->imp_annee }}  € </td>
            <td class="tg-baqh" colspan="2">@if ($data->user->fictif != null)  {{ $data->user->fictif }} @else {{ $data->user->name }} @endif</td>
        <td class="tg-baqh">{{ $data->created_at->format('d/m/y') }}</td>
        </tr>
    
        <tr>
            <td class="tg-baqh fiche-pdf-title" colspan="4"> <b>TAUX D'ENDETTEMENT: </b>  {{ $data->taux }}%   </td>
        </tr>
    
    
        <tr>
            <td class="tg-yw4l" colspan="4"><b>COMMNETAIRE</b> <br> {{ $data->commentaire }}</td>
        </tr>
    </table>
</center>