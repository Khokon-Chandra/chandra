
<x-layouts.app>
    <div class="card">
        <div class="card-header bg-primary text-white">Home Page</div>
        <div class="card-body">
            <h3>Author: <i><?= $name ?></i></h3>
    
            <form action="<?= route('store') ?>" method="POST">
                <?= csrf_token() ?>
               <h3>{{ $name }}</h3>
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
                <div class="text-danger"><?= $error['name'] ?? '' ?></div>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
                <small class="text-danger"><?= $error['email'] ?? '' ?></small>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-primary" value="Save Record">
                
            </div>
          
        </form>
        </div>
    </div>
</x-layouts.app>