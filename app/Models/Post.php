<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
  use HasFactory;
  
  protected $table = 'posts';
  use SoftDeletes;
  
  protected $fillable = [
    'title', 'content', 'category_id', 'tags_id'
  ];
  
  public function category() {
    return $this->belongsTo(Category::class);
  }
  
  public function tags() {
    return $this->belongsToMany(Tags::class, 'post_tag', 'post_id', 'tag_id');
  }
}
