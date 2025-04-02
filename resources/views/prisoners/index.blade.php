<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Prisoners</h2>
            </div>

            <table id="prisoners" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            createDataTable('prisoners', ['id', 'firstname', 'lastname', 'birthdate', 'cel', 'date-of-arrival', 'action'], '/prisoners');
        });
    </script>
</x-app-layout>
