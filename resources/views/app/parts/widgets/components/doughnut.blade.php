<?php 
$fiches_count = [];
$bg_colors = [];

$labels = $status->pluck('name');
foreach($status as $s){
    $s->color = '#'.$s->color;
    array_push( $fiches_count, $s->fiches->count() );
}

$colors = $status->pluck('color');

$bg_colors = $colors->map(function($c){
    return $c . 'a1';
});

//indice
//fiches créer par agent / nbr agent
$f = new App\Fiche();
//nbr agent
$nbrAgent = App\User::where('role_id', 2)->count();

$fichesMonth = $f->thisMonthAgent(date('m'))->count();
$fichesDay = $f->toDayAgent()->count();


$indiceMois = round($fichesMonth/ 20 / max($nbrAgent, 1), 1);
$indiceJour = round($fichesDay/ max($nbrAgent, 1), 1);

?>
<div class="col-xl-5 col-md-5">
    <div class="card card-shadow mb-4 ">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-warning">
                <div class="custom-title">Production <small>Indice jour: {{$indiceJour}}</small></div>
            </div>
        </div>
        <div class="card-body card-widget">
            <canvas id="doughnut_chart" height="188"></canvas>
        </div>
    </div>
</div>

<script>
    var config = {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($fiches_count); ?>,
                    backgroundColor: <?php echo json_encode($colors); ?>,
                    hoverBackgroundColor: <?php echo json_encode($bg_colors); ?>
                }]
            },
        options: {
            legend: {
                display: false
            },
            elements: {
                center: {
                    text: {{$indiceMois}} + ' - ' + {{$indiceJour}} ,
                    color: '#FF6384', // Default is #000000
                    fontStyle: 'Arial', // Default is Arial
                    sidePadding: 20 // Defualt is 20 (as a percentage)
                }
            }
        }
    };
</script>