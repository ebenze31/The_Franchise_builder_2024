<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group_line extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group_lines';

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
    protected $fillable = ['groupId', 'groupName', 'pictureUrl','group_id'];

    public function group(){
        return $this->belongsTo('App\Models\Group', 'group_id' , 'id'); 
    }
    
}
