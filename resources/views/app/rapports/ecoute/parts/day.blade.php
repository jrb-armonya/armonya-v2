<span 
    class="badge"
    style="background-color: #{{ $role->color }}; color:white;  font-size: 17px;"
    data-toggle="tooltip" data-placement="top" title="Total - jour">

    {{ $mesEcoutedDay->count() }}
</span>

<span 
    class="badge badge-success"
    style="color: white; font-size: 17px;"
    data-toggle="tooltip" data-placement="top" title="Valide après écoute - jour">
    <?php   
        $mesValideDay = $mesEcoutedDay->where('valid_after_ecoute', 1 )->count() ;
    ?>
    {{ $mesValideDay }}
</span>

<span 
    class="badge badge-danger"
    style="color: white; font-size: 17px;"
    data-toggle="tooltip" data-placement="top" title="Non valide après écoute - jour">
    <?php   
        $mesNonValideDay = $mesEcoutedDay->where('no_valid_after_ecoute', 1 )->count() ;
    ?>
    {{ $mesNonValideDay }}
</span>