<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','sample','published','category_id','user_id'];

    public function category(){
       return $this->belongsTo(Category::class,'category_id','id');
    }

    public function scopeFilter($query,array $filters){
        if($filters['search'] ?? false){
            $query->where(fn($query)=>$query
            ->where('title','like','%'.request('search').'%')
            ->orWhere('body','like','%'.request('search').'%')
        );
        }
        if($filters['category'] ?? false){
            $query->wherehas('category',fn($query)=> $query->where('slug',$filters['category']));
        }
    }
}
