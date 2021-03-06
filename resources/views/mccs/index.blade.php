@extends('master')
@section('title', 'Chess Club Members')
@section('content')
    <form name="search" action="/mccs/search" method="post" class="form-horizontal">
        <span style="position: absolute;top: 65px;right: 5px;">
            <input type="text" name="token" placeholder="Filter...">
        </span>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            @if ($mccs->isEmpty())
                <p> There are no members.</p>
            @else
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="text-center report-headings">@sortablelink ('Name')</th>
                        <th class="text-center report-headings">@sortablelink ('Zip')</th>
                        <th class="text-center report-headings">@sortablelink ('uscf_id', 'USCF')</th>
                        <th class="text-center report-headings">@sortablelink ('uscf_rating', 'Rating')</th>
                        <th class="text-center report-headings">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mccs as $mcc)
                        <tr>
                            <td class="text-left">{!! $mcc->name !!}</td>
                            <td class="text-center">{!! $mcc->zip !!}</td>
                            <td class="text-center">{!! $mcc->uscf_id !!}</td>
                            <td class="text-center">{!! $mcc->uscf_rating !!}</td>
                            <td class="text-center">
                                {{--<a href="{!! action('MccsController@rating', $mcc->id) !!}" title="USCF Rating"><span class="glyphicons glyphicons-stats"></span></a>--}}
                                <a href="{!! action('MccsController@show', $mcc->id) !!}" title="Show"><span class="glyphicon glyphicon-list"></span></a>
                                <a href="{!! action('MccsController@edit', $mcc->id) !!}" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{!! action('MccsController@destroy', $mcc->id) !!}" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
        </div>

        <div class="text-center">{!! $mccs->render() !!}</div>

        <div class="text-right">
            <a href="{!! action('MccsController@excel') !!}" title="Export to Excel"><span class="glyphicon glyphicon-download-alt"></span> Excel </a> &nbsp;
            <a href="{!! action('MccsController@ratings') !!}" title="USCF Ratings"><span class="glyphicons glyphicons-stats"></span> USCF</a>
            <span style="float:left">
                <a href="/mcc/create" class="btn btn-sm btn-primary btn-raised" role="button">Add</a> &nbsp;
            </span>
        </div>

    </div>
@endsection

