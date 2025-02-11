<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name','date','status']; 
    
    //Function for get category details
    public function blog_details() {
        return $this->belongsToMany(Blog::class, 'category_blog_relation');
    }
}
