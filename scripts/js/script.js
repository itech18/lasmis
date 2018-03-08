$(document).ready(function(){
	$("#myModal").modal('show');
	$("#myModal").modal({backdrop: "static"});
});
function showDisability(value){
	
	if (value=="Yes"){
		document.getElementById("disability").style.display="block";
	
		}
	
	else{
		document.getElementById("disability").style.display="none";
		
	}
}
function showAllargies(value){
	
	if (value=="Yes"){
		document.getElementById("allagies").style.display="block";
	
		}
	
	else{
		document.getElementById("allagies").style.display="none";
		
	}
}
function showTransport(value){
	
	if (value=="Yes"){
		document.getElementById("transport").style.display="block";
	
		}
	
	else{
		document.getElementById("transport").style.display="none";
		
	}
}