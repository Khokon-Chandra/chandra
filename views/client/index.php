<x-layouts.app>

    <div class="card mt-4 mb-4">
        <h5 class="card-header">Client list filter</h5>
        <div class="card-body">
            <?php include(BASE_URL.'/views/client/_filter.php') ?>
        </div>
    </div>

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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Country</th>
                    <th>Post code / City</th>
                    <th>Address</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php

                    foreach($clients as $client){
                        $action = sprintf(
                            '<a href="#" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>'
                        );
                        printf('<tr>
                            <td>%d</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                        </tr>',
                        1,
                        $client->firstname,
                        $client->lastname,
                        $client->company,
                        $client->country,
                        $client->city,
                        $client->address,
                        $client->typ,
                        $client->status,
                        $action
                    );
                    }
                ?>
            </tbody>
        </table>
    </div>

</x-layouts.app>