<span
    class="badge"
    style="background-color: #{{ $role->color }}; color:white;  font-size: 17px;"
    data-toggle="tooltip" data-placement="top" title="Total - mois">
    {{ $mesEcoutedMonth->count() }}
</span>

<span
class="badge badge-success"
style="color: white; font-size: 17px;"
data-toggle="tooltip" data-placement="top" title="Valide après écoute - mois">
<?php   
    $mesValide = $mesEcoutedMonth->where('valid_after_ecoute', 1 )->count() ;
?>
{{ $mesValide }}
</span>

<span
class="badge badge-danger"
style="color: white; font-size: 17px;"
data-toggle="tooltip" data-placement="top" title="Non valide après écoute - mois">
<?php   
    $mesNonValide = $mesEcoutedMonth->where('valid_after_ecoute', 1 )->count() ;
?>
{{ $mesNonValide }}
</span>