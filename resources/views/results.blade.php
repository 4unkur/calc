@extends('master')

@section('content')
    <div class="row center-block content">
        <div class="panel panel-info">
            <table class="table  table-hover table-bordered">
                <tr class="bg-info sans-serif">
                    <th>y</th>
                    <th>x</th>
                    <th>y<sup>2</sup></th>
                    <th>x<sup>2</sup></th>
                    <th>x &middot; y</th>
                    <th>ŷ<sub>i</sub></th>
                    <th>y-ŷ (ε)</th>
                    <th>(y-ŷ)<sup>2</sup> (ε<sup>2</sup>)</th>
                    <th>A<sub>i</sub></th>
                </tr>
                @for ($i = 0; $i < count($data['table']['x']); $i++)
                    <tr>
                    @foreach ($data['table'] as $array)
                        <td>{{ round($array[$i], 3) }}</td>
                    @endforeach
                    </tr>
                @endfor
                @foreach (['sum', 'avg'] as $array)
                    <tr>
                    @foreach ($data[$array] as $key => $field)
                        @if ($key == 'diff_y_y_avg')
                            <td class="td-big">{{ $field  }}</td>
                        @else
                            <td>{{ round($field, 3) }}</td>
                        @endif
                    @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row center-block">
        <div class="panel panel-info center">
            <div class="panel-heading">
                <h3 class="panel-title">Results:</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><span class="sans-serif">a = {{ $data['calculated']['a'] }}</span></li>
                    <li><span class="sans-serif">b = {{ $data['calculated']['b'] }}</span></li>
                    <li><span class="sans-serif">σ<sub>x</sub> = {{ $data['calculated']['sigma_x'] }}</span></li>
                    <li><span class="sans-serif">σ<sub>y</sub> = {{ $data['calculated']['sigma_y'] }}</span></li>
                    <li><span class="sans-serif">cov(x,y) = {{ $data['calculated']['cov_xy'] }}</span></li>
                    <li><span class="sans-serif">r<sub>xy</sub> = {{ $data['calculated']['r_xy'] }}</span></li>
                    <li><span class="sans-serif">F<sub>крит</sub> = {{ $data['calculated']['F_krit'] }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row row-centered">
        <a class="btn btn-info col-xs-10 col-md-8 col-lg-6 col-centered" href="{{ url('') }}">Calculate again</a>
    </div>
@stop