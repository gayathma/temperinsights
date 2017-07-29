<?php
/**
 * Author: Gayathma Perera
 * Date: 7/29/17
 * Time: 3:30 PM
 */
namespace App\Http\Controllers;

use View;
use App\Insight;

class InsightController extends Controller
{
    /**
     * Display retention curve chart for analyzed data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get the weekly retention data
        $weekly_retention_data = Insight::getInsights();

        return View::make('insights.index', [
            'weekly_retention_data' => json_encode($weekly_retention_data)
        ]);
    }
}