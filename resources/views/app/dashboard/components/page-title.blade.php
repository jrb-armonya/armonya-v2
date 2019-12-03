<div class="page-title mb-4 d-flex align-items-center">
    <div class="mr-auto">
        <h4 class="weight500 d-inline-block border-right">{{ $title }} <span class="badge" style="color: #{{Auth::user()->role->color}};">{{ Auth::user()->role->name }}</span></h4>
        <nav aria-label="breadcrumb" class="d-inline-block">
            <ol class="breadcrumb p-0">
                    {{-- <li class="breadcrumb-item"><a href="{{ url()->current() }}"> {{url()->current()}}</a></li>  --}}
                    {{-- <li class="breadcrumb-item"><a href="{{ $page['currentUrl'] }}">{{ $page['currentName'] }}</a></li> --}}
            </ol>
        </nav>
    </div>
</div>