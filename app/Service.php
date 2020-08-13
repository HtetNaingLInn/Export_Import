<?php

namespace App;

use App\Service_Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'description', 'image', 'service_category_id',
    ];

    public function service_category()
    {
        return $this->belongsTo(Service_Category::class);
    }
}
