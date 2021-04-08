<?php

namespace App\Http\Controllers\Admin;

use Analytics;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Spatie\Analytics\Period;

class StatisticController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {
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
     * @return array|null
     */
    public function getDevices(): ?array
    {
        return Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:deviceCategory'
            ]
        );
    }

    /**
     * @return array|null
     */
    public function getVisitsPerCountry(): ?array
    {
        return Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                // 'metrics' => 'ga:sessions',
                'dimensions' => 'ga:country'
            ]
        );
    }
}
