<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{

    use SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'category_id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $appends = ['status'];

    public function getStatusAttribute() {
        if (request()->has('diff_time')) {
            $diff = request()->input('diff_time');
            // TODO: compare diff_time with timestamps
            // return modified|deleted
        }
        return 'created';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function ingredients() {
        return $this->belongsToMany(Ingredient::class);
    }
}
