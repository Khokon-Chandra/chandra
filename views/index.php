<x-layouts.app>
    <?= session_flash('success') ? "<div class='alert alert-success'>". session_flash('success')."</div>" :'' ?>
    
    <div class="mt-4">
    <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
       <h1 class="display-2">Welcome to home page</h1>
    </div>
</x-layouts.app>