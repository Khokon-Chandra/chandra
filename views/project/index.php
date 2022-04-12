<x-layouts.app>
    <div class="card">
        <div class="card-header bg-light border-0 d-flex justify-content-between align-items-center">
            <p class="mb-0">shows
            <select class="btn-sm border-1 rounded-pill" name="limit" id="limit">
                <?php
                for($i=15; $i<=200; $i=$i+15):
                    printf('<option value="%d">%d</option>',$i,$i);
                endfor;
                ?>
            </select>
            entries</p>

            <p class="mb-0 align-items-center">
                <a href="<?= route('projects.create') ?>" class="btn btn-sm btn-outline-primary">New Project</a>
            </p>
        </div>
        <div id="ajaxContent">
            @include("project._list")
        </div>
    </div>

</x-layouts.app>