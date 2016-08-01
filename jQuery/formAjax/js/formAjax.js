/*add event handler to elements

*/
$(function() {
	$('#date').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: '-50:+50',
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
		buttonImage: 'img/calendar_2.png',
		buttonImageOnly: true,
		buttonText: 'Choose'
	});

	$('#ajax_sub').click(function() {
		submit_func();
	});

	$('#ajax_ref').click(function() {
		refresh_func();
	});
});

/*check input values, then
send the username to server
using AJAX

*/
function submit_func() {
	if (check_value()) {
		var name = $('#user_name').val();

		$.get("php/check.php", "name=" + name, function(data) {
			if (data) {
				$('#name_notify').text("This name's already existed!");
			} else {
				$('#name_notify').text("Congrat! Your account was created");
			}
		});
	}
}

/*check input value base on requirement

*/
function check_value() {
	var bool = false;

	bool = check_username();

	bool &= check_password();

	bool &= check_email();

	bool &= check_birthday();

	return bool;
}

function check_username() {
	var name = $("#user_name");

	if (name.val().length < 8) {
		$("#name_notify").text("Username length min 8 letter");
		return false;
	} else {
		$("#name_notify").text("");
		return true;
	}
}

function check_password() {
	var pass = $('#user_password');

	if (pass.val().length < 8) {
		$('#pass_notify').text("Password length min 8 letter");
		return false;
	} else {
		$('#pass_notify').text("");
		return true;
	}
}

function check_email() {
	var em = $('#user_email');

	var emailReg = /[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}/;

	if (em.val().search(emailReg) >= 0) {
		$('#email_notify').text("");
		return true;
	} else {
		$('#email_notify').text("Email wrong format");
		return false;
	}
}

function check_birthday() {
	var bir = $('#date')

	if (bir.val().length > 0) {
		$('#birth_notify').text("");
		return true;
	} else {
		$('#birth_notify').text("Please choose your birthday");
		return false;
	}
}

/*clear the inputs

*/
function refresh_func() {
	$('input').val("");

	$('tr td:nth-child(3)').text("");
}