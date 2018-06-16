// JavaScript Document
var row = null;
function generate(rowId){
	// Get the modal
	row = rowId;
	var modal = document.getElementById('myModal');		
	modal.style.display = "block";
	
	var cancel = document.getElementById("cancel");
	var span = document.getElementsByClassName("close")[0];
	
	cancel.onclick = function(){
		modal.style.display = "none";
	};
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
    	modal.style.display = "none";
	};
	
	var edit = document.getElementById("edit");
	edit.onclick = function() {
		window.location.href = "newEdit.php?q="+rowId;
		/*xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","edit.php?q="+ rowId,false);
		xmlhttp.send(null);
		document.getElementById("d3").innerHTML = xmlhttp.responseText;
		document.getElementById("d2").style.display='none';
		document.getElementById("d1").style.display='none';
		document.getElementById("d3").style.display='block';
		document.getElementById("search").style.display='none';	
		modal.style.display = "none";*/
		};
		
	var del = document.getElementById("delete");
	del.onclick = function() {
		window.location.href = "delete.php?q="+rowId;
		//return true;
		/*var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","delete.php?q="+ rowId,false);
		xmlhttp.send(null);*/
		};	
	
}






/* When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
*/