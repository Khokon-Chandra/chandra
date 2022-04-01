<?php

namespace app\Models;

use core\Model;
use core\ModelTrait;

class Client extends Model
{

    protected $table = 'clients';


    public function filter($filters)
    {
        $this
            ->when(
                $filters->search ?? false,
                fn ($query, $search) =>
                $query->where("firstname", "LIKE", "%$search%")
                    ->orWhere("lastname", "LIKE", "%$search%")
                    ->orWhere("address", "LIKE", "%$search%")
            )
            ->when($filters->country ?? false, fn ($query, $country) =>
            $query->where('country', $country))
            ->when($filters->city ?? false, fn ($query, $city) =>
            $query->where('country', $city));
            return $this;
    }
}
