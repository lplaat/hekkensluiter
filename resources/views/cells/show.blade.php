<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Cel - <?= $cell->code ?></h2>
            </div>

            <form action="/cells/<?= $cell->id ?>" method="POST" class="ajax-request">
                <input type="hidden" name="_method" value="PUT" />
                @csrf

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Code</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="code" value="<?= $cell->code ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Vleugel Code</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="wing_code" value="<?= $cell->wing_code ?>" class="form-control">
                    </div>
                </div>

                <?php if($cell->currentPrisoner !== null) { ?>
                    <div class="row mt-3">
                        <div class="col-2 align-content-center">
                            Huidige gevangene
                        </div>
                        <div class="col-10">
                            <a href="/prisoners/<?= $cell->currentPrisoner->id ?>"><?= $cell->currentPrisoner->firstname . ' ' . $cell->currentPrisoner->lastname ?></a>
                        </div>
                    </div>
                <?php } ?>

                <div class="d-flex mt-1">
                    <button type="submit" class="ms-auto btn btn-primary">Opslaan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card m-2">
        <div class="card-body">
            <h2>Cel Geschiedenis</h2>

            <table id="cellHistroy" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            createDataTable('cellHistroy', ['actie', 'gebruiker', 'hoelaat', 'notitie'], '/cellHistories?cellId=<?= $cell->id ?>');
        });
    </script>
</x-app-layout>
