<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherInformation extends Model
{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }
    //
    protected $table = 'other_information';

    protected $fillable = [
        'user_id',
        'skills',
        'interests',
        'languages',
        'social_links',
    ];

    protected $casts = [
        'skills' => 'array',
        'interests' => 'array',
        'languages' => 'array',
        'social_links' => 'array',
        'custom_fields' => 'array',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
