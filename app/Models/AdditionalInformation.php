<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalInformation extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'additional_information';
    protected $fillable = [
        'user_id',
        'education',
        'experience',
        'certifications',
        'references',
    ];

    protected $casts = [
        'education' => 'array',
        'experience' => 'array',
        'certifications' => 'array',
        'references' => 'array',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
