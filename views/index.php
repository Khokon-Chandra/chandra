<x-layouts.app>
    <div class="card">
        <div class="card-header bg-primary text-white">Home Page</div>
        <div class="card-body">
            <h3>Author: <i><?= $name ?></i></h3>

            <form id="form" action="<?= route('login.store') ?>" method="POST">
                <?= csrf_token() ?>
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
    <script>
        // $(document).ready(function() {
        //     $('#form').submit(function() {
        //         event.preventDefault();
        //         axios.post(this.action, $('#form').serialize(),{ headers: {'X-Requested-With': 'XMLHttpRequest'}}).then((response)=>{
        //             console.log(response.data);
        //         }).catch((error)=>{
        //             console.log(error.response.data);
        //         })
        //     })
        // })
    </script>
</x-layouts.app>