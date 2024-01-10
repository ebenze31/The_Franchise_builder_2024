<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancel_player extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cancel_players';

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
    protected $fillable = ['user_id', 'shirt_size', 'time_get_shirt', 'time_joined', 'return_shirt'];

    
}
