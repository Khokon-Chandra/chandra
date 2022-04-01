<x-layouts.app>

    <?php include(BASE_URL . '/views/client/_filter.php') ?>

    <div class="card">
        <h5 class="card-header bg-light">
            <select class="border-1 p-1 rounded-pill" name="limit" id="limit">
                <?php 
                for($i=15; $i<=200; $i=$i+15):
                    printf('<option value="%d">%d</option>',$i,$i);
                endfor;
                ?>
            </select>
        </h5>
        <div id="ajaxContent">
            <?php include BASE_URL."/views/client/_list.php" ?>
        </div>
        <?= $clients->links() ?>
    </div>

</x-layouts.app>