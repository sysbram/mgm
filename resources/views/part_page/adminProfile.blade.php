<div class="card-avatar">
    <div class="avatar y100 radius100">
        <img class="img" style="width:100%; height:100%" src="{{asset('Images/admin/' . $admin->name . '/' . $admin->foto)}}">
    </div>
</div>
<div class="card-body">
<h6 class="card-category text-gray">@if($admin->occupation == 1)Super Admin @else Regular Admin @endif</h6>
<h4 class="card-title">{{$admin->name}}</h4>
<p class="card-description">
    @if(isset($admin->description))
        {{$admin->description}}
    @else
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae earum voluptatum reprehenderit!
    @endif
</p>
<button class="btn btn-warning float-right" onclick="load('{{url('/')}}'+'/{{$admin->id}}/partAdminProfileEdit','adminProfile');">EDIT</button>
</div>