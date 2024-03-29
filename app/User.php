<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'account' , 'photo', 'status', 'role', 'rank_last_week', 'group_id', 'group_status', 'phone', 'rank_record', 'get_shirt', 'pay_slip','time_cf_pay_slip','staff_pay_slip_id' ,'staff_get_shirt_id', 'qr_profile' ,'time_upload_pay_slip','provider_id' ,'time_request_join','activities','pdpa','scan_qr_for','shirt_size','time_get_shirt','news_read','read_not_read','alert_news','alert_50k','remark'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Activities_log(){
        return $this->hasMany('App\Models\Activities_log', 'user_id');
    }
}
