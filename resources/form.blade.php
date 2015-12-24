@extends('master')

@section('content')

    @if ($errors)
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <div class="row">
        <div class="col-lg-3">
            <form class="form" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel panel-default">
                    <table class="table">
                        <tr>
                            <th>x</th>
                            <th>y</th>
                        </tr>
                        @foreach (range(1,2) as $item)
                            <tr>
                                <td class="td"><input type="text" name="x[]" class="form-control input"></td>
                                <td class="td"><input type="text" name="y[]" class="form-control input"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <button type="submit" class="btn btn-info">Calculate it please</button>
            </form>
        </div>
    </div>

@stop