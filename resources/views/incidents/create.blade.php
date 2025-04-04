<?php 
use Illuminate\Support\Facades\Auth;
?>
<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Nieuw Dilect - <?= $prisoner->firstname . ' ' . $prisoner->lastname?></h2>
            </div>

            <form action="{{ route('incidents.store') }}" method="POST" class="ajax-request reload-on-success">
                @csrf

                <input type="hidden" name="user_id" value="<?= Auth::id() ?>">
                <input type="hidden" name="prisoner_id" value="<?= $prisoner->id ?>">

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Title</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="title" value="" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Omschrijving</label>
                    </div>
                    <div class="col-10">
                        <textarea id="description" name="description" class="form-control" style="height: 250px"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Gevangene</label>
                    </div>
                    <div class="col-10">
                        <a href="/prisoners/<?= $prisoner->id ?>"><?= $prisoner->firstname . ' ' . $prisoner->lastname ?></a>
                    </div>
                </div>

                <div class="d-flex mt-1">
                    <button type="submit" class="ms-auto btn btn-primary">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
