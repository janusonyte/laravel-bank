@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-5">
                <h5 class="card-header">Clients List</h5>
                <div class="card-body">
                    <ul class="ul-style list-group list-group-flush" style="display: flex; flex-direction:row; flex-wrap:wrap; justify-content: center;">
                        @forelse($clients as $client)
                        <li>
                            <div class="card inner-card m-4">
                                <div class="card-body inner-card-body">
                                    <div class="ms-">
                                        <div class="fw-bold fs-3">{{$client->first_name}} {{$client->last_name}}</div>
                                        <div>Personal ID:</div>
                                        <div class="fw-bold">{{$client->personal_id}}</div>
                                        <div>Number of accounts:</div>
                                        <div class="fw-bold">{{$client->accounts()->count()}}</div>
                                        <div>Total balance in all accounts:</div>
                                        <div class="fw-bold">{{$client->accounts()->sum('balance')}} €</div>
                                    </div>
                                </div>
                                <div class="ms-1 mt-4 mb-4">
                                    <a class="button pastel-blue" href="{{route('clients-edit', $client)}}">Edit client info</a>
                                    <a class="button pastel-red" href="{{route('clients-delete', $client)}}">Delete client</a>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li>
                            <p class="text-center">No clients in the bank!</p>
                        </li>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection