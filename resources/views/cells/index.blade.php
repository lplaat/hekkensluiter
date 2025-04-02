<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Cells</h2>
            </div>

            <table id="cells" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            createDataTable('cells', ['id', 'code', 'status', 'action'], '/cells');
        });
    </script>
</x-app-layout>
