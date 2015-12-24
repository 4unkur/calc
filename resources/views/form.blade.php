@extends('master')

@section('content')
    <div class="row">
        <div class="center-block-custom">
            <form class="form col-xs-6 col-md-5 col-lg-4" method="post">
                {{ csrf_field() }}
                <div class="panel panel-info ">
                    <table class="table ">
                        <tr class="bg-info">
                            <th>y</th>
                            <th>x</th>
                        </tr>
                        @for ($i = 0; $i < 7; $i++)

                            <tr>
                                @foreach (['y', 'x'] as $field)
                                <td class="td">
                                    <input type="text" name="{{ $field }}[]" class="form-control input @if ($errors->has($field . '.' . $i)) alert-danger @endif" value="{{ old($field . '.' . $i) }}" >
                                </td>
                                @endforeach
                            </tr>
                        @endfor
                    </table>
                </div>
                <button type="submit" class="btn btn-info btn-block">Calculate it please</button>
            </form>

            @if (count($errors))
                <div class="errors col-xs-6 col-md-5 col-lg-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">Following errors occured while processing:</h3>
                        </div>
                        <div class="panel-body text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <p>Fields cannot be empty. Only numbers are allowed.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop