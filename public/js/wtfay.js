

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