$(function(){
	$("#submit-register").click(function() {

		if($("input[name='fullname']").val() !== "" && $("input[name='email']").val() !== "" && $("input[name='username']").val() !== "" && $("input[name='password']").val() !== "")
			$.ajax({
				type: "post",
				url: "send_request_email.php",
				data: $("#register_form").serialize(),
				success: function(response) {
					prompt("", response);
				}
			}).done(function() {
				alert("Request email has been sent");
				location.reload();
			});
		else
			alert("Please fill in required input");
	});

	$("#submit-login").click(function() {

		$.ajax({
			type: "post",
			url: "login.php",
			data: $("#login_form").serialize(),
			success: function(response) {
				if (response === "invalid") {
					alert("Invalid username/password. Please try again");
					$("input[name='loginPassword']").val("");
				}
				else if (response === "success") {
					location.reload();
				}
				else {
					alert("Login error. Please try again");
				}
        	}
		});
	});

	$("#submit-contact-us").click(function() {

		$.ajax({
			type: "post",
			url: "submit_contact_us.php",
			data: $("#contact_form").serialize()
		}).done(function() {
			alert("Message has been sent");
			location.reload();
		});
	});

	$("#submit-settings").click(function() {

		$.ajax({
			type: "post",
			url: "save_settings.php",
			data: $("#settings_form").serialize()
		}).done(function() {
			alert("Settings saved");
			location.reload();
		});
	});
});