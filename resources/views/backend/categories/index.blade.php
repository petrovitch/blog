@extends('master')
@section('title', 'All categories')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> All categories </h2>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($categories->isEmpty())
                <p> There are no categories.</p>
            @else
                <table class="table table-bordered table-striped">
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{!! $category->name !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <center>{!! $categories->render() !!}</center>
@endsection

