function addUser(category) {
	// c - mean company form
	// e - mean employee form
	var mainView = document.getElementById('form');

	var employee = document.getElementById('employeeLay');
	var company = document.getElementById('companyLay');

	if (category == 'c') {

		mainView.style.display = 'inline-block';

		employee.style.display = "none";
		company.style.display = "block";

		company.scrollIntoView();
	}else{

		mainView.style.display = 'inline-block';

		company.style.display = "none";
		employee.style.display = "block";

		employee.scrollIntoView();
	}
}