<div class="row">
    <div class="card col-md-12">

        <div class="row">
            <div class="card bg-primary card-shadow py-2 text-white col-md-6">
                <div class="card-body">
                    <h5 class="font-weight-bold mt-0" title="Number of Orders">Magasin Général</h5>
                    <div class="float-right">
                        <i class="fa fa-building fa-3x text-white"></i>
                    </div>
                    <h3 class=" text-center float-left" id="my-created-toDay">{{$societes->count()}}</h3>
                </div>
            </div>

            {{-- <div class="card bg-success card-shadow py-2 text-white col-md-6">
                <div class="card-body">
                    <h5 class="font-weight-bold mt-0" title="Number of Orders">Fichier Général</h5>
                    <div class="float-right">
                        <i class="fa fa-building fa-3x text-white"></i>
                    </div>
                    <h3 class=" text-center float-left" id="my-created-toDay">{{ $availableSocietes->count() }}</h3>
                </div>
            </div> --}}

            <div class="card bg-primary card-shadow py-2 text-white col-md-6">
                <div class="card-body">
                    <h5 class="font-weight-bold mt-0" title="Number of Orders">Magasin Général</h5>
                    <div class="float-right">
                        <i class="fa fa-phone fa-3x text-white"></i>
                    </div>
                    <h3 class=" text-center float-left" id="my-created-toDay">{{ $phonesCount }}</h3>
                </div>
            </div>
            {{-- <div class="card @if($availablePhonesCount == 0) bg-danger @else bg-success @endif card-shadow py-2 text-white col-md-6">
                <div class="card-body">
                    <h5 class="font-weight-bold mt-0" title="Number of Orders">Fichier Général</h5>
                    <div class="float-right">
                        <i class="fa fa-phone fa-3x text-white"></i>
                    </div>
                    <h3 class=" text-center float-left" id="my-created-toDay">{{ $availablePhonesCount }}</h3>
                </div>
            </div> --}}
            

        </div>

    </div>
</div>