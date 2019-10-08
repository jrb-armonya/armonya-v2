<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Liste <small class="text-muted">Vous pouvez supprimer une date</small></h4></div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  dataTable table-hover table-responsive" id="data_table" style="width:100%; display: inline-table !important;">
                    <thead>
                        <tr>
                            <td>date</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dates as $date)
                        <tr>
                            <td>{{$date->date->format('d/m/Y')}}</td>
                            <td>
                                <form action="{{ route('dates.destroy',$date->id) }}" method="POST">
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