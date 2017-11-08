<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbsTeamMember extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbs_team_member';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
