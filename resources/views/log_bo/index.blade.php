@extends('layouts.app', ['activePage' => 'log_bo', 'titlePage' => __('Member List')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title "> Admin Log Activity </h4>
                <p class="card-category"> Here you can look of admin log</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary text-center">
                        <th style="width:5%;" scope="col">#</th>
                        <th style="width:15%;">Tanggal</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach ($log_bo as $bo)
                        <tr>
                            <td> {{ $no++.'.'}} </td>
                            <td> {{ $bo->waktu_proses }} </td>
                            <td> {{ 'Member ' }}
                                <span class="font-weight-bold text-lg"> {{ $bo->uid_member }} </span>       
                                {{ 'telah di ' }}                            
                                <span class="text-danger">{{ $bo->route }}</span>
                                {{ 'oleh Admin ' }}
                                <span class="text-primary"> {{ $bo->name }}
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
@endsection