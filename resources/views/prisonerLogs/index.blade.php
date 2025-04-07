<?php 
use Illuminate\Support\Facades\Auth;
?>
<x-app-layout>
    <div class="card m-2">
        <div class="card-body">
            <div class="d-flex">
                <h2>Logs</h2>
            </div>

            <?php if(Auth::user()->role >= 0) {?>
                <div class="position-absolute m-2 mt-3" style="top: 0; right: 0;">
                    <a class="btn btn-success" href="{{ route('prisonerLogs.create') }}"><i class="fas fa-plus"></i></a>
                </div>
            <?php } ?>

            <table id="prisoner_logs" class="table table-striped">
                <thead>

                </thead>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            createDataTable('prisoner_logs', ['gevangene', 'title', 'waneer', 'actie'], '/prisonerLogs');
        });
    </script>
</x-app-layout>