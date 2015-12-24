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
                {{ csrf_field() }}
                <div class="panel panel-info">
                    <table class="table">
                        <tr class="bg-info">
                            <th>x</th>
                            <th>y</th>
                        </tr>
                        @for ($i = 0; $i < 2; $i++)

                            <tr>
                                @foreach (['x', 'y'] as $field)
                                <td class="td">
                                    <input type="text" name="{{ $field }}[]" class="form-control input @if ($errors->has($field . '.' . $i)) alert-danger @endif" value="{{ old($field . '.' . $i) }}" >
                                </td>
                                @endforeach
                            </tr>
                        @endfor
                    </table>
                </div>
                <button type="submit" class="btn btn-info">Calculate it please</button>
            </form>
        </div>
    </div>

@stop