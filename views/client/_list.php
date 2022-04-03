<div class="table-responsive">
    <table class="table align-middle table-sm table-light table-striped">
        <thead>
            <tr>
                <th><input id="checkAll" type="checkbox" class="form-check-input"></th>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Country</th>
                <th>Post code / City</th>
                <th>Address</th>
                <th>Type</th>
                <th>Status</th>
                <th>Sp|Cp</th>
                <th class="text-center" width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clients->data as $client) {
                $action = sprintf(
                    '<a href="#" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>'
                );
                printf(
                    '<tr>
                    <td><input type="checkbox" class="checkbox form-check-input"></td>
                    <td>%d</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>
                        <a class="btn btn-sm btn-outline-primary" href="#">%d</a>
                        <a class="btn btn-sm btn-outline-success" href="#">%d</a>
                    </td>
                    <td>%s</td>
                </tr>',
                    1,
                    $client->firstname,
                    $client->lastname,
                    $client->company,
                    $client->country->name,
                    $client->city->name,
                    $client->address,
                    $client->type,
                    $client->status,
                    count($client->linkSp),
                    count($client->linkCp),
                    $action
                );
            }

            if (count($clients->data) == 0) {
                printf('<tr class="text-center"><th colspan="11">No records found</th></tr>');
            }
            ?>
        </tbody>
    </table>
</div>
<?= $clients->links() ?>