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
    protected $fillable = ['week', 'pc_point', 'new_code', 'user_id', 'group_id' ,'rank_of_week','rank_last_week','csta','pers','ytd_pc','mtd_pc','mission1','mission3','grandmission','active_dream','team_rank_of_week','team_rank_last_week','pc_grand_of_gweek','pc_grand_last_gweek','nc_grand_of_gweek','nc_grand_last_gweek','pc_grand_of_week_individual','pc_grand_last_week_individual','nc_grand_of_week_individual','nc_grand_last_week_individual','sum_newcode_team','aa_grand_of_week','aa_grand_last_week','aa_grand_of_week_individual','aa_grand_last_week_individual','csta_mission3','active_mission3','m3_rank_of_week','m3_rank_last_week'];
    
}
