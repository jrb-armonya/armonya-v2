<div class="col-md-6">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h5>Liste des fiches de la facture</h5></div>
            </div>
        </div>

        <div class="card-body">
            
            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">

                <thead>
                    <tr>
                        <th>id</th> 
                        <th>Prospect</th>
                        <th>Date Rendez-vous</th>
                        <th>Status</th>
                        <th>action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($facture->fiches as $fiche)
                        <tr>
                            <td>{{$fiche->id}}</td>
                            <td>{{$fiche->name}} {{$fiche->prenom}}</td>
                            <td>{{$fiche->d_rv->format('d/m/y h:m')}}</td>
                            <td><span class="badge badge-status" style="background-color: #{{$fiche->status->color}};">{{$fiche->status->name}}</span></td>
                            <td><a href="{{ url( '/facturation/delete/fiche/' . $fiche->id . '/' . $facture->id  . '') }}" style="color:red;"><i class="fa fa-minus"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>