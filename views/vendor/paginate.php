<nav class="px-3 d-flex justify-content-between">
    <div>
        <p>
            Showing
            <span class="font-medium"><?= $paginator->firstItem() ?></span>
            to
            <span class="font-medium"><?= $paginator->lastItem() ?></span>
            of
            <span class="font-medium"><?= $paginator->total() ?></span>
            results
        </p>
    </div>
    <ul class="pagination">
        <li class="page-item <?= $paginator->onFirstPage() ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $paginator->previousPageUrl() ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        foreach ($elements as $page => $url) {
            if(is_string($page)):
                printf('<li class="page-item"><a class="page-link" href="%s">%s</a></li>', $url, $page);
            else:
                printf('<li class="page-item %s"><a class="page-link" href="%s">%d</a></li>', $page == $paginator->currentPage() ?'active':'' ,
                $url, $page);
            endif;
        }
        ?>

        <li class="page-item <?= $paginator->hasMorePage() ? '' : 'disabled' ?>">
            <a class="page-link" href="<?= $paginator->nextPageUrl() ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>