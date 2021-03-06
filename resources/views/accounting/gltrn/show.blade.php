@extends('master')
@section('name', 'Show Transaction')

@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well well bs-component">

            <form class="form-horizontal" method="post">
                {!! csrf_field() !!}
                <fieldset>
                    <legend>Show Transaction</legend>

                    <div class="form-group">
                        <label for="acct" class="col-lg-2 control-label">Acct</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="acct" placeholder="Account Numbrer" name="acct"
                                   value="{{ $gltrn->acct }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="description" placeholder="Description" name="description"
                                   value="{{ $gltrn->description }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="crj" class="col-lg-2 control-label">CRJ</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="crj" placeholder="CRJ" name="crj"
                                   value="{{ $gltrn->crj }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date" class="col-lg-2 control-label">Date</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="date" placeholder="Date" name="date"
                                   value="{{ date('m/d/Y', strtotime($gltrn->date)) }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="document" class="col-lg-2 control-label">Document</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="document" placeholder="Document" name="document"
                                   value="{{ $gltrn->document }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-lg-2 control-label">Amount</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount"
                                   value="{{ $gltrn->amount }}" disabled>
                        </div>
                    </div>
                </fieldset>

                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection




