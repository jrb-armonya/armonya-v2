<span class="badge badge-primary badge-nbr-rapport" 
    data-toggle="tooltip" data-placement="top" title="Total - jour">
    {{ $mesFichesToday->count() }}
</span>

<span class="badge badge-success badge-nbr-rapport" 
    data-toggle="tooltip" data-placement="top" title="Valide après écoute / jour">
    {{  $mesFichesToday->where('valid_after_ecoute', 1)->count() }}
</span>

<span class="badge  badge-nbr-rapport " style="background-color: #ffa604;"
    data-toggle="tooltip" data-placement="top" title="A Reporter">
    {{ $mesFichesToday->where('status', 3)->count() }}
</span>

<span class="badge badge-danger badge-nbr-rapport" 
    data-toggle="tooltip" data-placement="top" title="Non valide après écoute / jour">
    {{ $mesFichesToday->where('no_valid_after_ecoute', 1)->count() }}
</span>
<span class="badge badge-nbr-rapport" 
    style="background-color:#37d304b0;"
    data-toggle="tooltip" data-placement="top" title="Confirmées / jour">
    {{ $mesFichesToday->where('d_confirm', '!=', null)->count() }}
</span>
<span class="badge badge-nbr-rapport" 
    style="background-color:#0000ffb0;"
    data-toggle="tooltip" data-placement="top" title="A Domicile / jour">
    {{ $mesFichesToday->where('valid_after_ecoute', 1)->where('l_rv', 1)->count() }}
</span>
<span class="badge badge-nbr-rapport" 
    style="background-color:#0000ffb0;"
    data-toggle="tooltip" data-placement="top" title="A Domicile Semaine/ jour">
    {{ $mesFichesToday->where('l_rv', 4)->where('valid_after_ecoute', 1)->count() }}
</span>