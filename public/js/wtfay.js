async('GET','http://localhost/H3P2017/G2/user/9?format=json','',function(xhr){
	console.log(xhr); 
});

var filters=document.querySelectorAll('.index a');
for(var i=0;i<filters.length;i++){
	filters[i].addEventListener('click',function(e){
		e.preventDefault();
		var url=this.getAttribute('href');
		async('GET',url,'',function(xhr){
			document.querySelector('.users').innerHTML=xhr.response; 
		});
	});
}

var input=document.querySelector('input');
input.addEventListener('keyup',function(){
	var str=this.value;
	if(str.length>1){
		var data=new FormData();
		data.append('name',str);
		var url=this.parentNode.getAttribute('action');
		async('POST',url,data,function(xhr){
			document.querySelector('.users').innerHTML=xhr.response; 
		});
	}
	
});

var user=document.getElementById('user');

user.addEventListener('dragover',function(e){
	e.preventDefault();
	this.classList.add('dragover');
});
user.addEventListener('dragleave',function(e){
	e.preventDefault();
	this.classList.remove('dragover');
});
user.addEventListener('drop',function(e){
	e.preventDefault();
	this.classList.remove('dragover');
	var files=e.dataTransfer.files;
	var data=new FormData();
	for(var i in files){
		data.append('file'+i,files[i]);
	}
	async('POST','upload',data,function(xhr){
		console.log(xhr); 
	});
});





function async(verb,url,datas,callback){
	var self=this;
	var xhr = new XMLHttpRequest();
	  xhr.open(verb, url);
		xhr.onload = function() {
		  if(xhr.status === 200){
		   callback.call(self,xhr);
		  }else{
		    console.log('error');
		  }
		}
		xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
		xhr.send(datas);
}