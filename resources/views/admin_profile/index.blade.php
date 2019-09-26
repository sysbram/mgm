@extends('layouts.app', ['activePage' => 'back_office', 'titlePage' => __('Member List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <!-- <div class="card">
                        <div class="card-header card-header-primary">
                            {{$admin->name}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="profile-img">
                                        image
                                    </div>
                                </div>
                                <div class="col-8">
                                <br>
                                    <b>{{$admin->name}}</b><br> 
                                    <i>{{$admin->email}}</i>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="/{{$admin->id}}/edit">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" value="{{$admin->name}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="{{$admin->email}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input name="no_hp" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone Number" value="{{$admin->no_hp}}" >
                                        </div>

                                        

                                        @if(session('success'))
                                            <div class="alert alert-success">{{session('success')}}</div>
                                        @endif

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="card card-profile">
                        <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="https://image.shutterstock.com/image-vector/november-17-2017-vector-illustration-260nw-756988828.jpg">
                        </a>
                        </div>
                        <div class="card-body">
                        <h6 class="card-category text-gray">{{$admin->occupation}}</h6>
                        <h4 class="card-title">{{$admin->name}}</h4>
                        <p class="card-description">
                            @if(isset($admin->description))
                                {{$admin->description}}
                            @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae earum voluptatum reprehenderit!
                            @endif
                        </p>
                        <a href="#pablo" class="btn btn-primary btn-round" data-toggle="modal" data-target="#addMemberModal">Edit</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            Edit User
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">Access</th>
                                    <th scope="col">Read</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>
                                        Access for this one
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3"></label>
                                        </div>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{$admin->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="modal-body">
            <form action="/{{$admin->id}}/edit" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" value="{{$admin->name}}">
                </div>                
                <div class="form-group">
                    <input name="email" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email" value="{{$admin->email}}" @if ($admin->name != 'Admin') placeholder="{{$admin->email}}" disabled @endif>
                </div>
                <div class="form-group">
                    <input name="phone_number" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone Number" value="{{$admin->no_hp}}">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control " id="validationTextarea" placeholder="Your description here" value="{{$admin->description}}" required></textarea>
                </div>

                <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                </div>
                </div>

                <select class="custom-select my-4" name="occupation">
                    <option selected>Ocupation</option>
                    <option value="MANAGER">Manager</option>
                    <option value="BRANCH MANAGER">Branch Manager</option>
                    <option value="STAFF">Staff</option>
                </select>
                <button type="submit" class="btn btn-primary float-right">Agree to add</button>
            </form>
        </div>
        
    </div>
    </div>
    </div>

@endsection