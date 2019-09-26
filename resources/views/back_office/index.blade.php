@extends('layouts.app', ['activePage' => 'back_office', 'titlePage' => __('Member List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success my-4">
                        {{session('success')}}
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Member Table</h4>
                            <p class="card-category"> Here you can manage your member</p>
                            <button class="btn btn-warning float-right" data-toggle="modal" data-target="#addMemberModal">Add new admin</button>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead class=" text-primary text-center">
                                    <th scope="col">#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>No Handphone</th>
                                    <th>Status Login</th>
                                    <th>Last Login</th>
                                    <!-- <th>No Handphone</th> -->
                                    <!-- <th class="text-center">Status Hapus</th>
                                    <th class="text-center">Status Login</th>
                                    <th class="text-center">Last Login</th> -->
                                    <th>Action</th>
                                    </thead>

                                    <tbody>
                                    @foreach($admin as $data)                                    
                                        <tr class="text-center" style="cursor:pointer">
                                            <td>
                                            <td class="text-left"><a href="/{{$data->id}}/profile">{{ $data->name }}</a></td>
                                            <td class="text-left">{{ $data->email }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td class="text-center text-success">@if($data->status_login == 1) Online @else Offline @endif</td>
                                            <td class="text-center">{{$data->last_login}}</td>
                                            <td>
                                                <a href="/back_office/{{$data->id}}/delete"><i class=" fa fa-trash"></i></a></a>
                                                <!-- <a href=""><i class=" fa fa-eye"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i class=" fa fa-edit"></i></a> -->
                                                <!-- <a href="" data-toggle="modal" data-target="#exampleModalDelete"><i class=" fa fa-trash"></i></a> -->
                                            </td>
                                        </tr>  
                                    @endforeach                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



<!-- Modal -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new admin</h5>
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
            <form action="/register" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Name">
                </div>                
                <div class="form-group">
                    <input name="email" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input name="phone_number" type="number" class="form-control" id="formGroupExampleInput2" placeholder="Phone Number">
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
