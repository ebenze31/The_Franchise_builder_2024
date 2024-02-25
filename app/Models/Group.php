<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

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
    protected $fillable = ['name_group', 'member', 'host', 'logo', 'group_line_id', 'key_invite', 'status', 'rank_last_week', 'request_join' ,'rank_record' ,'link_line_group','active','alert_700k','member_50k','pc_grand_of_gweek','pc_grand_last_gweek','nc_grand_of_gweek','nc_grand_last_gweek'];

    public function group_line(){
        return $this->hasOne('App\Models\Group_line', 'group_id');
    }
}
