<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlNode extends Model
{
    protected $guarded=[];

    public function dailyReport()
    {
        return $this->hasMany(DailyReport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
