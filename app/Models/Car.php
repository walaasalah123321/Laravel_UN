<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=["title","description","published","image","Category_id"];
    function Car(){
        return $this->belongsTo(Category::class,"Category_id","id");
    }
}
