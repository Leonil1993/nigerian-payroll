'use strict';

class Ajax {
    //const ajax = new Ajax(props:{callBack:callBack function,path:'path string', name:'name string or null', method:'method string': url:'url string'});
  	static $(props, func){
  		// xmlhttp
	  	try{
			const xmlHttp = new XMLHttpRequest();
			//const path = "/payroll/server/api/request.php";
			xmlHttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			        try {
			        	console.log(this.responseText);
			        	func === null ? JSON.parse(this.responseText) : func(JSON.parse(this.responseText), null);
			        } catch (err) {
			        	console.log(err)
			        	func === null ? JSON.parse(this.responseText) : func(JSON.parse(this.responseText), err);
			        }
			    }
			}
			xmlHttp.open(props.methods, props.path, true);
			xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlHttp.send(props.url);	
		}catch (err){
			//console.log(err);
		}
	}
}

class For{
	static $(elements, action, value){
		for(let element of Array.from(elements)){
			if(action == "innerText")element.innerText = value;
			if(action == "value")element.value = value;
		}
	}
}

class Event{
	static $(elem,ev,f){
		elem.addEventListener(ev, f);
	}
}

class S{
	static $(e){
		return document.querySelector(`${e}`);
	}
}

class SA{
	static $(e){
		return document.querySelectorAll(`${e}`);
	}
}
class Num{
	static $(n){
		return parseFloat(n).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
	}
}
class DateToInt{
	static $(string){
		let str; 
		str = string.replace('-',"");
		str = str.replace('-',"");
		return parseInt(str);
	}
}
class YearToInt{
	static $(string){
		let str; 
		str = string.slice(0,string.length-4);
		return parseInt(str);
	}
}
