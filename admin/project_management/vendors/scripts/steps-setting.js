$(".tab-wizard").steps({
	headerTag: "h2",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#<span> #title#',
	labels: {
		finish: "Submit"
	},

	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
		var index = currentIndex + 1;
		document.getElementById("step").innerHTML = "Step " + index;
		
		
		if (document.getElementById("usernamex").value != null){
			localStorage.setItem("username", document.getElementById("usernamex").value);
			document.getElementById("cct3").innerHTML = localStorage.getItem("username");

			localStorage.setItem("fullname", document.getElementById("fnamesx").value);
			document.getElementById("cct6").innerHTML = localStorage.getItem("fullname");
			document.getElementsByName("names")[0].value = localStorage.getItem("fullname");

			localStorage.setItem("email", document.getElementById("emailx").value);
			document.getElementById("cct5").innerHTML = localStorage.getItem("email");
			document.getElementsByName("emails")[0].value = localStorage.getItem("email");

			localStorage.setItem("phone", document.getElementById("phonex").value);
			document.getElementById("cct4").innerHTML = localStorage.getItem("phone");
			document.getElementsByName("phones")[0].value = localStorage.getItem("phone");

		}		
	},

	onFinished: function (event, currentIndex) {
		passVal(document.getElementsByName("pk")[0].value,localStorage.getItem("username"),localStorage.getItem("fullname"),localStorage.getItem("email"),localStorage.getItem("phone"),document.getElementsByName("password")[0].value,document.getElementsByName("ct")[0].value) ;
		$('#success-modal').modal('show');
	}
});

function passVal(pakej, username, nama,email,phone,password,kenalan){

	$.ajax({
		url: "regprocess.php", // the url we want to send and get data from
		type: "POST", // type of the data we send (POST/GET)
		data: {
			pakej: pakej,
			username: username,
			nama: nama,
			email: email,
			phone: phone,
			password: password,
			kenalan: kenalan
		}, // the data we want to send
		success: function(data){ // when successfully sent data and returned
			// do something with the returned data
			   console.log(data);
		}
	}).done(function(){
		// this part will run when we send and return successfully
		console.log("Success.");
	}).fail(function(){
		// this part will run when an error occurres
		console.log("An error has occurred.");
	}).always(function(){
		// this part will always run no matter what
		  console.log("Complete.");
	});
	
}



$(".tab-wizard2").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#<span> #title#',
	labels: {
		finish: "Submit"
	},
	onStepChanged: function(event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function(event, currentIndex) {
		$('#success-modal-btn').trigger('click');
	}
});
        