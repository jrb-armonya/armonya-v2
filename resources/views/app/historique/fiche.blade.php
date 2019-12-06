@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-danger">
                        <div class="custom-title">Historique de la fiche {{$fiche->id}} - {{ $fiche->name }} {{ $fiche->prenom}}</div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled base-timeline activity-timeline">
                        <li class="">
                            <div class="timeline-icon rounded-circle bg-white sr-icon-box text-purple">
                                <i class="icon-note"></i>
                            </div>
                            <div class="base-timeline-info">
                                <a href="">{{$fiche->user->name }}</a> - Création
                            </div>
                            <small class="">
                                le {{$fiche->created_at->format('d/m/Y H:i')}}
                            </small>
                            <a href="{{ url('historique/details/first', $fiche->id ) }}" target="_blank">
                                <i class="icon-info"></i>
                            </a>
                        </li>
                        @foreach($fiche->actions as $action)
                            @if($action->action != "Création")
                                <li class="">
                                    @if( $action->action == "Edit" )
                                        <div class="timeline-icon rounded-circle bg-white sr-icon-box text-primary">
                                            <i class=" ti-pencil "></i>
                                        </div>

                                        <div class="base-timeline-info">
                                            <a href="">{{$action->user->name }}</a> -  Edit
                                        </div>
                                        <small class="text-muted">
                                            {{ $action->created_at->format('d/m/Y H:i') }}
                                        </small>
                                    @else
                                        <div class="timeline-icon rounded-circle sr-icon-box bg-white">
                                                @if(in_array($action->newStatus->id, \Config::get('status.noValid')))
                                                    <i class="{{$action->newStatus->icon}}"  style="color: #{{$action->newStatus->color}}; display:inline;"></i>
                                                    {{-- <i class="{{$action->newStatus->icon}}"  style="color: #{{$action->newStatus->color}}; display:inline; font-size: 15px;"></i> --}}
                                                @elseif($action->action == "Ecoute" || $action->action == "Report")
                                                    <i class="{{$action->oldStatus->icon}}"  style="color: #{{$action->oldStatus->color}};"></i>
                                                @else
                                                    <i class="{{$action->newStatus->icon}}"  style="color: #{{$action->newStatus->color}};"></i>
                                                @endif
                                        </div>
                                        <div class="base-timeline-info">
                                                {{ $action->action }} par <a href="widget-basic.html#">{{$action->user->name }}</a> -  de <b>{{ $action->oldStatus->name }}</b> à <b>{{ $action->newStatus->name }}</b>
                                        </div>
                                        <small class="text-muted">
                                            {{ $action->created_at->format('d/m/Y H:i') }}
                                        </small>
                                    @endif

                                    <a href="{{ url('historique/details', $action->id ) }}" target="_blank">
                                        <i class="icon-info"></i>
                                    </a>
                                </li>
                            @endif
                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
</div>
@endsection