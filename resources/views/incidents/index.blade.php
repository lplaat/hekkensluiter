<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Delicten</h2>
            </div>

            <div class="position-absolute m-2 mt-3" style="top: 0; right: 0;">
                <a class="btn btn-success" href="{{ route('prisoners.create') }}"><i class="fas fa-plus"></i></a>
            </div>

            <table id="incedents" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            createDataTable('incedents', ['gevangene', 'title', 'waneer', 'actie'], '/incidents');
        });
    </script>
</x-app-layout>
