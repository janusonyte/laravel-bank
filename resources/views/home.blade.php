@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bank Statistics</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Number of clients: <b>{{$clients->count()}}</b></h3>
                    <h3>Number of accounts in the bank: <b>{{$accounts->count()}}</b></h3>
                    <h3>Amount of money stored in the bank: <b>{{$accounts->sum('balance')}}€</b></h3>
                    <h3>Biggest amount held in an account: <b>{{$accounts->max('balance')}}€</b></h3>
                    <h3>Smallest amount held in an account: <b>{{$accounts->min('balance')}}€</b></h3>
                    <h3>Average amount held in an account: <b>{{round($accounts->avg('balance'),2)}}€</b></h3>
                    <h3>Number of accounts with 0 balance: <b>{{$accounts->where('balance', 0)->count()}}</b></h3>
                    <h3>Number of accounts with negative balance: <b>{{$accounts->where('balance','<', 0)->count()}}</b></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection