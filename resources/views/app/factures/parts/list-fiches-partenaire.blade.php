<div class="col-md-6">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h5>Liste des fiches de {{$partenaire->name}}</h5></div>
            </div>
        </div>

        <div class="card-body">
            
            <table id="data_table_part" class="table table-bordered table-striped" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Prospect</th>
                        <th>Date Rendez-vous</th>
                        <th>Date d'envoi</th>
                        <th>Status</th>
                        <th>action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($partenaire->fichesCibled()->where('facture_id', null) as $fiche)
                        <tr>
                            <td>{{$fiche->id}}</td>
                            <td>{{$fiche->name}} {{$fiche->prenom}}</td>
                            <td>{{$fiche->d_rv->format('d/m/y h:m')}}</td>
                            <td>{{ $fiche->d_env == null ? 'Pas enregistrer dans la v1.0' :  $fiche->d_env->format('d/m/y h:m')}}</td>
                            <td><span class="badge badge-status" style="background-color: #{{$fiche->status->color}};">{{$fiche->status->name}}</span></td>
                            <td><a href="{{ url( '/facturation/add/fiche/' . $fiche->id . '/' . $facture->id  . '') }}"><i class="fa fa-plus"></i></a></td>

                            {{-- <a href="{{ url('facturation/add/fiche/ ' . $fiche->id . '/' . $facture->id .')}}" title="Edit signature"> --}}

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>