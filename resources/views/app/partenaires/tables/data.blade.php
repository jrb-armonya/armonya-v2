<table id="data_table" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Description</th>
            <th>Emails</th>
            <th>Date Création</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($partenaires as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->name }}</th>
                <th>{{ $item->email }}</th>
                <th>{{ $item->desc }}</th>
                <th>{{ $item->emails->count() }}</th>
                <th>{{ $item->created_at->format('d/m/Y') }}</th>
                <th class="text-center">
                    <button type="button" 
                            class="btn btn-link form-pill btn-action open" 
                            data-id={{ $item->id }}
                            data-toggle="modal" data-target="#partenaire-modal" data-whatever="@mdo"> 
                        <a href='/configuration/partenaires/{{ $item->id }}'><i class="fa fa-eye icon-action-green"></i></a>
                    </button>
                    <button 
                        type="button" 
                        id="delete_partenaire"
                        class="btn btn-link form-pill btn-action delete-btn"
                        data-id="{{ $item->id }}"
                        data-toggle="modal" data-target="#partenaire-delete" data-whatever="@mdo"> 
                        <i class="fa fa-trash icon-action-red"></i>
                    </button>
                </th>
                
            </tr>
        @endforeach
    </tbody>
</table>