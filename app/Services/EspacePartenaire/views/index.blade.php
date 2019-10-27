@extends('espace-partenaire::layouts.espace-partenaire')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-inline-block ">
    <ol class="breadcrumb p-0">
        {{-- <li class="breadcrumb-item"><a href="{{url('/espace-partenaire')}}">Dashboard</a></li> --}}
        {{-- <li class="breadcrumb-item"><a href="icon-fontawesome.html#">Icons</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
@endsection
@section('content')


{{-- @dd(Auth::user()->partenaire()); --}}
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card card-shadow mb-4 bg-primary text-white">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-4 col-lg-4 text-center">
                        <img class="d-inline-block mb-3 mb-lg-0" src="https://www.zuora.com/wp-content/uploads/2017/01/SS1-Iconfile-small-01-1280x1280.png" srcset="https://www.zuora.com/wp-content/uploads/2017/01/SS1-Iconfile-small-01-1280x1280.png" width="200px" alt="">
                    </div>
                    <div class="col-sm-8 col-lg-8">
                        <h4 class="weight600 mb-0">{{ Auth::user()->name }}</h4>
                        <small class=" f12 text-white">Bienvenue sur votre Espace Partenaire</small>
                        <div class="widget-price mt-3">
                            <span class="f24">
                                {{ Auth::user()->partenaire()->first()->fiches->count() }}
                            </span>
                            {{-- <del class="">$ 4,432</del> --}}
                        </div>
                        <p class=" f12">Fiches au total</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection