@extends('firebase.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
                @endif
                <div class="card-">
                    <div class="card-header">
                        <h4>
                            contact List
                            <a href="{{url('add-contact')}}" class="btn btn-sm btn-primary float-end">Add data </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>phone</th>
                                    <th>Email</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getContacts as $key => $item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$item['fname']}}</td>
                                        <td>{{$item['lname']}}</td>
                                        <td>{{$item['phone']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td><a href="{{url('contact/Edit-fields/'.$key)}}" class="btn btn-success">Edit</a></td>
                                        <!-- this is for delete a record using the get method-->
                                        {{-- <td><a href="{{url('contact/delete/'.$key)}}" class="btn btn-danger">Delete</a></td> --}}
                                        <!-- this is for delete a record using the get method-->
                                        <td>
                                            <form action="{{url('contact/delete/'.$key)}}" method="post">
                                                <button class="btn btn-danger">
                                                    @csrf
                                                    @method('DELETE')
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <td colspan="7">No record Fond</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection