<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'detail', 'photo_content', 'photo_cover', 'link', 'user_id','link_content','title_link_content'];

    
}
