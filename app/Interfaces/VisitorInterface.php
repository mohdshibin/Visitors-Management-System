<?php

namespace App\Interfaces;

interface VisitorInterface
{
    public function all();

    public function getById($id);

    public function store(array $data);

}