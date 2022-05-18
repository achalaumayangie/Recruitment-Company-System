function changeOrder(currentOrder){
	var ltt = document.getElementById('ltt');
	var tr = document.getElementById('tr');

	 if (currentOrder == 'tr') {
	 	ltt.classList.remove('active');
	 	tr.classList.add('active');
	 }else{
	 	tr.classList.remove('active');
	 	ltt.classList.add('active');	
	 }
}
