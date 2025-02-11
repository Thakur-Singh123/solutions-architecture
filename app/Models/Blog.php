<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = ['slug','title','desc','date','image','status'];

    //Function for get category details
    public function category_details() {
        return $this->belongsToMany(Category::class, 'category_blog_relation');
    }
}
