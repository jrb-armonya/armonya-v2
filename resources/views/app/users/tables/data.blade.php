<table id="data_table" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Fictif</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date Création</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->fictif }}</th>
                <th>{{ $user->email }}</th>
                <th style="color: #{{$user->role->color}};">{{ $user->role->name }}</th>
                <th>{{ $user->created_at->format('d/m/Y') }}</th>
                <th class="text-center">
                    <button type="button"
                            class="btn btn-link form-pill btn-action open" 
                            data-id={{ $user->id }}
                            data-toggle="modal" data-target="#user-modal" data-whatever="@mdo"> 
                        <i class="fa fa-eye icon-action-green"></i> 
                    </button>
                    <button 
                        type="button" 
                        class="btn btn-link form-pill btn-action delete-btn"
                        data-id={{ $user->id }}
                        data-toggle="modal" data-target="#user-delete" data-whatever="@mdo"> 
                        <i class="fa fa-trash icon-action-red"></i>
                    </button>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>