<form action="{{ route('updateGroup') }}" method="POST">
@csrf
    <input type="hidden" name="id" value="{{$group->id}}">
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="form-row align-items-center">
                <div class="col-md-4">
                    <label for="name" class="col-form-label">Nom</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $group->name }}">
                </div>
                <div class="col-md-4">
                    <label for="desc" class="col-form-label">Description</label>
                    <input type="text" class="form-control" id="desc" name="desc" value="{{ $group->desc }}">
                </div>
                <div class="col-md-4">
                    <label for="color" class="col-form-label"> Couleur </label>
                    <div id="cp2" class="input-group colorpicker-component" title="Using input value">
                        <input type="text" class="form-control input-lg" value="{{$group->color}}" name="color" id="color" required/>
                        <div class="input-group-append">
                            <span class="input-group-addon btn btn-outline-secondary"><i></i></span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="user_id" class="col-12">Tête du groupe</label>
        <div class="col-md-12">
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    
                        @if( $group->head()->id == $user->id )
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                  
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group row mb-5">
                <label class="col-form-label col-md-12" for="group">TA</label>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <select name="users[]" class="multi-select" multiple="" id="group-pages">

                        @foreach ($users as $user)

                            @if($user->inGroup($group->id))
                                {{-- Selected --}}
                                <option value="{{$user->id}}" selected>{{ $user->name }}</option>
                            @else
                                {{-- NOT Selected --}}
                                <option value="{{$user->id}}">{{ $user->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <input type="submit" class="btn btn-primary btn-success col-md-12" value="Enregistrer">
</form>