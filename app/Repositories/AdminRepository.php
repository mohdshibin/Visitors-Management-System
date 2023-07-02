<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\AdminCredential;

class AdminRepository implements AdminInterface
{
    public function store(array $data)
    {
        return AdminCredential::create($data);
    }
}
