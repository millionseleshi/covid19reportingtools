<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $guarded=[];

    public function controlNode()
    {
        return $this->belongsTo(ControlNode::class);
    }


}

