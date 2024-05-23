<?php

namespace App\Services;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperService
{
    public function getAll(Request $request)
    {
        return Developer::when($request->term, function($query, $term) {
            $query->where('name', 'LIKE', '%'.$term.'%');
        })->paginate();
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
