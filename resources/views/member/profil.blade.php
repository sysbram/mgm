@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Member List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="../../../user.jpg"}
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $member->nama}}</h3>

                    <p class="text-muted text-center">{{ $member->email }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Status Hapus</b> <a class="float-right">{{ $member->status_hapus }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Status Login</b> <a class="float-right">{{ $member->status_login }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Last Login</b> <a class="float-right">{{ $member->last_login }}</a>
                        </li>
                    </ul>

                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profil</h3>
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>NIK</b> <a class="float-right">{{ $member->nik }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Nama</b> <a class="float-right">{{ $member->nama }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $member->email }}</a>
                    </li><li class="list-group-item">
                        <b>No Handphone</b> <a class="float-right">{{ $member->no_handphone }}</a>
                    </li><li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $member->email }}</a>
                    </li>
                </ul>
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
                <input type="hidden" name="uid" value="{{ $member->uid}} "><br/>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" name="nik" class="form-control" id="nik" value="{{ $member->nik }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $member->nama }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $member->email }}">
            </div>
            <div class="form-group">
                <label for="no_handphone">No Handphone</label>
                <?= Form::text('no_handphone', $member->no_handphone, ['class' => 'form-control']) ?>
            </div>
            <div class="form-group">
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
@endsection