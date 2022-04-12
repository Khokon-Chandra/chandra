<x-layouts.app>

    <div class="card shadow">
        <div class="card-header bg-light border-0 d-flex justify-content-between">
            <h5>Create new project</h5>
            <a href="<?= route('projects.index') ?>" class="btn btn-sm btn-outline-primary">Project List</a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= route('projects.store') ?>">
                <?= csrf_token() ?>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="name">Project Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                        <div class="text-danger"><?= $error['name'] ?? '' ?></div>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name">Project ID</label>
                        <input type="number" class="form-control" name="code" placeholder="Id">
                        <div class="text-danger"><?= $error['code'] ?? '' ?></div>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-sm btn-primary" type="submit">Save Project</button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>