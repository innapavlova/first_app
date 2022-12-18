@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Illuminate\Support\Facades\Auth::check() && Illuminate\Support\Facades\Auth::user()->hasRole('Admin'))
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td >{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>
                                        <td><button type="button" class="btn btn-sm btn-primary view-details" data-user-id="{{$user->id}}">View details</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
