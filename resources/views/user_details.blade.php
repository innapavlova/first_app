@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bonuses</div>

                    <div class="card-body">
                        @if(count($userData) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Daily Bonus</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    @foreach($userData as $data)
                                        <tr>
                                            <td class="dataID">{{$data->id}}</td>
                                            <td>{{$data->daily_bonus}}</td>
                                            <td>{{$data->created_at}}</td>
                                            <td>{{$data->updated_at}}</td>
                                            <td><button type="button" class="btn btn-sm btn-primary remove-bonus">Remove bonus</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        @else
                            Nothing to show.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
