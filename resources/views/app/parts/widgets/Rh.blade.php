@foreach($widgets as $w)
    <?php $path = "app.parts.widgets.components." . $w->name; ?>
    {{-- CREATED ALL  --}}
    @if($w->name == 'created-all')
        @component($path)
            @slot('day', App\Fiche::toDayAgent()->count() )
            @slot('month', App\Fiche::thisMonthAgent(date('m'))->count())
            @slot('moisOthers', App\Fiche::thisMonthOthers()->count())
            @slot('link', '/fiches/created')
        @endcomponent
    @else
        @if($w->status_id != null)
        {{-- DONE DAY MONTH --}}
            @component($path)
                @slot('class', $w->status->class )
                @slot('icon', $w->status->icon)
                @slot('title', $w->status->name)
                @slot('bgcolor', $w->status->color)
                @slot('day', $w->status->doneToday($w->status->id)->count())
                @slot('month', $w->status->doneThisMonth($w->status->id)->count() )
                @slot('link', "/fiches/done/" . $w->status->id )
                @slot('text')
                    @if($w->status->id == 3)
                        Traitées et créées
                    @else
                        
                    @endif
                @endslot
            @endcomponent
        @else
        
            @component($path)
                @slot('status', $status)
            @endcomponent
        @endif

    @endif

@endforeach


@include('app.parts.widgets.components.week-production')
@section("{{ Auth::user()->role->name }}")
    <script src="{{ asset('/backend/assets/vendor/js-init/chartjs/init-week-production.js') }}"></script>
@endsection