@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Member List')])
<?php $user = Auth::user()->status_admin; ?>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="card card-profile" id="adminProfile">
                        <!-- Ajax load for editing profile -->
                            <script>
                                load("{{url('/')}}"+"/{{$admin->id}}/partAdminProfile","adminProfile");
                            </script>
                    </div>
                </div>

                <div class="col-md-12 col-lg-7">
                    @if($user == 1 && $admin->status_admin != 1)
                        <div class="card">
                            <div class="card-header card-header-primary">
                                Edit User
                            </div>
                            <div class="card-body">
                                <form action="/{{$admin->id}}/setting/access" method="POST">
                                    
                                    {{ csrf_field() }}

                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                            <th scope="col">Access</th>
                                            <th scope="col">Read</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Create</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; ?>
                                        @foreach($menu as $menu_access)                                
                                            <tr>
                                                <td>
                                                    {{$menu_access->menu_name}}
                                                </td>
                                                <input type="hidden" name="user_id" value="{{$admin->id}}">
                                                <td>
                                                    <div class="custom-control custom-switch" style="margin-left:15px;">
                                                        <input type="checkbox" name="read{{$menu_access->id}}" value="1" class="custom-control-input" id="{{$menu_access->id}}customSwitch1"
                                                        @if($access[$i][0]['menu_id']==$menu_access->id && $access[$i][0]['read']==1) checked @endif>

                                                        <label class="custom-control-label" for="{{$menu_access->id}}customSwitch1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch" style="margin-left:15px;">
                                                        <input type="checkbox" name="edit{{$menu_access->id}}" value="1" class="custom-control-input" id="{{$menu_access->id}}customSwitch2"
                                                        @if($access[$i][0]['menu_id']==$menu_access->id && $access[$i][0]['edit']==1) checked @endif>
                                                        <label class="custom-control-label" for="{{$menu_access->id}}customSwitch2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch" style="margin-left:15px;">
                                                        <input type="checkbox" name="{{'delete'.$menu_access->id}}" value="1" class="custom-control-input" id="{{$menu_access->id}}customSwitch3"
                                                        @if($access[$i][0]['menu_id']==$menu_access->id && $access[$i][0]['delete']==1) checked @endif>
                                                        <label class="custom-control-label" for="{{$menu_access->id}}customSwitch3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch" style="margin-left:15px;">
                                                        <input type="checkbox" name="{{'create'.$menu_access->id}}" value="1" class="custom-control-input" id="{{$menu_access->id}}customSwitch4"
                                                        @if($access[$i][0]['menu_id']==$menu_access->id && $access[$i][0]['create']==1) checked @endif>
                                                        <label class="custom-control-label" for="{{$menu_access->id}}customSwitch4"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <div class="form-group">
                                        <button class="btn btn-primary float-right" type="submit">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            @if($user != 1) Your @else {{$admin->name."'s"}} @endif activities
                        </div>
                        <div class="card-body">
                        @if($activities)
                            <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                   
                                        @foreach ($activities as $row)
                                            <tr>
                                                <td> {{ $row->waktu_proses }}</td>
                                                <td> @if($user != 1)You @else {{ $admin->name }} @endif
                                                    <span class="text-danger">{{ $row->route}}</span>
                                                    <span class="font-weight-bold text-lg"> {{ $row->nama }} </span>                          
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                        <div class="text-danger">There's no current activity</div>
                        @endif
                        </div>
                    </div>

                </div>  
            </div>
        </div>
    </div>


@endsection