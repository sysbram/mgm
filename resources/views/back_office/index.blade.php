@extends('layouts.app', ['activePage' => 'back_office', 'titlePage' => __('Member List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title ">Member needs action</h4>
                            <p class="card-category"> Here you can manage your member</p>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead class=" text-primary text-center">
                                    <th>#</th>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </thead>

                                    <tbody>
                                    <?php $i=1;?>
                                    @foreach($member as $data)
                                        <a href="#" id="test"></a>                                  
                                        <tr class="text-center" style="cursor:pointer">
                                            <td>{{$i}}</td>
                                            <td>{{$data->nik}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>
                                                @if($data->id_status == 1)
                                                    <span class="text-warning">Registration</span>
                                                @elseif($data->id_status == 5)
                                                    <span class="text-warning">Plan B</span>
                                                @elseif($data->id_status == 10)
                                                    <span class="text-warning">Plan C</span>
                                                @else
                                                    <span class="text-warning">Plan D</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/')}}/member/{{$data->uid}}/review"><i class="fas fa-sign-out-alt hover-op-5"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++ ?>              
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



