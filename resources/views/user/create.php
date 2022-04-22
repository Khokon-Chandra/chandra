<x-layouts.app>
    <div class="mt-4">
        <div class="card">
            <h4 class="card-header">Create new post:</h4>
            <div class="card-body">
                <form method="POST" action="<?= route('users.store') ?>">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="post title">
                    <input type="email" name="email" class="form-control">
                    <input type="password" name="password" >
                    <div class="mt-3">
                        <input type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
</x-layouts.app>