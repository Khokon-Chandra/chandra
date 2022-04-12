<div class="table-responsive">
    <table class="table align-middle table-sm">
        <thead>
            <tr>
                <th><input id="checkAll" type="checkbox" class="form-check-input"></th>
                <th>#</th>
                <th>Name</th>
                <th>ID</th>
                <th>Status</th>
                <th class="text-center" width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($projects as $project) {
                $action = sprintf(
                    '<a href="%s" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="%s" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="%s" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>',
                    route('projects.edit',$project->id),
                    route('projects.show',$project->id),
                    route('projects.destroy',$project->id),
                );
                printf(
                    '<tr>
                    <td><input type="checkbox" class="checkbox form-check-input"></td>
                    <td>%d</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                                 
                    <td>%s</td>
                </tr>',
                    1,
                    $project->name,
                    $project->code,
                    $project->status,
                    $action
                );
            }

            if (count($projects) == 0) {
                printf('<tr class="text-center"><th colspan="6">No records found</th></tr>');
            }
            ?>
        </tbody>
    </table>
</div>
