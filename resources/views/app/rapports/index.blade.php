@extends('layouts.app')
@section('content')
        @foreach($roles as $role)
            @if($role->name != "Agent")
                @if(Auth::user()->role_id != 6)
                <div class="row">
                    <a href="/rapports/role/{{ strtolower($role->name) }}" style="width:100%;">
                        <div class="col-xl-12 col-sm-12">
                            <div class='card card-rapports-roles mb-4' style="background-color: #{{$role->color}};">
                                <div class="card-body">
                                    <div class="media d-flex align-items-center">
                                        <div class="mr-4 rounded-circle sr-icon-box text-white">
                                            @if($role->status_id != null)
                                                <i class="{{$role->status->icon}}"></i>
                                            @else                                
                                                <i class="vl_user-male"></i>
                                            @endif
                                        </div>
                                        <div class="media-body text-light">
                                            <h4 class="text-uppercase mb-0 weight500">{{$role->name}}</h4>
                                            <span>{{$role->users->count()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @else
                @if(Auth::user()->role_id != 9)
                    <div class="row">
                        <a href="/rapports/role/{{ strtolower($role->name) }}" style="width:100%;">
                            <div class="col-xl-12 col-sm-12">
                                <div class='card card-rapports-roles mb-4' style="background-color: #{{$role->color}};">
                                    <div class="card-body">
                                        <div class="media d-flex align-items-center">
                                            <div class="mr-4 rounded-circle sr-icon-box text-white">
                                                @if($role->status_id != null)
                                                    <i class="{{$role->status->icon}}"></i>
                                                @else                                
                                                    <i class="vl_user-male"></i>
                                                @endif
                                            </div>
                                            <div class="media-body text-light">
                                                <h4 class="text-uppercase mb-0 weight500">{{$role->name}}</h4>
                                                <span>{{$role->users->count()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endif
        @endforeach
        
        @if(Auth::user()->role_id != 6)
        <div class="row">
            <a href="/rapports/synthese" style="width:100%;">
                <div class="col-xl-12 col-sm-12">
                    <div class='card card-rapports-roles mb-4' style="background-color: #6fa1aa;">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="mr-4 rounded-circle sr-icon-box text-white">
                                    <i class="ti-pie-chart"></i>
                                </div>
                                <div class="media-body text-light">
                                    <h4 class="text-uppercase mb-0 weight500">Synthèse</h4>
                                    <span> - </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif
        <div class="row">
            <a href="/rapports/jplus" style="width:100%;">
                <div class="col-xl-12 col-sm-12">
                    <div class='card card-rapports-roles mb-4' style="background-color: #766df9;">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="mr-4 rounded-circle sr-icon-box text-white">
                                    <i class="ti-pie-chart"></i>
                                </div>
                                <div class="media-body text-light">
                                    <h4 class="text-uppercase mb-0 weight500">Moyenne J +</h4>
                                    <span> - </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="row">
            <a href="/rapports/groups" style="width:100%;">
                <div class="col-xl-12 col-sm-12">
                    <div class='card card-rapports-roles mb-4' style="background-color: #910101;">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="mr-4 rounded-circle sr-icon-box text-white">
                                    <i class="fa fa-users"></i>                                </div>
                                <div class="media-body text-light">
                                    <h4 class="text-uppercase mb-0 weight500">Groups</h4>
                                    <span> {{$groups->count()}} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
@endsection