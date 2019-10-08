<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Fichier en cours: <small>{{$societesEnCours->count()}} societe(s)</small>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  dataTable table-hover table-responsive" id="data_table" style="width:100%; display: inline-table !important;">
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Num Standard</td>
                                <td>Adresse</td>
                                <td>Nbr Téléphones</td>
                                <td>Commnetaire</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($societesEnCours as $societe)
                            <tr>
                                <td>{{ $societe->name }}</td>
                                <td>{{ $societe->standard }}</td>
                                <td>{{ $societe->adresse }}</td>
                                <td>{{ $societe->nbr_phones }}</td>
                                <td>{{ $societe->comment }}</td>
                                <td>
                                    {{-- show --}}
                                    <a href="{{ route('societes.show', $societe->id) }}" class="btn btn-sm btn-info">Voir</a>
                                    @if($societe->inFile) 
                                        {{-- remove societe --}}
                                        <a href="{{url('predictif/remove-societe-from-file', $societe->id)}}">
                                            <button  class="btn btn-sm btn-warning"  @if($societe->inFile == 2 ) disabled @endif >Enlever</button>
                                        </a>
                                    @else
                                    {{-- add Societe --}}
                                    <a href="{{url('predictif/add-societe-to-file', $societe->id)}}">
                                        <button  class="btn btn-sm btn-success" >Ajouter</button>
                                    </a>
                                    @endif
                                    <form action="{{ route('predictif.destroy',$societe->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
