<div class="accordion mb-4 shadow rounded" id="accordionExample">
    <div class="accordion-item">
        <div class="border-bottom" id="headingOne">
            <h4 class="p-2 text-dark" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Search Engine
            </h4>

        </div>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-light">
                <form id="searchForm" method="POST" action="<?= route('clients.search') ?>">
                    <?= csrf_token() ?>
                    <input type="hidden" name="count" id="count" value="15">
                    <input type="search" id="search" name="search" class="rounded-pill text-center form-control form-control-lg" placeholder="First/Last Name, Company, Address">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <input type="number" name="postcode" id="postcode" class="form-control mb-3" placeholder="Post Code">
                            <select name="country" id="country" class="form-select mb-3">
                                <option value="">Country</option>
                                <?php foreach($countries as $country){
                                    printf('<option value="%d">%s</option>',$country->id,$country->name);
                                } ?>
                            </select>
                            <select name="city" id="city" class="form-select mb-3">
                                <option value="">City name</option>
                                <?php foreach($cities as $city){
                                    printf('<option value="%d">%s</option>',$city->id,$city->name);
                                } ?>
                            </select>

                        </div>
                        <div class="col-md-4">
                            <input type="text" name="tel" id="tel" class="form-control mb-3" placeholder="Telephone">
                            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email Address">
                            <select name="type" id="type" class="form-select mb-3">
                                <option value="">Type</option>
                               <?php foreach($types as $key => $value){
                                   printf('<option value="%d">%s</option>',$key,$value);
                               } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="status" id="status" class="form-select mb-3">
                                <option value="">Status</option>
                                <?php foreach($status as $key => $value){
                                   printf('<option value="%d">%s</option>',$key,$value);
                               } ?>
                            </select>
                            <div class="row mb-3">
                                <div class="col-6"><input type="text" name="link_cp" id="link_cp" class="form-control" placeholder="Link CP"></div>
                                <div class="col-6"> <input type="text" name="link_sp" id="link_sp" class="form-control" placeholder="Link SP">
                                </div>
                            </div>
                            <input type="text" name="note" id="note" class="form-control mb-3" placeholder="Notes">
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button id="filter" class="btn btn-info" type="submit">Filter</button>
                        <button id="filter" class="btn btn-warning" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>