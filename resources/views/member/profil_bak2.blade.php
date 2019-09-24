@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Member List')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <table style="border: 1px;">
            <div class="row" style="height: 200px;">
                <div class="col-md-12 text-center">
                    <i class=" fa fa-user fa-5x"></i><br/>
                    {{ $member_parent->nama }}<br/>
                    {{ $member_parent->email }}
                </div>
            </div>

            
            <div class="row" style="height: 200px;">
                <?php $count = 1; ?>
                @foreach ($member_child as $child)
                    <div class="col-md-4 text-center">
                    <i class=" fa fa-user fa-5x"></i><br/><br/>    
                        {{ $child->nama }}<br/>
                        {{ $child->email }}
                    </div>
                    <?php $count++ ?>
                @endforeach

                <?php for($i=$count; $i<=3; $i++): ?>
                    <div class="col-md-4 text-center">
                        <i class=" fa fa-user fa-5x" style="color:grey"></i><br/>
                    </div>
                
                <?php endfor ?>
            </div>

            <div class="row" style="height: 200px;">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="https://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png"
                                style="width: 60px;">
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </div>
</div>
@endsection