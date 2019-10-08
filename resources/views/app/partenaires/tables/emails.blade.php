<table id="data_table" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Date Création</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($emails as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->email }}</th>
                <th>{{ $item->created_at->format('d/m/Y') }}</th>
                <th class="text-right">
                    <button
                        type="button" 
                        class="btn btn-link form-pill btn-action delete-btn"
                        data-id={{ $item->id }}> 
                        <a href="/configuration/partenaires/delete/email/{{$item->id}}"></a><i class="fa fa-trash icon-action-red"></i>
                    </button>
                </th>
                
            </tr>
        @endforeach
    </tbody>
</table>