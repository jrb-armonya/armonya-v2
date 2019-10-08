<div class="row">

    <div class="card col-md-12">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                <div class="custom-title"> 
                    <h5><i class="fa fa-building"></i> 
                        Sociétés
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  dataTable table-hover table-responsive" id="fiches-table" style="width:100%; display: inline-table !important;">
                    <thead>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Standard</th>
                        <th>Numéros</th>
                        <th>Disponnibles</th>
                        <th>Etat</th>
                        <th>Magasin</th>
                        <th>#</th>
                    </thead>
                    <tbody>
                        @foreach($societes as $soc)
                        <tr>
                            <td>{{$soc->name}}</td>
                            <td>{{$soc->adresse}}</td>
                            <td>{{$soc->standard}}</td>
                            <td>{{$soc->nbr_phones}}</td>
                            <td>{{$soc->available_phones->count()}}</td>
                            <td>
                                @if($soc->inFile)
                                    <i class="fa fa-circle text-green"> magasin </i>
                                @else
                                <i class="fa fa-circle text-danger"> pas magasin</i>
                                @endif
                                {{-- <i class="fa fa-circle   @if($soc->inFile) text-green @else text-danger @endif ">@if($soc->inFile) Mangasin @else Non magasin @endif</i> --}}
                            </td>
                            <td>

                                @if($soc->inFile)
                                    <a href="{{route('remove-societe-from-file', $soc->id)}}">
                                        <i class="fa fa-minus pull-right text-danger"></i>
                                    </a>
                                @else
                                    <a href="{{route('add-societe-to-file', $soc->id)}}">
                                        <i class="fa fa-plus pull-right text-success"></i>
                                    </a>
                                @endif

                            </td>
                            <td>
                                <a href="{{route('societe.destroy', $soc->id)}}" onclick="return confirm('Tous les numéros de la societe seront supprimés! êtes-vous sûr de vouloir supprimer?')">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="card-footer">
            <p class="text-muted">
                <i class="fa fa-circle text-danger"></i> n'est pas dans le magasin.
                <i class="fa fa-circle text-green"></i> est dans le magasin.
                <i class="fa fa-circle text-warning"></i> epuisée.
            </p>
        </div>
    </div>
</div>