
var fname = document.forms['form']['fname'];
var lname = document.forms['form']['lname'];
var email = document.forms['form']['email'];
var subject = document.forms['form']['subject'];
var comment = document.forms['form']['text'];

var fname_error = document.getElementById('fname_error');
var lname_error = document.getElementById('lname_error');
var email_error = document.getElementById('email_error');
var sub_error = document.getElementById('sub_error');
var comt_error =document.getElementById('comt_error');

var success = document.getElementById('sux');

fname.addEventListener('textInput', fname_Verify);
lname.addEventListener('textInput', lname_Verify);
email.addEventListener('textInput', email_Verify);
subject.addEventListener('textInput', subject_Verify);
comment.addEventListener('textInput', comment_Verify);

function validated() {	
	if (fname.value.length < 2 ) {
		fname.style.border = "1px solid red";
		fname_error.style.display = "block";
		fname.focus();
		return false;
	}

	if (lname.value.length < 2 ) {
		lname.style.border = "1px solid red";
		lname_error.style.display = "block";
		lname.focus();
		return false;
	}

	if (email.value.length < 8) {
		comment.style.border = "1px solid red";
		email_error.style.display = "block";
		email.focus();
		return false;
	}

	if (subject.value.length < 4) {
		comment.style.border = "1px solid red";
		sub_error.style.display = "block";
		subject.focus();
		return false;
	}

	if (comment.value.length < 10) {
		comment.style.border = "1px solid red";
		comt_error.style.display = "block";
		comment.focus();
		return false;
	}

	alert('successfully! sent.');
	// success.style.display = "block";

}


function fname_Verify() {
	if (fname.value.length >= 2) {
		fname.style.border = "1px solid skyblue";
		fname_error.style.display = "none";
		return true;
	}
}

function lname_Verify() {
	if (lname.value.length >= 2) {
		lname.style.border = "1px solid skyblue";
		lname_error.style.display = "none";
		return true;
	}
}

function email_Verify() {
	if (email.value.length >= 8) {
		email.style.border = "1px solid skyblue";
		email_error.style.display = "none";
		return true;
	}
}

function subject_Verify() {
	if (subject.value.length >= 4) {
		subject.style.border = "1px solid skyblue";
		sub_error.style.display = "none";
		return true;
	}
}

function comment_Verify() {
	if (comment.value.length >= 10) {
		comment.style.border = "1px solid skyblue";
		comt_error.style.display = "none";
		return true;
	}
}


/*var success = document.getElementById('sux');
function the_success() {
	alert('successfully! sent.');
	success.style.display = "block";
}*/









