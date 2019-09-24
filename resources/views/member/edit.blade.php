@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Member List')])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="../../dist/img/user4-128x128.jpg"
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
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Profil</h3>
                </div>
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
                            <input type="number" name="no_handphone" class="form-control" id="no_handphone" value="{{ $member->no_handphone }}">
                        </div>
                        <div class="form-group">
                            <label for="referral_code_parent">Referral Code Parent</label>
                            <input type="text" name="referral_code_parent" class="form-control" id="referral_code_parent" value="{{ $member->referral_code_parent }}">
                        </div>
                        <div class="form-group">
                            <label for="status_hapus">Status Hapus</label>
                            <input type="text" name="status_hapus" class="form-control" id="status_hapus" value="{{ $member->status_hapus }}">
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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection