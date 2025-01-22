@extends('layout.layout')

@section('content')




<div class="container mt-5">
    <h1 class="mb-4">Add Notice</h1>
    <form action="{{route('notice.create')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Notice Title" required>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="desc" id="description" class="form-control" rows="5" placeholder="Enter Notice Description" required></textarea>
        </div>


        <div class="mb-3">
            <label for="domain" class="form-label">Domain</label>
            <input type="text" name="domain" id="domain" class="form-control" placeholder="Enter Domain (default is 'all')" value="all">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Notice</button>
    </form>
</div>




@endsection
