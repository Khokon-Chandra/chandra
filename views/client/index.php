<x-layouts.app>

    @include("client._filter")

    <div class="card">
        <p class="card-header bg-light">
            shows
            <select class="border-1 p-1 rounded-pill" name="limit" id="limit">
                <?php 
                for($i=15; $i<=200; $i=$i+15):
                    printf('<option value="%d">%d</option>',$i,$i);
                endfor;
                ?>
            </select>
            entries
        </p>
        <div id="ajaxContent">
            <?php include BASE_URL."/views/client/_list.php" ?>
        </div>
    </div>

</x-layouts.app>