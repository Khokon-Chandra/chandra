<x-layouts.app>
    <div class="mt-4">
        <div class="card">
            <h4 class="card-header">Create new post:</h4>
            <div class="card-body">
                <form method="POST" action="<?= route('users.update') ?>">
                    @csrf
                    <input type="text" name="name" class="form-control" value="<?= $user->name ?>">
                    <textarea name="content" class="form-control" rows="5"><?= $user->name ?></textarea>
                    <div class="mt-3">
                        <input type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
</x-layouts.app>