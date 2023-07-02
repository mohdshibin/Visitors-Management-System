<?php

namespace App\Repositories;

use App\Interfaces\VisitorInterface;
use App\Models\Visitor;

class VisitorRepository implements VisitorInterface
{
    public function all()
    {
        return Visitor::all();
    }

    public function getById($id)
    {
        return Visitor::find($id);
    }

    public function store(array $data)
    {
        return Visitor::create($data);
    }
}
