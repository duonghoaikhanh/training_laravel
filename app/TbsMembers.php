<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbsMembers extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbs_members';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
