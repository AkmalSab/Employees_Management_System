@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    </div>

    <div class="row">
        <div class="card mx-auto">
            <div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form class="row gy-2 gx-3 align-items-center" method="GET" action="{{ route('departments.index') }}">
                            <div class="col-auto">
                                <input type="search" name="search" class="form-control" id="autoSizingInput" placeholder="Jane Doe">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('departments.create') }}" class="btn btn-primary float-right">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Deparment Name</th>
                        <th scope="col">manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Departments as $Department)
                        <tr>
                            <th scope="row">{{ $Department->id }}</th>
                            <td>{{ $Department->name }}</td>
                            <td>
                                <a href="{{ route('departments.edit', $Department->id) }}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
