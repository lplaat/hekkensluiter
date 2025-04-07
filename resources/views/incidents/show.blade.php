<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Delict - <?= $incident->Prisoner->firstname . ' ' . $incident->Prisoner->lastname ?> - <?= $incident->title ?></h2>
            </div>

            <form action="/incidents/<?= $incident->id ?>" method="POST" class="ajax-request reload-on-success <?= Auth::user()->role == 0 ? 'readonly-fields' : '' ?>">
                <input type="hidden" name="_method" value="PUT" />
                @csrf

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Title</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="title" value="<?= $incident->title ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Omschrijving</label>
                    </div>
                    <div class="col-10">
                        <textarea id="description" name="description" class="form-control" style="height: 250px"><?= $incident->description ?></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Gevangene</label>
                    </div>
                    <div class="col-10">
                        <a href="/prisoners/<?= $incident->prisoner_id ?>"><?= $incident->Prisoner->firstname . ' ' . $incident->Prisoner->lastname ?></a>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Aangemaakt door</label>
                    </div>
                    <div class="col-10">
                        <?php if(Auth::user()->role == 2) { ?>
                            <a href="/users/<?= $incident->user_id ?>"><?= $incident->User->name ?></a>
                        <?php } else { ?>
                            <span><?= $incident->User->name ?></span>
                        <?php } ?>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Aangemaakt om</label>
                    </div>
                    <div class="col-10">
                        <a><?= $incident->created_at->format('Y-m-d H:i:s'); ?></a>
                    </div>
                </div>

                <?php if(Auth::user()->role !== 0) {?>
                    <div class="d-flex mt-1">
                        <button type="submit" class="ms-auto btn btn-primary">Opslaan</button>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</x-app-layout>
