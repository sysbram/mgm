@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Member List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add new tool</h4>
                            <div class="card-category">This will show on menu navigation</div>
                        </div>
                        <div class="card-body">
                            @php
                            $dashboard = 0;
                            $back_office = 0;
                            $member = 0;
                            $log_back_office = 0;
                            @endphp
                            @for($i=0; $i<count($menu); $i++)
                                @if($menu[$i]['id']=='1')
                                    @php $dashboard = 1; @endphp
                                @elseif($menu[$i]['id']=='2')
                                    @php $back_office = 1; @endphp
                                @elseif($menu[$i]['id']=='3')
                                    @php $member = 1; @endphp
                                @elseif($menu[$i]['id']=='4')
                                    @php $log_back_office = 1; @endphp
                                @endif                     
                            @endfor
                                
                                <span class="badge badge-danger text-white">Deactive tool</span>
                                <div class="row">
                                    <div class="col-12">
                                        @if($dashboard ==0)                       
                                            <button class="btn btn-light btn-sm float-left" onclick="load('/setting/dashboardTool','toolInfo');">
                                                Dashboard +
                                            </button>
                                        @endif

                                        @if($back_office == 0)                       
                                            <button class="btn btn-light btn-sm float-left" onclick="load('/setting/backOfficeTool','toolInfo');">Back Office +</button>
                                        @endif

                                        @if($member ==0)                       
                                            <button class="btn btn-light btn-sm float-left" onclick="load('/setting/memberTool','toolInfo');">Member +</button>
                                        @endif

                                        @if($log_back_office ==0)                       
                                            <button class="btn btn-light btn-sm float-left" type="submit">Log Back Office +</button>
                                        @endif

                                        @if(count($menu)==4)
                                            <div class="alert alert-success mt-2">Available menus are actived</div>
                                        @endif
                                    </div>
                                </div>

                                <span class="badge badge-success mt-4">Active tools</span>
                               <div class="row">
                                    <div class="col-12">
                                        @for($i=0; $i<count($menu); $i++)
                                            <button class="btn btn-success btn-sm disabled">{{$menu[$i]['menu_name']}}</button>
                                        @endfor
                                        @if(count($menu)==0)
                                            <div class="alert alert-danger mt-2">No active tools</div>
                                        @endif
                                    </div>
                               </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-12 col-lg-7" id="toolInfo">
                    <div class="card">
                        <div class="card-header card-header-primary">
                             <h4 class="card-title">Tool Information</h4>
                        </div>
                        <div class="card-body">                            
                            <div class="alert alert-warning">
                            <h4 >Tool needs to be activated before it can be used to your site</h3>
                            <span class="card-category text-white op-5">
                                In order to aware about what the tool is and what does it belong to, <br>
                                please kindly read carefuly about the tool information once you're trying to activate
                            </span>
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
