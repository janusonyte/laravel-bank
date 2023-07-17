@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <h5 class="card-header">Create a new account</h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-3 fw-bold">Choose an existing client from the clients list</h6>
                    <form method="post" action="{{route('accounts-store')}}">

                        <div class="mb-3">
                            <label class="form-label">Clients list</label>
                            <select name="client_id" class="form-select ">
                                <option>Select an existing client</option>
                                @foreach ($clients as $client)
                                <option value="{{$client->id}}" @if($client->id == old('client_id')) selected @endif>{{$client->first_name}} {{$client->last_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Account Number</label>
                            <input name="iban" type="text" class="form-control" value="{{$iban}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Balance:</label>
                            <input name="balance" type="text" class="form-control" value="0" readonly>
                        </div>
                        <button type="submit" class="pastel-green">Create</button>
                        <a class="button pastel-blue" href="{{route('accounts-index')}}">Cancel</a>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection