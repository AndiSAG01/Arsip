<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Document;
use App\Models\Type;
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
        $incomingMail = Document::where('category_id', 1)->count();
        $OutgoingMail = Document::where('category_id', 2)->count();
        $user = User::get()->count();

        $types = Type::select('id', 'name')->get();
        $chartData = [];
        foreach ($types as $type) {
            $total = Document::where('type_id', $type->id)->count();
            $chartData[] = [
                'label' => $type->name,
                'data' => $total,
            ];
        }

        $chart = (new LarapexChart)
           ->setType('pie')
           ->setLabels(array_column($chartData, 'label'))
           ->setDataset(array_column($chartData, 'data'));

        return view('home', [
            'chart' => $chart,
            'incomingMail' => $incomingMail,
            'OutgoingMail' => $OutgoingMail,
        ]);
    }
}
