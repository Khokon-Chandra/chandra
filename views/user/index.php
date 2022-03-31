<x-layouts.app>


    <div class="card">
        <h5 class="card-header d-flex justify-content-between">
            <select name="" id="">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </select>
        </h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                foreach ($users->data as $user) {
                    $action = sprintf(
                        '<a href="#" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>'
                    );
                    printf(
                        '<tr>
                            <td>%d</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td class="text-center">%s</td>
                        </tr>',
                        $user->id,
                        $user->name,
                        $user->email,
                        $action
                    );
                }
                ?>
            </tbody>
        </table>
        <div>
            <?= $users->links() ?>
        </div>
    </div>

</x-layouts.app>