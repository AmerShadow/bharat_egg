<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpVehical extends Model
{
    protected $table= "exp_vehicles";

    public static function sumAmount($date_from = null, $date_to = null)
    {
        if (empty($date_from) && empty($date_to)) {
            $fuel = ExpVehical::sum('fuel');
            $maintenance = ExpVehical::sum('maint');
            $paperWork = ExpVehical::sum('paper_work');
        }else{
            $fuel = ExpVehical::WhereBetween('date', $date_from, $date_to)->sum('fuel');
            $maintenance = ExpVehical::WhereBetween('date', $date_from, $date_to)->sum('maint');
            $paperWork = ExpVehical::WhereBetween('date', $date_from, $date_to)->sum('paper_work');
        }
        return $fuel + $maintenance + $paperWork;
    }
}
