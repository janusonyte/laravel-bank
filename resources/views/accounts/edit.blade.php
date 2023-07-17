@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <h5 class="card-header">Edit account balance</h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Add or withdraw money from account</h6>
                        <form method="post" action="{{route('accounts-destroy', $account)}}">
                            <div class="justify-content-between">
                                <div class="d-flex mb-3">
                                    <div class="ms-2">
                                        <div class="fw-bold fs-3">{{$account->iban}}</div>
                                        <div class="fw-bold fs-3">{{$account->client->first_name}} {{$account->client->last_name}}</div>
                                        <div> Current balance:</div>
                                        <div class="fw-bold fs-3">{{$account->balance}} €</div>
                                        <div>
                                            <label for="balance">Enter the amount:</label>
                                            <input name="balance" type="number" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button name="addFunds" type="submit" class="pastel-green">Deposit</button>
                            <button name="withdrawFunds" type="submit" class="pastel-red">Withdraw</button>
                            <a class="button pastel-blue" href="{{route('accounts-index')}}">Cancel</a>
                            @method('put')
                            @csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection