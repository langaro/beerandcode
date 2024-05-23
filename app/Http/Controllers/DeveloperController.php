<?php

namespace App\Http\Controllers;

use App\Services\DeveloperService;
use Inertia\Inertia;

class DeveloperController extends Controller
{

    public function __construct(
        public DeveloperService $service = new DeveloperService()
    ) {}

    public function index()
    {

        return Inertia::render('Developers/DeveloperIndex', [
            'developers' => $this->service->getAll()
        ]);
    }

    public function store(array $data)
    {
        $this->service->store($data);
    }

    public function truncate()
    {
        $this->service->truncate();
    }
}
