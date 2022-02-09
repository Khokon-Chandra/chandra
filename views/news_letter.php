<x-layouts.app>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card">
            <h1 class="card-header">News Letter</h1>
            <div class="card-body">
                <form id="news-letters" method="POST" action="<?= route('news_letter.store') ?>">
                    <?= csrf_token() ?>
                    <input name="email" class="form-control mb-3" type="email" placeholder="Insert Your Email Address">
                    <input type="submit" class="btn btn-primary form-control" value="Submit">
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>