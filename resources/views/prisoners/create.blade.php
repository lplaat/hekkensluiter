<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Gevangene toevoegen</h2>
            </div>

            <form action="{{ route('prisoners.store') }}" method="POST" id="prisoners-from" class="ajax-request">

                @csrf

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Voornaam</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="firstname" value="" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Achternaam</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="lastname" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Geboortedatum</label>
                    </div>
                    <div class="col-10">
                        <input type="date" name="birthdate" class="form-control">
                    </div>
                </div>

                <div class="d-flex mt-2">
                    <button type="submit" class="ms-auto btn btn-success">Aanmaken</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>