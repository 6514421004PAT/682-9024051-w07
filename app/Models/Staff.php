<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff'; 

    
    protected $fillable = [
        'fname',
        'lname',
        'tit_id',
        'org_id',
    ];

    
    public function title()
    {
        
        return $this->belongsTo(Title::class, 'tit_id');
    }

    public function organization()
    {
        
        return $this->belongsTo(Organization::class, 'org_id');
    }
}