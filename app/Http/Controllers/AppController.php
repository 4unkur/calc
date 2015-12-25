<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Validator;

class AppController extends Controller
{

    protected $a;
    protected $b;
    protected $x_avg;
    protected $y_avg;

    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'x.*' => 'required|numeric',
            'y.*' => 'required|numeric',
        ]);

        $square = function($number)
        {
            return pow($number, 2);
        };
        $multipy = function($number1, $number2)
        {
            return $number1 * $number2;
        };
        $avg = function($array)
        {
            return array_sum($array)/count($array);
        };

        $data['y'] = $request->input('y');
        $data['x'] = $request->input('x');
        $data['y2'] = array_map($square, $data['y']);
        $data['x2'] = array_map($square, $data['x']);
        $data['xy'] = array_map($multipy, $data['x'], $data['y']);
        $n = count($data['x']);

        $this->x_avg = $avg($data['x']);
        $this->y_avg = $avg($data['y']);
        $xy_avg = $avg($data['xy']);
        $x2_avg = $avg($data['x2']);

        //intended to catch Division by zero error
        try {

            $this->b = ($xy_avg - $this->x_avg * $this->y_avg) / ($x2_avg - $square($this->x_avg));
            $this->a = $this->y_avg - $this->b * $this->x_avg;
            $data['y_avg'] = array_map([$this, 'yAvg'], $data['x']);

            $data['diff_y_y_avg'] = array_map(function ($y, $y_avg) {
                return $y - $y_avg;
            }, $data['y'], $data['y_avg']);

            $data['diff_y_y_avg2'] = array_map($square, $data['diff_y_y_avg']);
            $data['A'] = array_map(function ($y, $y_avg) {
                return pow($y - $y_avg, 2) / $y;
            }, $data['y'], $data['y_avg']);

            $cov_xy = $xy_avg - $this->x_avg * $this->y_avg;
            $sigma_x = array_sum(array_map([$this, 'sigmaX'], $data['x']));
            $sigma_y = array_sum(array_map([$this, 'sigmaY'], $data['y']));
            $r_xy = $cov_xy / ($sigma_x * $sigma_y);
            $F_krit = ($square($r_xy) * ($n - 2)) / (1 - $square($r_xy));

            $avg_data = array_map($avg, $data);

        } catch (\ErrorException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
        $sum_data = array_map(function($array){return array_sum($array);}, $data);

        $calculated_data = [
            'a' => $this->a,
            'b' => $this->b,
            'cov_xy' => $cov_xy,
            'sigma_x' => $sigma_x,
            'sigma_y' => $sigma_y,
            'r_xy' => $r_xy,
            'n' => $n,
            'F_krit' => $F_krit,
        ];

        $all_data['table'] = $data;
        $all_data['calculated'] = $calculated_data;
        $all_data['avg'] = $avg_data;
        $all_data['sum'] = $sum_data;
        return view('results')->with('data', $all_data);
    }

    public function yAvg($x)
    {
        return $this->a + $this->b * $x;
    }

    public function sigmaX($x)
    {
        return pow($x - $this->x_avg, 2);
    }
    public function sigmaY($y)
    {
        return pow($y - $this->y_avg, 2);
    }
}
