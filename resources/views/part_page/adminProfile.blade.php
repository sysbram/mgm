<div class="card-avatar">
    <div class="avatar y100 radius100 profile fs30 bg-white">
        @if(!$admin->foto)
        <i class="fas fa-user-alt op-5"></i>
        @endif
        <img class="img" onclick="test()" style="width:100%; height:100%" src="{{asset('Images/admin/' . $admin->uid . '/' . $admin->foto)}}">
    </div>
</div>
<div class="card-body">
<h6 class="card-category text-gray">@if($admin->status_admin == 1)Super Admin @else Regular Admin @endif</h6>
<h4 class="card-title">{{$admin->name}}</h4>
<p class="card-description">
    @if(isset($admin->description))
        {{$admin->description}}
    @else
        You have no description, click button edit to add it !
    @endif
</p>
<button class="btn btn-warning float-right" onclick="load('{{url('/')}}'+'/{{$admin->id}}/partAdminProfileEdit','adminProfile');">EDIT</button>
</div>