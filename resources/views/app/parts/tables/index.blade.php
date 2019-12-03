{{-- Data Table --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-info">
                    <div class="custom-title"><h4>{{ UrlHelper::getViewName() }} <small class="text-muted">{{ $description }}</small></h4></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- DataTable for users  --}}
                    <div class="col-xl-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-body- pt-3 pb-4">
                                <div class="table-responsive">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End DataTable --}}
                </div>
            </div>
        </div>
    </div>
</div>