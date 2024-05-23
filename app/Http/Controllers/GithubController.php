<?php

namespace App\Http\Controllers;

use App\Services\GithubService;

class GithubController extends Controller
{

    public function __construct(
        public GithubService $service = new GithubService()
    ) {}

    public function fetchDevelopers()
    {
        $this->service->fetchDevelopers();
    }

}
