@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h1 style="color: #FFFFFF">User Dashboard</h1>
            </div>
        </div>

        @if(session('success'))
            <div class="row mb-3">
                <div class="col">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="row mb-3">
                <div class="col">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row mb-4">
            <div class="col">
                <a href="{{ route('user.contacts.add') }}" class="btn btn-primary">Add Contact</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped bg-white">
                        <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->contact_no }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <form action="{{ route('user.contacts.remove', ['id' => $contact->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove Contact</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
