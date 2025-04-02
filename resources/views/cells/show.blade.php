<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Cell - <?= $cell->code ?></h2>
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
                        <label>Wing Code</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="wing_code" value="<?= $cell->wing_code ?>" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-1">
                    <button type="submit" class="ms-auto btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
