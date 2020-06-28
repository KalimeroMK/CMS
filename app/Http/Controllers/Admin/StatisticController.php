<?php

namespace App\Http\Controllers\Admin;

use Analytics;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\View\View;
use Session;
use Spatie\Analytics\Period;

class StatisticController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {
        $session = Session::all();
        $now = Date::now();

        $totalVisitors = Analytics::fetchTotalVisitorsAndPageViews(Period::months(1));
        $mostVisitedPages = Analytics::fetchMostVisitedPages(Period::months(1), 10);
        $referrs = Analytics::fetchTopReferrers(Period::years(1));
        $userTypes = Analytics::fetchUserTypes(Period::years(1));
        $devices = $this->getDevices();
        $browsers = Analytics::fetchTopBrowsers(Period::years(1));
        $visitsPerCountry = $this->getVisitsPerCountry();


        //Retrieve Most Visited Pages

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        $analyticsData = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:yearMonth'
            ]
        );

        return view(
            'admin.statistics.index',
            compact(
                'totalVisitors',
                'analyticsData',
                'mostVisitedPages',
                'referrs',
                'userTypes',
                'devices',
                'browsers',
                'visitsPerCountry'
            )
        );
    }

    /**
     * @return mixed
     */
    public function getDevices()
    {
        $devices = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:deviceCategory'
            ]
        );

        return $devices->rows;
    }

    /**
     * @return mixed
     */
    public function getVisitsPerCountry()
    {
        $visitsPerCountry = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                // 'metrics' => 'ga:sessions',
                'dimensions' => 'ga:country'
            ]
        );
        return $visitsPerCountry->rows;
    }
}
