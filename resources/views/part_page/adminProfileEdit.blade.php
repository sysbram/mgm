<form action="/{{$admin->id}}/edit" method="post" enctype="multipart/form-data">
{{csrf_field()}}

<label for="adminProfileImage">
    <div class="card-avatar y100 radius100 pointer">
        <div class="avatar y100">
        <input type="file" name="file" class="none" id="adminProfileImage">
            <img class="img" style="width:100%; height:100%" src="{{asset('Images/admin/' . $admin->name . '/' . $admin->foto)}}">        
        </div>
    </div>
</label>
    <div class="card-body mb-4">
    <select class="custom-select" name="status_admin" @if(Auth::user()->status_admin != 1) disabled @endif>
        <option>Ocupation</option>
        <option value="1" @if($admin->status_admin == 1) selected @endif> Super Admin </option>
        <option value="2" @if($admin->status_admin == 2) selected @endif> Regullar Admin </option>
    </select>
    <h6 class="card-category text-gray"><input type="text" name="name" focused class="form-control text-center" id="formGroupExampleInput" placeholder="Name" value="{{$admin->name}}"></h6>
    <h4 class="card-title"></h4>
    <p class="card-description">
    <textarea class="form-control text-center" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Description">
    @if(isset($admin->description)){{$admin->description}} @endif
    </textarea>
    </p>
    <button class="btn btn-success btn-round float-right" type="submit">save</a>
    <button class="btn btn-danger btn-round float-right mb-3 mr-2" type="button" onclick="load('{{url('/')}}'+'/{{$admin->id}}/partAdminProfile','adminProfile');">cancel</a>
    </div>
</form>