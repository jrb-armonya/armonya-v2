<table id="data_table" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th>Description</th>
            <th>Date Création</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
            <tr>
                <th>{{ $role->id }}</th>
                <th style="color: #{{$role->color}};">{{ $role->name }}</th>
                <th>{{ $role->desc }}</th>
                <th>{{ $role->created_at->format('d/m/Y') }}</th>
                <th class="text-center">
                    <a class="btn btn-link form-pill btn-action open" href="/configuration/roles/edit/{{$role->id}}">
                        <i class="fa fa-key icon-action-red"></i>
                    </a>
                </th>
                
            </tr>
        @endforeach
    </tbody>
</table>