<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Insight extends Model
{
    protected $table = 'insights';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'onboarding_perentage', 'count_applications', 'count_accepted_applications'
    ];

    /**
     * Get unique week numbers in the data set.
     *
     * @return array
     */
    public static function getDistinctWeekNumbers()
    {
        return DB::table('insights')
                ->distinct('week_no')
                ->select(DB::raw('WEEK(created_at) as week_no'))
                ->get();
    }

    /**
     * Give the number of users for a given week.
     *
     * @param $week_no
     * @return integer
     */
    public static function getUserCountForWeek($week_no)
    {
        return DB::table('insights')
                    ->whereRaw('WEEK(created_at)='. $week_no)
                    ->count();
    }

    /**
     * Give the number of users for a particular step in onboarding for a given week.
     *
     * @param $step_no
     * @param $week_no
     * @return integer
     */
    public static function getStepUsersForWeek($step_no, $week_no)
    {
        if($step_no == 1){
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '>=', 0)
                ->count();
        }elseif($step_no == 2){
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '>=', 20)
                ->count();
        }elseif($step_no == 3){
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '>=', 40)
                ->count();
        }elseif($step_no == 4){
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '>=', 50)
                ->count();
        }elseif($step_no == 5){
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '>=', 70)
                ->count();
        }elseif($step_no == 6){
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '>=', 90)
                ->count();
        }elseif($step_no == 7){
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '>=', 99)
                ->count();
        }else{
            return DB::table('insights')
                ->whereRaw('WEEK(created_at)='. $week_no)
                ->where('onboarding_perentage', '=', 100)
                ->count();
        }
    }

    /**
     * Generate the retention curve data.
     *
     * @return array
     */
    public static function getInsights()
    {
        $insights = [];
        $weeks = self::getDistinctWeekNumbers();
        foreach ($weeks as $week){
            $week_no = $week->week_no;
            $user_count = self::getUserCountForWeek($week_no);
            //get user count for each step
            $step_data = [];
            for ($i = 1; $i <= 8; $i++){
                $step_user_count = self::getStepUsersForWeek($i , $week_no);
                //calculate the percentage of users for a week.
                $step_data[] = round(($step_user_count/$user_count) * 100, 2);
            }

            $insights[] = [
                'name' => "Week $week_no",
                'data' => $step_data
            ];
        }
        return $insights;
    }
}