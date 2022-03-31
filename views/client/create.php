<x-layouts.app>
    <div class="mt-4">
        <div class="card">
            <h4 class="card-header">Create new post:</h4>
            <div class="card-body">
                <form method="POST" action="<?= route('posts.store') ?>">
                    <?= csrf_token() ?>
                    <input type="text" name="title" class="form-control" placeholder="post title">
                    <textarea name="content" class="form-control" rows="5"></textarea>
                    <div class="mt-3">
                        <input type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
</x-layouts.app>