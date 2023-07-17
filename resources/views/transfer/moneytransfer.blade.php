@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-5">
                <h5 class="card-header">Money transfer form</h5>
            <div class="card-body">
                <form action="{{route('transfer-moneytransfer')}}" method="post">
                    <label class="form-label">
                        <div class="fw-bold fs-5">From account:</div>
                    </label>
                    <select class="form-select fs-5" name="moneyfrom">
                        <option value="default">Select an account</option>
                        @foreach($accounts as $account)
                        <option value="{{ $account->id }}">
                            IBAN: {{$account->iban}} BALANCE: {{($account->balance)}}€
                            @foreach($clients as $client)
                            @if($account->client_id == $client->id)
                            NAME: {{$client->first_name}} {{$client->last_name}}
                            @endif
                            @endforeach
                        </option>
                        @endforeach
                    </select>

                    <label class="form-label">
                        <div class="fw-bold fs-5">To account:</div>
                    </label>
                    <select class="form-select fs-5" name="moneyto">
                        <option value="default">Select an account</option>
                        @foreach($accounts as $account)
                        <option value="{{ $account->id }}">
                            IBAN: {{$account->iban}} BALANCE: {{($account->balance)}}€
                            @foreach($clients as $client)
                            @if($account->client_id == $client->id)
                            NAME: {{$client->first_name}} {{$client->last_name}}
                            @endif
                            @endforeach
                        </option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label class="form-label fs-5 fw-bold">Amount:</label>
                        <input type="text" class="form-control fs-5 fw-bold" name="amount">
                    </div>
                    <button type="submit" class="pastel-green">Transfer</button>
                    @csrf
                    @method('put')
                </form>
            </div>

        </div>
    </div>
</div>
@endsection