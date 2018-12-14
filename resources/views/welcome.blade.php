@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
              <h2>Users</h2>
        </div>
        <div class="col-md-8">
            <form class="form-inline float-right">
                <div class="form-group" style="padding-right: 20px">
                    <select name="gender" class="form-control">
                        @if(request('gender'))
                            @if(request('gender') == "Female")
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            @else
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            @endif
                        @else
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>

    <div class="card">
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->profile->gender}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{ $users->appends(['gender'=>request('gender')])->links() }}
</div>

@endsection