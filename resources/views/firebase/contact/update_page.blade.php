@extends('firebase.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-">
                    <div class="card-header">
                        <h4>
                            contact Update
                            <a href="{{url('contacts')}}" class="btn btn-sm btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('contact/update/'.$id)}}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group mb-3">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{$getContactById['fname']}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{$getContactById['lname']}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{$getContactById['phone']}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control" value="{{$getContactById['email']}}">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection