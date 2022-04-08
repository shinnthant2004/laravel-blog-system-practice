<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $with=['category','author'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
       return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function subscribers(){
        return $this->belongsToMany(User::class);
    }
    public function Unsubscribe(){
      $this->subscribers()->detach(auth()->id());
    }
    public function Subscribe(){
        $this->subscribers()->attach(auth()->id());
    }
    public function ScopeFilter($query,$filter){
      $query->when($filter['search'] ?? false,function($query,$search){
        $query->where(function($query) use ($search){
           $query->where('title','LIKE','%'.$search.'%')
              ->orWhere('body','LIKE','%'.$search.'%');
        });
      });

      $query->when($filter['category'] ?? false,function($query,$slug){
        $query->whereHas('category',function($query) use ($slug){
          $query->where('slug',$slug);
        });
      });

      $query->when($filter['user']??false,function($query,$user){
        $query->whereHas('author',function($query) use ($user){
            $query->where('name',$user);
        });
      });
    }
}
