<div class="col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-info">
                    <div class="custom-title"><h4>Liste <small class="text-muted">Vous pouvez supprimer une ip</small></h4></div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  dataTable table-hover table-responsive" id="data_table" style="width:100%; display: inline-table !important;">
                        <thead>
                            <tr>
                                <td>ip</td>
                                <td>nom</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ips as $ip)
                            <tr>
                                <td>{{$ip->ip}}</td>
                                <td>{{$ip->name}}</td>
                                <td>
                                    <form action="{{ route('security.destroy',$ip->id) }}" method="POST">
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