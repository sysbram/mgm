@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Member List')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            @if (session('updated_success'))
                <div class="alert alert-success">
                    {{session('updated_success')}}
                </div>
            @elseif (session('deleted_success'))
                <div class="alert alert-danger">
                    {{session('deleted_success')}}
                </div>
            @endif
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Member </h4>
                <p class="card-category"> Here you can manage members</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary text-center">
                    <th scope="col">#</th>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <!-- <th>Referral Code</th>
                    <th>Referral Code Parent</th> -->

                    <th class="text-center">Active Status</th>
                    <th>Last Login</th>

                    
                    <th>Action</th>
                    
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach($member as $data_member)
                    <tr>
                        <td class="text-center">{{ $no.'.'}}
                        <td class="text-center">{{ $data_member->nik }}</td>
                        <td>{{ $data_member->nama }}</td>
                        <td>{{ $data_member->email }}</td>
                        <td class="text-center">{{ $data_member->no_handphone }}</td>
                        <!-- <td>{{ $data_member->referral_code }}</td>
                        <td>{{ $data_member->referral_code_parent }}</td> -->

                        @if($data_member->status_hapus != 'Y')
                            @if($data_member->id_status == 1)
                            <td class="text-warning text-center">Registration</td>
                            @elseif($data_member->id_status == 5)
                            <td class="text-warning text-center">Email Activation</td>
                            @elseif($data_member->id_status == 10)
                            <td class="text-warning text-center">ID Verification</td>
                            @elseif($data_member->id_status == 15 || $data_member->id_status == 20)
                            <td class="text-success text-center">Active</td>
                            @endif
                            
                        @endif

                        @if($data_member->last_login == 'NULL')
                        <td class="text-center">-</td>
                        @else
                        <td>{{ $data_member->last_login }}</td>
                        @endif
                        <td>
                            @if($access[0]['read'] == 1)
                            <a href="/member/profil/{{ $data_member->uid }}"><i class=" fa fa-eye"></i></a>
                            @endif  
                                                     

                            @if($access[0]['edit'] == 1)
                            <a href="/member/edit/{{ $data_member->uid }}" data-toggle="modal" data-target="#modalUpdate{{ $data_member->uid}}" id="modalUpdate">
                                <i class=" fa fa-edit"></i>
                            </a>
                            @endif  
                            

                            @if($access[0]['delete'] == 1)
                            <a href="/member/delete/{{ $data_member->uid }}" data-toggle="modal" data-target="#modalDelete{{ $data_member->uid }}" id="modalDelete">
                                <i class=" fa fa-trash"></i>
                            </a>
                            @endif  
                        </td>
                    </tr>

                    <?php $no++; ?>

                    <!-- Modal Update -->
                    <div class="modal fade" id="modalUpdate{{ $data_member->uid }}" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdateLabel">Edit Profil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form role="form" action="/member/update/{{ $data_member->uid }}" method="post">

                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="card-body">
                                        <input type="hidden" name="uid" value="{{ $data_member->uid }} "><br/>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" name="nik" class="form-control" id="nik" value="{{ $data_member->nik }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $data_member->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $data_member->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_handphone">No Handphone</label>
                                        <input type="number" name="no_handphone" class="form-control" id="no_handphone" value="{{ $data_member->no_handphone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_hapus">Status Hapus</label>
                                        <?= Form::select('status_hapus',  array('N' => 'Aktif', '1' => 'Tidak Aktif'), null, ['class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalDelete{{ $data_member->uid }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelDelete" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-danger">
                                    Are you sure to Delete member <span class="font-weight-bold" style="font-size:16px; color:black">{{ $data_member->nama }}</span>  ?
                                </div>
                                <form role="form" action="/member/delete/{{ $data_member->uid }}" method="post">
                                {{ csrf_field() }}
                                    <div class="modal-footer">
                                        <input type="hidden" name="uid" value="{{ $data_member->uid}} "><br/>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                        <button type="submit" class="btn btn-danger">YES</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </tbody>
                </table>
                <br/>
                {{ $member->links() }}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection