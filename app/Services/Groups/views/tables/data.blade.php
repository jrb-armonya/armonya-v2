<table id="data_table" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Nombre d'utilisateur</th>
            <th>tete de groupe </th>
            <th>Date Création</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $group)
            <tr>
                <th>{{ $group->id }}</th>
                <th style="color: #{{$group->color}};"> {{ $group->name }}</th>
                <th>{{ $group->desc }}</th>
                <th>{{ $group->users->count() }}</th>
                <th >{{ $group->head()->name }}</th>
                <th>{{ $group->created_at->format('d/m/Y') }}</th>
                <th class="text-center">
                    
                    <a href="{{route ('editGroup',$group->id) }}">
                        <i class="fa fa-eye icon-action-green"></i>
                    </a>
                    
                    <button 
                        type="button" 
                        class= "btn btn-link form-pill btn-action delete-btn"
                        data-id="{{ $group->id }}"
                        data-toggle="modal" data-target="#group-delete" data-whatever="@mdo"> 
                        
                        <i class="fa fa-trash icon-action-red"></i>
                    </button>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>