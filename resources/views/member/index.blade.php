@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Member List')])

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
                    <thead class=" text-primary">
                    <th scope="col">#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Handphone</th>
                    <th>Ref Code</th>
                    <th>Ref Code Parent</th>

                    <!-- <th class="text-center">Status Hapus</th> -->
                    <!-- <th>Last Login</th> -->
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach($member as $data_member)
                    <tr>
                        <td>{{ $no.'.'}}
                        <td>{{ $data_member->nik }}</td>
                        <td>{{ $data_member->nama }}</td>
                        <td>{{ $data_member->email }}</td>
                        <td>{{ $data_member->no_handphone }}</td>
                        <td>{{ $data_member->referral_code }}</td>
                        <td>{{ $data_member->referral_code_parent }}</td>

                        <!-- @if($data_member->status_hapus == 'N')
                        <td class="text-center">Aktif</td>
                        @else
                        <td class="text-center">Tidak Aktif</td>
                        @endif

                        @if($data_member->last_login == 'NULL')
                        <td class="text-center">-</td>
                        @else
                        <td>{{ $data_member->last_login }}</td>
                        @endif -->
                        <td>
                            <a href="/member/profil/{{ $data_member->uid }}"><i class=" fa fa-eye"></i></a>
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
    <form role="form" action="/member/update" method="post">
        {{ csrf_field() }}
        <div class="card-body">
                <input type="hidden" name="uid" value="{{ $data_member->uid}} "><br/>
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
            </div>    <div class="form-group">
                <label for="status_hapus">Status Hapus</label>
                <?= Form::select('status_hapus',  array('N' => 'Aktif', '1' => 'Tidak Aktif'), null, ['class' => 'form-control']); ?>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
                </div>
                </div>
            </div> -->
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
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
    <form role="form" action="/member/delete" method="post">
    {{ csrf_field() }}
        <div class="modal-footer">
        <input type="hidden" name="uid" value="{{ $data_member->uid}} "><br/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" class="btn btn-primary">YES</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection