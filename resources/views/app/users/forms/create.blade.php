<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Manager <small class="text-muted">Vous pouvez editer aussi les roles et les permissions</small></h4></div>
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
                <dt>
                    <a href="" class="text-center"><h4>Cliquez pour ajouter un utilisateur</h4></a>
                </dt>
                <dd>
                    <form method="POST" action="{{ route('create.user') }}" id="user-form-create"> 
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom Fictif (*)</label>
                            <div class="col-md-6">
                                <input id="fictif" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="fictif" value="{{ old('fictif') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="off">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Role</label>

                            <div class="col-md-6">
                                <select name="role_id" id="role_id" class="form-control" required>
                                    @foreach($roles as $role)
                                        @if($role->name == "Agent")
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @elseif(Auth::user()->role_id != 6)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
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