@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-4">
            <div class="card m-5">
                <h5 class="card-header">Sort</h5>
                <div class="card-body">
                    <div class="m-2">
                        <form action="{{route('accounts-index')}}" method="get">
                            <fieldset>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <select class="form-select" name="sort_by">
                                            <option value="" @if(''==$sortBy) selected @endif>No sort</option>
                                            <option value="last_name" @if('last_name'==$sortBy) selected @endif>Last Name</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" name="order_by">
                                            <option value="asc" @if('asc'==$orderBy) selected @endif>ASC</option>
                                            <option value="desc" @if('desc'==$orderBy) selected @endif>DESC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-1">
                                        <button type="submit" class="pastel-green">Show</button>
                                        <a class="button pastel-purple" href="{{route('accounts-index')}}">Clear</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
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
</div>
@endsection