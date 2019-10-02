// Ajax load
function load(link,place){
	var xhr = new XMLHttpRequest();
	place = document.getElementById(place)
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			place.innerHTML = xhr.responseText;
		}else{
			place.innerHTML = "Loading...";
		}
	}

	xhr.open('GET', link, true);
	xhr.send();
}
function show(){
	if(this.files && this.files[0]){
		var obj = new FileReader();
		obj.onload = function(data){
			var image = document.getElementById("image");
			image.src = data.target.result;
			image.style.opacity = "1";
		}
		obj.readAsDataURL(this.files[0]);
	}
}


// Show hide Password
var eye = document.getElementById('eyepassword');
var pass = document.getElementById('password');
var stat = true;
eye.addEventListener('click', function(){
	if(stat == true){
		eye.innerHTML = "<i class='fas fa-eye'></i>";
		pass.type = "text";
		stat = false;
	}else{
		eye.innerHTML = "<i class='far fa-eye-slash'></i>";
		pass.type = "password";
		stat = true;
	}
});



