<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pc_point extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pc_points';

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
    protected $fillable = ['week', 'pc_point', 'new_code', 'user_id', 'group_id' ,'rank_of_week','rank_last_week','csta','pers','ytd_pc','myd_pc'];

    
}
