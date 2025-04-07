<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Gebruiker - <?= $user->name ?></h2>
            </div>

            <form action="/users/<?= $user->id ?>" method="POST" class="ajax-request">
                <input type="hidden" name="_method" value="PUT" />
                @csrf

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Naam</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="name" value="<?= $user->name ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Email</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="email" value="<?= $user->email ?>" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Rol</label>
                    </div>
                    <div class="col-10">
                        <select class="form-select" name="role">
                            <option value="0" <?= $user->role == 0 ? 'selected' : '' ?>>Bewaker</option>
                            <option value="1" <?= $user->role == 1 ? 'selected' : '' ?>>Coördinator Bewaker</option>
                            <option value="2" <?= $user->role == 2 ? 'selected' : '' ?>>Directeur</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex mt-1">
                    <button type="submit" class="ms-auto btn btn-primary">Opslaan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card m-2">
        <div class="card-body position-relative">
            <h2>Delicten aangemaakt</h2>

            <table id="incedents" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <div class="card m-2">
        <div class="card-body">
            <h2>Celwijzigingen aangemaakt</h2>

            <table id="cellHistroy" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            createDataTable('incedents', ['gevangene', 'title', 'waneer', 'actie'], '/incidents?userId=<?= $user->id ?>');
            createDataTable('cellHistroy', ['actie', 'gebruiker', 'hoelaat', 'notitie'], '/cellHistories?userId=<?= $user->id ?>');
        });
    </script>
</x-app-layout>
