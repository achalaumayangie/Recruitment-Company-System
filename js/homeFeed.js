function nextFeed(val){
	var com = document.getElementById('com');
	var button = document.getElementById('nButton');

	if (document.getElementById('f'+(val+1))) {

		document.getElementById('f'+(val)).style.display = "none";
		
		document.getElementById('f'+(val+1)).style.display = "block";
		button.setAttribute("onclick","nextFeed("+(val+1)+")");
	}
}