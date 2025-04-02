<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Prisoner - <?= $prisoner->firstname ?> <?= $prisoner->lastname ?></h2>
            </div>

            <form action="/prisoners/<?= $prisoner->id ?>" method="POST" class="ajax-request">
                <input type="hidden" name="_method" value="PUT" />
                @csrf

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Firstname</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="firstname" value="<?= $prisoner->firstname ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Lastname</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="lastname" value="<?= $prisoner->lastname ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Birthdate</label>
                    </div>
                    <div class="col-10">
                        <input type="date" name="birthdate" value="<?= $prisoner->birthdate ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Date of arrival</label>
                    </div>
                    <div class="col-10">
                        <input type="date" name="date_of_arrival" value="<?= $prisoner->date_of_arrival ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Date of leaving</label>
                    </div>
                    <div class="col-10">
                        <input type="date" name="date_of_leaving" value="<?= $prisoner->date_of_leaving ?>" class="form-control">
                    </div>
                </div>

                <?php if($prisoner->cel_id !== null) { ?>
                    <div class="row mt-3">
                        <div class="col-2 align-content-center">Cel</div>
                        <div class="col-10">
                            <a href="/cel/<?= $prisoner->cel_id ?>"><?= $prisoner->Cel->code ?></a>
                        </div>
                    </div>
                <?php } ?>

                <div class="d-flex mt-1">
                    <button type="submit" class="ms-auto btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
