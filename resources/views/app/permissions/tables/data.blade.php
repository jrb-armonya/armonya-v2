<table id="permissions-data" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th>Description</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $p)
        @if($p->type == 2)
            <tr>
                <th>{{ $p->id }}</th>
                <th>{{ $p->name }}</th>
                <th>{{ $p->desc }}</th>
                <th class="text-center">
                    <a class="btn btn-link form-pill btn-action check-delete" data-id="{{ $p->id }}" onclick="return confirm('Etes vous sur de vouloir supprimer?');">
                        <i class="fa fa-trash icon-action-red"></i>
                    </a>
                </th>
            </tr> 
        @endif
        @endforeach
    </tbody>
</table>