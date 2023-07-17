@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <h5 class="card-header">Confirm client deletion</h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Are you sure you want to delete this client? <br> (this action is permanent)</h6>
                        <form method="post" action="{{route('clients-destroy', $client)}}">
                            <div class="justify-content-between">
                                <div class="d-flex mb-3">
                                    <div class="ms-2">
                                        <div class="fw-bold fs-3">{{$client->first_name}} {{$client->last_name}}</div>
                                        <div>Personal ID</div>
                                        <div class="fw-bold">{{$client->personal_id}}</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="red">Delete</button>
                            <a class="button pastel-blue" href="{{route('clients-index')}}">Cancel</a>
                            @method('delete')
                            @csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection