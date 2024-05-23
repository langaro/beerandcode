<?php

namespace App\Services;
use App\Http\Controllers\DeveloperController;
use GrahamCampbell\GitHub\Facades\GitHub;

class GithubService
{
    public function fetchDevelopers(): void
    {
        /**
         * This function will fetch the developers from GitHub API.
         * The developers will be sorted by followers.
         * Then, the developers will be filtered by location:Brazil and language:php.
         * Then, we'll get the information of the developers and store in the database.
         *
         * TODO: For now, we are getting only the fist 30, we might need to implement some kind of pagination here.
         */

        $developers = GitHub::api('search')->users('location:Brazil language:php', 'followers', 'desc');

        $controller = new DeveloperController();
        $controller->truncate();

        foreach ($developers['items'] as $developer) {
            $fetchedDeveloper = GitHub::api('user')->show($developer['login']);
            $controller->store($fetchedDeveloper);
        }
    }
}
