@extends('layouts.app', ['activePage' => 'back_office', 'titlePage' => __('Member List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add new tool</h4>
                            <div class="card-category">This will show on menu navigation</div>
                        </div>
                        <div class="card-body">
                            <form action="/setting/create_tool" method="post">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <input name="menu" type="text" class="form-control" placeholder="Tools name">
                                </div>
                                <div class="form-group">
                                <button class="btn btn-primary float-right"  type="submit">Add</button>
                                </div>
                            </form>
                        
                            <div class="form-group mt-4">
                            <ul class="list-group">
                            <h4 class="card-title">Tools available</h4>
                            <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead class="text-primary text-center">
                                        <tr>
                                            <th>Tool Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menu as $key)
                                        <tr>
                                            <td>{{$key->menu_name}}</td>
                                            <td style="text-align:center;"><a href="/{{$key->id}}/setting/deleting_menu"><i class=" fa fa-trash"></i></a></a></td>
                                        </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </ul>
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
