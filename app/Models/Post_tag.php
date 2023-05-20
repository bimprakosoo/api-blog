<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Post_tag extends Pivot
{
  protected $table = 'post_tag';
}
