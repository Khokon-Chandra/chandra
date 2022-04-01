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
                    ->orWhere("company", "LIKE", "%$search%")
                    ->orWhere("address", "LIKE", "%$search%")
            )
            ->when($filters->country ?? false, fn ($query, $country) =>
                $query->where('country', $country))

                ->when($filters->city ?? false, fn ($query, $city) =>
                $query->where('city', $city))

                ->when($filters->tel ?? false, fn ($query, $tel) =>
                $query->where('tel', $tel))

               ->when($filters->email ?? false, fn ($query, $email) =>
                $query->where('email', $email))

                ->when($filters->type ?? false, fn ($query, $type) =>
                $query->where('type', $type))

                ->when($filters->status ?? false, fn ($query, $status) =>
                $query->where('status', $status));

            return $this;
    }
}
