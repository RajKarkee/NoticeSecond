@extends('layout.layout')

 @section('content')

<p>This is notice</p>

<div class="container mt-5">
    <h1 class="mb-4">Notices List</h1>

    <a href="{{route('notice.add')}}" class="btn btn-primary" >Add</a>
    <br>
    <hr>
    <table class="table table-bordered">
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
                    <td>{{$notice->Status}}</td>
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



 @endsection

