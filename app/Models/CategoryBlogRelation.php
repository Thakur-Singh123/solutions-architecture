<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlogRelation extends Model
{
    use HasFactory;

    protected $table = 'category_blog_relation';
    protected $fillable = ['category_id','blog_id'];
}
