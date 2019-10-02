@extends('layouts.app', ['activePage' => 'back_office', 'titlePage' => __('Member List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Member needs action</h4>
                            <p class="card-category"> Review what this member sent to, and click Verify to approve !</p>
                        </div>
                        <div class="card-body">
                            <div class="image-fluid bg-secondary text-center" style="height:auto; min-height:300px">
                                    @if($verify[0]['member_uid'])
                                        <img class="img" style="width:100%; height:100%" src="{{asset('Images/member/' . $verify[0]['member_uid'] . '/' . $verify[0]['transfer_receipt'])}}">
                                    @endif                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                <form action="/member/{{$verify[0]['id']}}/decline" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">                                        
                                        <h4 class="card-title ">Send some words!</h4>
                                        <p class="card-category">Why you approve or why you decline</p>
                                    </label>
                                    <textarea class="form-control" name="verify_info" id="exampleFormControlTextarea1" rows="3">Type here..</textarea>
                                </div>
                                </div>                                
                                <div class="col-6"><button class="btn btn-success btn-block">Verify</button></div>
                                <div class="col-6"><button type="submit" class="btn btn-warning btn-block">Decline</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection