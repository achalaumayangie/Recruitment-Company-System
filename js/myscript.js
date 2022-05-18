function checkpassword(){
	 if (document.getElementById("pwd").value!= document.getElementById("rpwd").value){
		 alert("passwords are mismatched!!");
	     return false;
    }	 
	  else{
		  alert("passwords are matched!!");
		  return true;
	}
	  
}
 
function enablebutton(){
	    if (document.getElementById("terms").checked){
		     document.getElementById("button").disabled=false;
			 
        }
		else{
			 document.getElementById("button").disabled=true;
		}
}	


