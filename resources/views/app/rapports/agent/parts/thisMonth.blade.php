<span class="badge badge-primary"
    style="color: white; font-size: 17px;"
    data-toggle="tooltip" data-placement="top" title="Total - jour">
    {{ $mesFichesThisMonth->count() }}
</span>
<span class="badge badge-success" 
    style="font-size: 17px;"
    data-toggle="tooltip" data-placement="top" title="Valide après écoute / mois">
    {{ $mesFichesThisMonth->where('valid_after_ecoute', 1)->count() }}
</span>
<span class="badge  badge-nbr-rapport " style="background-color: #ffa604;"
    data-toggle="tooltip" data-placement="top" title="Valide après écoute / jour">
    {{ $mesFichesThisMonth->where('status', 3)->count() }}
</span>
<span class="badge badge-danger" 
    style="font-size: 17px;"
    data-toggle="tooltip" data-placement="top" title="Non valide après écoute / mois">
    {{ $mesFichesThisMonth->where('no_valid_after_ecoute', 1)->count() }}
</span>
<span class="badge badge-nbr-rapport" 
    style="background-color:#37d304b0;"
    data-toggle="tooltip" data-placement="top" title="Confirmées / mois">
    {{ $mesFichesThisMonth->where('d_confirm', '!=', null)->count() }}
</span>
<span class="badge badge-nbr-rapport" 
    style="background-color:#0000ffb0;"
    data-toggle="tooltip" data-placement="top" title="A Domicile Valide après écoute / mois">
    {{ $mesFichesThisMonth->where('valid_after_ecoute', 1)->where('l_rv', 1)->count() }}
</span>
<span class="badge badge-nbr-rapport" 
    style="background-color:#0000ffb0;"
    data-toggle="tooltip" data-placement="top" title="A Domicile Semaine / mois">
    {{ $mesFichesThisMonth->where('l_rv', 4)->where('valid_after_ecoute')->count() }}
</span>