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