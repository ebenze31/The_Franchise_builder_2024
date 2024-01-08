<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_staff extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_staffs';

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
    protected $fillable = ['question', 'reading', 'user_id', 'staff_id','approve','finish'];

    
}
