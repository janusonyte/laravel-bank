@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card m-5">
                <h5 class="card-header">Sort</h5>
                <div class="card-body">
                    <div class="m-2">
                        <form action="{{route('clients-index')}}" method="get">
                            <fieldset>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <select class="form-select" name="sort_by">
                                            <option value="" @if(''==$sortBy) selected @endif>No sort - default</option>
                                            <option value="last_name" @if('last_name'==$sortBy) selected @endif>Last Name</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" name="order_by">
                                            <option value="asc" @if('asc'==$orderBy) selected @endif>Ascending</option>
                                            <option value="desc" @if('desc'==$orderBy) selected @endif>Descdending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-1">
                                        <button type="submit" class="pastel-green">Sort</button>
                                        <a class="button pastel-purple" href="{{route('clients-index')}}">Clear</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-8">
                <div class="card m-5">
                    <h5 class="card-header">Clients List</h5>
                    <div class="card-body">
                        <div class="m-3">
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
         <!-- Pagination -->
 <div class="col-md-12 mt-4">
    {{$clients->links()}}
</div>
    </div>
</div>
</div>
@endsection