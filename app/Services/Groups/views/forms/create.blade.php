<div class="col-md-12">
    <div class="card card-shadow mb-4">

        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Manager <small class="text-muted">Vous pouvez editer aussi les roles des utlisateur</small></h4></div>
                <div class=" widget-action-link">
                    <div class="dropdown">
                        <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown" aria-expanded="false">
                            <i class=" vl_ellipsis-fill-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right vl-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(16px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="/configuration/roles"><i class="fa fa-users"></i> &nbsp Roles</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <dl class="toggle">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <dt>
                    <a href="" class="text-center"><h4>Cliquez pour ajouter un groupe</h4></a>
                </dt>
                <dd>
                    <form method="POST" action="{{ route('group.store') }}" id="group-form-create"> 
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <input id="desc" type="text" class="form-control" name="desc" value="{{ old('desc') }}" >
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">couleur</label>
                            <div id="cp2" class="input-group colorpicker-component  col-md-6" title="Using input value">
                                <input type="text" class="form-control input-lg" value="#000000" name="color" />
                                <div class="input-group-append">
                                   <span class="input-group-addon btn btn-outline-secondary"><i></i></span>
                                </div>
                            </div> 
                        </div>
                       
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Tete de groupe</label>
                            <div class="col-md-6">
                                <select name="user_id" id="user_id" class="form-control" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success form-pill submit-create" id="">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>

                </dd>
            </dl>
        </div>
    </div>
</div>