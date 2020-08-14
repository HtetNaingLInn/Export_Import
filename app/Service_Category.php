<?php

namespace App;

use App\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service_Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
    ];

    public function service()
    {
        return $this->hasMany('App\Service', 'service_category_id', 'id');
    }
}
