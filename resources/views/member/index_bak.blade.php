<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
</html>
@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Member List')])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Last Login</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                    @foreach($member as $data_member)
                    <tr>
                        <td>{{ $no.'.'}}
                        <td>{{ $data_member->nik }}</td>
                        <td>{{ $data_member->nama }}</td>
                        <td>{{ $data_member->email }}</td>
                        <td>{{ $data_member->no_handphone }}</td>
                        <td>{{ $data_member->last_login }}</td>
                        <td>
                            <a href="/member/profil/{{ $data_member->uid }}"><i class=" fa fa-eye"></i></a>
                            <a href="/member/edit/{{ $data_member->uid }}"><i class=" fa fa-edit"></i></a>
                            <a href="/member/hapus/{{ $data_member->uid }}"><i class=" fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

