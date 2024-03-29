@extends("layout.app")
@section("content")
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">S</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">STAGIER</p>
            <h4 class="mb-0">{{$stagierCount = \App\Models\Stagier::all()->count()}}</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>list Stagier</p>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">G</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Groupe</p>
            <h4 class="mb-0">{{$groupeCount = \App\Models\Groupe::all()->count()}}</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>List Groupe</p>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">M</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Modele</p>
            <h4 class="mb-0">{{$ModeleCount = \App\Models\Modele::all()->count()}}</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span>List Modele</p>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6">
    <div class="card">
        <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">N</i>
        </div>
        <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Notes</p>
            <h4 class="mb-0">{{$notesCount = \App\Models\Note::all()->count()}}</h4>
        </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>List Note</p>
        </div>
    </div>
    </div>
</div>
@endsection
