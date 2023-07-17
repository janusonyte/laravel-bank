@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fs-2">Bank Statistics &#128302;</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Number of clients: <b>{{$clients->count()}} @for($i = 0; $i < $clients->count(); $i++)
                        &#x1F9CD;
                    @endfor</b></h3>
                    <h3>Number of accounts in the bank: <b>{{$accounts->count()}} @for($i = 0; $i < $accounts->count(); $i++)
                        &#x1F4B0;
                    @endfor</b></h3>
                    <h3>Amount of money stored in the bank: <b>{{number_format($accounts->sum('balance'))}} € &#128182;</b></h3>
                    <h3>Biggest amount held in an account: <b>{{number_format($accounts->max('balance'))}} € &#128200;</b></h3>
                    <h3>Smallest amount held in an account: <b>{{number_format($accounts->min('balance'))}} € &#128201;</b></h3>
                    <h3>Average amount held in an account: <b>{{number_format(round($accounts->avg('balance'),2))}} € &#128184;</b></h3>
                    <h3>Number of accounts with 0 balance: <b>{{$accounts->where('balance', 0)->count()}} &#128123;</b></h3>
                    <h3>Number of accounts with negative balance: <b>{{$accounts->where('balance','<', 0)->count()}} @if($accounts->where('balance','<', 0)->count() == 0 ) &#127881; @else &#128546; @endif</b></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection