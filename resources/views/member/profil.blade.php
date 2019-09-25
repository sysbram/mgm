@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Member List')])

@section('content')

<div class="content">
    <div class="container-fluid">
        @if (isset($link_back))
            <a href="/member/profil/{{ $link_back->uid }}"><button class="btn btn-primary">Back</button></a>
        @endif
        <table style="border: 1px;">
            <div class="row" style="height: 220px;">
                <div class="col-md-12 text-center" style="font-size:20px">
                    <i class=" fa fa-user fa-5x"></i><br/>
                        {{ $member_parent->nama }}<br/>
                        {{ $member_parent->email }}<br/>
                        {{ $member_parent->no_handphone }}
                </div>
            </div>

            <div class="row" style="height: 240px;">
                <?php $count = 1; ?>
                @foreach ($member_child as $child)
                    <div class="col-md-4 text-center" style="font-size:15px">
                        <a href="/member/profil/{{ $child->uid }}" style="color:#3C4858"><i class=" fa fa-user fa-5x"></i><br/></a><br/>
                            {{ $child->nama }}<br/>
                            {{ $child->email }}<br/>
                            {{ $child->no_handphone }}
                    </div>
                    <?php $count++ ?>
                @endforeach

                @for($i=$count; $i<=3; $i++)
                    <div class="col-md-4 text-center" style="font-size:15px">
                        <i class=" fa fa-user fa-5x" style="color:grey"></i><br/>
                    </div>
                
                @endfor
            </div>

            <div class="row">
                @foreach ($member_grandchild as $grandchild)
                <div class="col-md-4">
                        <div class="row">
                        <?php $count = 1; ?>
                        @foreach ($grandchild as $grandchilds)
                                <div class="col-md-4 text-center" style="font-size:10px;">
                                    <a href="/member/profil/{{ $grandchilds->uid }}" style="color:#3C4858"><i class=" fa fa-user fa-5x"></i></a><br/>
                                    
                                    {{ $grandchilds->nama }}<br/>
                                    {{ $grandchilds->no_handphone }}<br/>
                                </div>
                        <?php $count++ ?>
                        @endforeach
                            @for ($i=$count; $i<=3; $i++)
                                <div class="col-md-4 text-center" style="font-size:10px;">
                                    <i class=" fa fa-user fa-5x" style="color:grey"></i><br/>
                                </div>
                            
                            @endfor
                        </div>
                </div>
                @endforeach

            </div>
        </table>
    </div>
</div>
@endsection