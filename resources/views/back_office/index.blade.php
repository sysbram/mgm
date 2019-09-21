@extends('layouts.app', ['activePage' => 'back_office', 'titlePage' => __('Member List')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Member Table</h4>
                        <p class="card-category"> Here you can mamage members</p>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary text-center">
                                <th scope="col">#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>No Handphone</th>
                                <th>Status Login</th>
                                <th>Status Aktif</th>
                                <th>Last Login</th>
                                <!-- <th>No Handphone</th> -->
                                <!-- <th class="text-center">Status Hapus</th>
                                <th class="text-center">Status Login</th>
                                <th class="text-center">Last Login</th> -->
                                <th>Action</th>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($bo as $user_bo)
                                    <tr class="text-center">
                                        <td>{{ $no.'.'}}
                                        <td class="text-left">{{ $user_bo->name }}</td>
                                        <td class="text-left">{{ $user_bo->email }}</td>
                                        <td>{{ $user_bo->created_at }}</td>
                                        <td>{{ $user_bo->no_handphone }}</td>
                                        @if($user_bo->status_login == 1)
                                            <td class="text-center text-success">Sedang Login</td>
                                        @else
                                            <td class="text-center text-danger">Tidak Aktif</td>
                                        @endif
                                        @if($user_bo->status_hapus == 'N')
                                            <td class="text-center text-success">Aktif</td>
                                        @else
                                            <td class="text-center text-danger">Tidak Aktif</td>
                                        @endif
                                        <td class="text-center">{{ $user_bo->last_login }}</td>
                                        <td>
                                            <a href="/member/profil/{{ $user_bo->id }}"><i class=" fa fa-eye"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"><i class=" fa fa-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModalDelete"><i class=" fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <?php $no++; ?>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form role="form" action="/back_office/update" method="post">
        {{ csrf_field() }}
        <div class="card-body">
                <input type="hidden" name="id" value="{{ $user_bo->id}} "><br/>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user_bo->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ $user_bo->email }}">
            </div>
            <div class="form-group">
                <label for="no_handphone">No Handphone</label>
                <input type="text" name="no_handphone" class="form-control" id="no_handphone" value="{{ $user_bo->no_handphone }}">
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

<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDelete" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Apakah anda yakin ingin menghapus member ini ?
    </div>
    <form role="form" action="/back_office/delete" method="post">
    {{ csrf_field() }}
        <div class="modal-footer">
        <input type="hidden" name="id" value="{{ $user_bo->id}} "><br/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" class="btn btn-primary">YES</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection