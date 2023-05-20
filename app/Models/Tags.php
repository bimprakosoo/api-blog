<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tags';
    use SoftDeletes;
    
    protected $fillable = ['name'];
  
  public function posts() {
    return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
  }
}
