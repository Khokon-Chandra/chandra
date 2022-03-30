<x-layouts.app>
    <?= session_flash('success') ? "<div class='alert alert-success'>". session_flash('success')."</div>" :'' ?>
    <div class="mt-4">
    
    

    <h1>Posts :</h1>
    <div class="mb-3">
        <a class="btn btn-primary" href="<?= route('posts.create') ?>">Create New</a>
    </div>

    <?php
       foreach($posts as $post){
           printf( '<div class="card border mb-3">
                <h4 class="card-header">%s</h4>
                <div class="card-body">%s</div>
            </div>',$post->title, $post->content);
       }
    ?>


</x-layouts.app>