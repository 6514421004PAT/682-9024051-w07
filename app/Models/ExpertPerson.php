<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertPerson extends Model
{
    use HasFactory;

    protected $table = 'expert_person';

    protected $fillable = [
        'fname', 
        'lname', 
        'description', 
        'community_id'
    ];
}