@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card m-5">
                <h5 class="card-header">Accounts List</h5>
                <div class="card-body">
                    <ul class="ul-style list-group list-group-flush" style="display: flex; flex-direction:row; flex-wrap:wrap; justify-content: center;">
                        @forelse($accounts as $account)
                        <li>
                            <div class="card inner-card m-5">
                                <div class="card-body inner-card-body">
                                    <div class="ms-2">
                                        <div class="fw-bold fs-5 text-decoration-underline">{{$account->iban}}</div>
                                        <div>Client:</div>
                                        <div class="fw-bold fs-5">{{ $account->client->first_name}} {{ $account->client->last_name}}</div>
                                        {{-- <div class="fw-bold">{{$account->client_id}}</div> --}}
                                        <div>Balance:</div>
                                        <div class="fw-bold fs-5">{{$account->balance}} €</div>
                                    </div>
                                    <div class="ms-1 mt-4 mb-4">
                                        <a class="button pastel-blue" href="{{route('accounts-edit', $account)}}">Edit balance</a>
                                        <a class="button pastel-red" href="{{route('accounts-delete', $account)}}">Delete account</a>
                                    </div>
                                </div>

                            </div>
                        </li>
                        @empty
                        <li>
                            <p class="text-center">No accounts in the bank!</p>
                        </li>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection