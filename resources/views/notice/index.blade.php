@extends('layout.layout')

 @section('content')
<div class="container mt-2">
    <h2 class="mb-4">Notices List</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('notice.add') }}" class="btn btn-primary">Add</a>
    </div>
    <table id="noticesTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Domain</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notice as $index =>$notice )
                <tr>



                    <td>{{$index+1}}</td>
                    <td>{{$notice->title}}</td>
                    <td>{{$notice->desc}}</td>
                    <td>{{$notice->domain}}</td>
                    <td>
                        @if ($notice->Status == 1)
                            <p>Active</p>
                        @else
                            <p>InActive</p>
                        @endif
                    </td>
                    <td>

                        <a href="{{route('notice.edit',$notice->id)}}"" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('notice.delete',$notice->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#noticesTable').DataTable({
                paging: true,      // Enables pagination
                searching: true,   // Enables search functionality
                ordering: true,    // Enables sorting
                lengthChange: true, // Enables changing page length
                pageLength: 10,    // Sets default number of entries per page
                columnDefs: [
                    { orderable: false, targets: [0,5] } // Disables sorting for the "Action" column
                ],
            });
        });
    </script>



 @endsection

