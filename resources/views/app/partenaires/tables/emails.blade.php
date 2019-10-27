<table id="data_table" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Date Création</th>
            <th>Espace Partenaire</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($emails as $email)
            <tr>
                <th>{{ $email->id }}</th>
                <th>{{ $email->email }}</th>
                <th>{{ $email->created_at->format('d/m/Y') }}</th>
                <th>
                    @if($email->user)
                    <a href="javascript::void()" class="text-success">
                        Espace Partenaire Créé
                    </a>
                    @else
                    <a href="{{route('espace-partenaire.create', $email->id)}}">
                        Créer Espace Partenaire
                    </a>
                    @endif
                </th>
                <th class="text-right">
                    <button
                        type="button" 
                        class="btn btn-link form-pill btn-action delete-btn"
                        data-id={{ $email->id }}> 
                        <a href="/configuration/partenaires/delete/email/{{$email->id}}"></a><i class="fa fa-trash icon-action-red"></i>
                    </button>
                </th>
                
            </tr>
        @endforeach
    </tbody>
</table>