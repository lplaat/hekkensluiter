<x-app-layout>
    <div class="modal fade" id="cell-finder" tabindex="-1" aria-labelledby="cell-finder" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Cel Zoeker</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="p-2">
                    <textarea id="transferNote" class="form-control" placeholder="Notitie voor celwijziging"></textarea>
                </div>

                <div class="modal-body">
                    <table id="searchResults" class="table table-striped">
                        <thead>

                        </thead>
                    </table>
                </div>

                <div class="modal-footer">
                    <?php if($prisoner->cell_id !== null) { ?>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="assignCell(null)">Loskoppelen</button>
                    <?php } ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-2">
        <div class="col-8 px-0 pe-1">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h2>Gevangene - <?= $prisoner->firstname ?> <?= $prisoner->lastname ?></h2>
                    </div>
        
                    <form action="/prisoners/<?= $prisoner->id ?>" method="POST" id="prisoners-from" class="ajax-request reload-on-success <?= Auth::user()->role == 0 ? 'readonly-fields' : '' ?>">
                        <input type="hidden" name="_method" value="PUT" />
        
                        @csrf
        
                        <input type="hidden" name="cell_id" value="<?= $prisoner->cell_id ?>" />
                        <input type="hidden" name="note" value="" />
        
                        <div class="row mt-3">
                            <div class="col-2 align-content-center">
                                <label>Voornaam</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="firstname" value="<?= $prisoner->firstname ?>" class="form-control">
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col-2 align-content-center">
                                <label>Achternaam</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="lastname" value="<?= $prisoner->lastname ?>" class="form-control">
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col-2 align-content-center">
                                <label>Geboortedatum</label>
                            </div>
                            <div class="col-10">
                                <input type="date" name="birthdate" value="<?= $prisoner->birthdate ?>" class="form-control">
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col-2 align-content-center">
                                <label>Datum van aankomst</label>
                            </div>
                            <div class="col-10">
                                <input type="date" name="date_of_arrival" value="<?= $prisoner->date_of_arrival ?>" class="form-control">
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col-2 align-content-center">
                                <label>Datum van vertrek</label>
                            </div>
                            <div class="col-10">
                                <input type="date" name="date_of_leaving" value="<?= $prisoner->date_of_leaving ?>" class="form-control">
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col-2 align-content-center">Cel</div>
                            <div class="col-10">
                                <?php if($prisoner->cell_id !== null) { ?>
                                    <a href="/cells/<?= $prisoner->cell_id ?>"><?= $prisoner->Cell->code ?></a> 
                                    <?php if(Auth::user()->role !== 0) { ?>                                        
                                        - <a href="#" data-bs-toggle="modal" data-bs-target="#cell-finder" onclick="cellSearch()">Cel wijzigen</a>
                                    <?php } ?>
                                <?php } else if(Auth::user()->role !== 0) { ?>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#cell-finder" onclick="cellSearch()">Cel zoeken</a>
                                <?php } else { ?>
                                    <span>Geen cel aangewezen</span>
                                <?php } ?>
                            </div>
                        </div>
        
                        <?php if(Auth::user()->role !== 0) { ?>
                            <div class="d-flex mt-1">
                                <button type="submit" class="ms-auto btn btn-primary">Opslaan</button>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4 px-0 ps-1">
            <div class="card h-100">
                <div class="card-body d-flex flex-column" style="justify-content: space-around;">
                    <div class="text-center">
                        <h2><?= $prisoner->firstname ?> <?= $prisoner->lastname ?></h2>
                    </div>

                    <div class="d-flex justify-content-center align-items-center" style="height: 15em;">
                        <img src="<?= $prisoner->profile_picture ?? '/static/assets/avatar-default.svg' ?>" style="border-radius: 9999px; height: 17em;">
                    </div>

                    <?php if(Auth::user()->role !== 0) { ?>
                        <div> 
                            <?php if($prisoner->profile_picture == null) {?>
                                <form action="/prisoners/<?= $prisoner->id ?>" method="POST" class="d-flex justify-content-center ajax-request reload-on-success" enctype="multipart/form-data"> 
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT" />
                                    <input type="file" name="profile_picture" autocomplete="off">
                                    <button class="btn btn-primary" type="submit">Opslaan</button>
                                </form>
                            <?php } else { ?>
                                <form action="/prisoners/<?= $prisoner->id ?>" method="POST" class="d-flex justify-content-center ajax-request reload-on-success" enctype="multipart/form-data"> 
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT" />
                                    <input type="hidden" name="profile_picture" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card m-2">
        <div class="card-body position-relative">
            <?php if(Auth::user()->role !== 0) { ?>
                <div class="position-absolute m-2 mt-3" style="top: 0; right: 0;">
                    <a class="btn btn-success" href="{{ route('incidents.create') }}?prisonerId=<?= $prisoner->id ?>"><i class="fas fa-plus"></i></a>
                </div>
            <?php } ?>

            <h2>Delicten</h2>

            <table id="incedents" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <div class="card m-2">
        <div class="card-body position-relative">
            <div class="position-absolute m-2 mt-3" style="top: 0; right: 0;">
                <a class="btn btn-success" href="{{ route('prisonerLogs.create') }}?prisonerId=<?= $prisoner->id ?>"><i class="fas fa-plus"></i></a>
            </div>

            <h2>Logs</h2>

            <table id="prisoner_logs" class="table table-striped">
                <thead>

                </thead>
            </table>
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
        let table = null;
        function cellSearch() {
            if(table !== null) {
                table.destroy(); 
            }

            table = createDataTable('searchResults', ['id', 'code', 'status', 'action'], '/cells?occupation=false&action=prisonerAssign');
        }

        function assignCell(celId) {
            if($('#transferNote').val() === '') {
                new Notify({
                    status: 'error',
                    text: "Leeg notitie veld is niet toegestaan!",
                });
                return;
            }

            $('input[name=note]').val($('#transferNote').val());

            if(celId == null) {
                $('input[name=cell_id]').val('');
            } else {
                $('input[name=cell_id]').val(celId);
            }
            
            $('#cell-finder').modal('hide');
            $('#prisoners-from').submit();
        }

        document.addEventListener("DOMContentLoaded", function(event) {
            createDataTable('incedents', ['gevangene', 'title', 'waneer', 'actie'], '/incidents?prisonerId=<?= $prisoner->id ?>');
            createDataTable('prisoner_logs', ['gevangene', 'title', 'waneer', 'actie'], '/prisonerLogs?prisonerId=<?= $prisoner->id ?>');
            createDataTable('cellHistroy', ['actie', 'gebruiker', 'hoelaat', 'notitie'], '/cellHistories?prisonerId=<?= $prisoner->id ?>');
        });
    </script>
</x-app-layout>
