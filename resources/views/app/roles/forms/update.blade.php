<form action="/configuration/roles/update" method="POST">
@csrf
    <input type="hidden" name="id" value="{{$role->id}}">
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="form-row align-items-center">
                <div class="col-md-4">
                    <label for="name" class="col-form-label">Role</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $role->name }}">
                </div>
                <div class="col-md-4">
                    <label for="desc" class="col-form-label">Description</label>
                    <input type="text" class="form-control" id="desc" name="desc" value="{{ $role->desc }}">
                </div>
                <div class="col-md-4">
                    <label for="color" class="col-form-label"> &nbsp </label>
                    <div id="cp2" class="input-group colorpicker-component col-md-9" title="Using input value">
                        <input type="text" class="form-control input-lg" value="{{$role->color}}" name="color" id="color" required/>
                        <div class="input-group-append">
                            <span class="input-group-addon btn btn-outline-secondary"><i></i></span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group row mb-5">
                <label class="col-form-label col-md-12" for="permissions">Pages</label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <select name="permissions[]" class="multi-select" multiple="" id="permissions-pages">
                        @foreach ($permissions as $p)
                            @if( $p->type == 0)
                                @if( $role->permission($p->name) )
                                    <option value="{{$p->id}}" selected>{{ $p->name }}</option>
                                @else
                                    <option value="{{$p->id}}">{{ $p->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group row mb-5">
                <label class="col-form-label col-md-12" for="permissions">Status</label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <select name="permissions[]" class="multi-select" multiple="" id="permissions-status">
                        @foreach ($permissions as $p)
                            @if($p->type == 1)
                                @if( $role->permission($p->name) )
                                    <option value="{{$p->id}}" selected>{{ $p->name }}</option>
                                @else
                                    <option value="{{$p->id}}">{{ $p->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="form-group row mb-5">
                <label class="col-form-label col-md-12" for="permissions">Custom</label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <select name="permissions[]" class="multi-select" multiple="" id="permissions-custom">
                        @foreach ($permissions as $p)
                            @if($p->type == 2)
                                @if( $role->permission($p->name) )
                                    <option value="{{$p->id}}" selected>{{ $p->name }}</option>
                                @else
                                    <option value="{{$p->id}}">{{ $p->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>

    <input type="submit" class="btn btn-primary btn-success col-md-12" value="Enregistrer">
</form>