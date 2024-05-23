<?php

namespace App\Services;

use App\Models\Developer;

class DeveloperService
{
    public function getAll()
    {
        return Developer::paginate();
    }

    public function store(array $data): Developer
    {
        return Developer::create($data);
    }

    public function truncate(): void
    {
        Developer::truncate();
    }
}
