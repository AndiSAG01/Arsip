<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countCategory = Category::count();
        $document = Document::count();
        $user = User::where('isAdmin', 0)->count();
        $supUser = User::where('isAdmin', 1)->count();

        $categories = Category::select('id', 'name')->get();
        $chartData = [];
        foreach ($categories as $category) {
            $total = Document::where('category_id', $category->id)->count();
            $chartData[] = [
                'label' => $category->name,
                'data' => $total,
            ];
        }

        $chart = (new LarapexChart)->setTitle('Documents by Category')
           ->setType('pie')->setWidth(500)
           ->setLabels(array_column($chartData, 'label'))
           ->setDataset(array_column($chartData, 'data'));

        return view('home', [
            'chart' => $chart,
            'category' => $countCategory,
            'document' => $document,
            'user' => $user,
            'supUser' => $supUser,
        ]);
    }
}
