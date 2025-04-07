<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Gebruiker aanmaken</h2>
            </div>

            <form action="{{ route('users.store' )}}" method="POST" class="ajax-request">
                @csrf

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Naam</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="name" value="" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Email</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="email" value="" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Wachtwoord</label>
                    </div>
                    <div class="col-10">
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Herhaal Wachtwoord</label>
                    </div>
                    <div class="col-10">
                        <input type="password" name="password_confirmation" value="" class="form-control">
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-2 align-content-center">
                        <label>Rol</label>
                    </div>
                    <div class="col-10">
                        <select class="form-select" name="role">
                            <option value="0">Bewaker</option>
                            <option value="1">Coördinator Bewaker</option>
                            <option value="2">Directeur</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex mt-1">
                    <button type="submit" class="ms-auto btn btn-primary">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
