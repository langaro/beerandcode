<?php

namespace App\Http\Controllers;

use App\Services\DeveloperService;

class DeveloperController extends Controller
{

    public function __construct(
        public DeveloperService $service = new DeveloperService()
    ) {}

    public function index()
    {
        //
    }

    public function store(array $data)
    {
        $this->service->store($data);
    }

    public function show()
    {
        //
    }

    public function truncate()
    {
        $this->service->truncate();
    }
}
