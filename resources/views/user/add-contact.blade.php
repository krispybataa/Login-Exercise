@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Add Contact</h1>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('user.contacts.add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Contact Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter contact name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact Number</label>
                        <input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="Enter contact number" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Contact Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter contact email" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add Contact</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Optional: Additional JavaScript for custom functionalities
    </script>
@endsection
