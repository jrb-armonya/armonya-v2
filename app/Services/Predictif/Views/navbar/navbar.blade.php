<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('application/generator')}}"> <img src="https://upload.wikimedia.org/wikipedia/fr/c/cf/Logo_Microsoft_Excel_2013.png" alt="Excel" class="" width="60"> <b>Generator</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('application/generator') }}">Magasin Général <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('application/generator/files') }}">Fichiers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('commande.create') }}">Commande</a>
            </li>
        </ul>
    </div>
</nav>