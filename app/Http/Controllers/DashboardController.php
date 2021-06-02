<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $visitors = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $chart_data = array();
        foreach ($visitors as $data)
        {
            array_push($chart_data, array($data->date->format('d.m.Y'), $data->total));
        }
        
        $count_posts = Post::count();
        $count_categories = Category::count();
        $count_visitors = $visitors->count();

        return view('admin.dashboard', compact(['visitors', 'chart_data','count_posts','count_categories','count_visitors']));
    }
}
