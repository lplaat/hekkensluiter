<x-app-layout>
    <div class="modal fade" id="cell-finder" tabindex="-1" aria-labelledby="cell-finder" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Cell Finder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <table id="searchResults" class="table table-striped">
                        <thead>

                        </thead>
                    </table>
                </div>

                <div class="modal-footer">
                    <?php if($prisoner->cell_id !== null) { ?>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="assignCell(null)">Unassign</button>
                    <?php } ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Prisoner - <?= $prisoner->firstname ?> <?= $prisoner->lastname ?></h2>
            </div>

            <form action="/prisoners/<?= $prisoner->id ?>" method="POST" id="prisoners-from" class="ajax-request reload-on-success">
                <input type="hidden" name="_method" value="PUT" />

                @csrf

                <input type="hidden" name="cell_id" value="<?= $prisoner->cell_id ?>" />

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

                <div class="row mt-3">
                    <div class="col-2 align-content-center">Cell</div>
                    <div class="col-10">
                        <?php if($prisoner->cell_id !== null) { ?>
                            <a href="/cells/<?= $prisoner->cell_id ?>"><?= $prisoner->Cell->code ?></a> - <a href="#" data-bs-toggle="modal" data-bs-target="#cell-finder" onclick="cellSearch()">Change Cell</a>
                        <?php } else { ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#cell-finder" onclick="cellSearch()">Search Cell</a>
                        <?php } ?>
                    </div>
                </div>

                <div class="d-flex mt-1">
                    <button type="submit" class="ms-auto btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let table = null;
        function cellSearch() {
            if(table !== null) {
                table.destroy(); 
            }

            table = createDataTable('searchResults', ['id', 'code', 'status', 'action'], '/cells?occupation=false&action=prisonerAssign');
        }

        function assignCell(celId) {
            if(celId == null) {
                $('input[name=cell_id]').val('');
            } else {
                $('input[name=cell_id]').val(celId);
            }
            
            $('#cell-finder').modal('hide');
            $('#prisoners-from').submit();
        }
    </script>
</x-app-layout>
