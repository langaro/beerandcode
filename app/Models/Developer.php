<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        "html_url",
        "name",
        "company",
        "location",
        "email",
        "public_repos",
        "followers"
    ];
}
