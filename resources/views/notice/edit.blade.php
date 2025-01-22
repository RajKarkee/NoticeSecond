@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Edit Notice</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notice.update', $notice->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $notice->title }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="Domain" class="form-label">Domain</label>
                <input type='text' name="domain" id="domain" class="form-control"
                    value="{{ $notice->domain }}"required></textarea>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Description</label>
                <textarea name="desc" id="desc" class="form-control" rows="5" required>{{ $notice->desc }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Update Notice</button>

            <a href="{{ route('notice.index') }}" class="btn btn-secondary">Cancel</a>


           <button type="submit" class="btn btn-warning" name="Status" value="{{ $notice->Status == 1 ? 0 : 1 }}">
            Toggle Status (Currently: {{ $notice->Status == 1 ? 'Active' : 'Inactive' }})
        </button>

        </form>
    </div>




@endsection
