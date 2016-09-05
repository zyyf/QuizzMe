"use strict";

(function () {
	function errorCheck() {
		var errornum = document.getElementById('errornum');

		switch (errornum.innerHTML) {
			case "1":
				var signupaccount = document.getElementById('signup__form--account');
				var signuperror = document.getElementById('signup__form--error');
				var signUpForm = document.querySelectorAll(".form-hidden")[0];

				signupaccount.style.border = "2px solid #f00";
				signuperror.style.display = "inline";
				signUpForm.className = "form-visible";
				break;
			case "3":
				var signinaccount = document.getElementById('signinaccount');
				var signinerrorA = document.getElementById('signin__form--accounterror');
				var signInForm = document.querySelectorAll(".form-hidden")[1];

				signinaccount.style.border = "2px solid #f00";
				signinerrorA.style.display = "inline";
				signInForm.className = "form-visible";
				break;
			case "2":
				var signinpassword = document.getElementById('signinpassword');
				var signinerrorP = document.getElementById('signin__form--passworderror');
				var signInForm = document.querySelectorAll(".form-hidden")[1];

				signinpassword.style.border = "2px solid #f00";
				signinerrorP.style.display = "inline";
				signInForm.className = "form-visible";
				break;
		}
	}
    function renderSignForm() {
		var signInBtn = document.getElementById("signin-link");
		var signUpBtn = document.getElementById("signup-link");
		var signInForm = document.querySelectorAll(".form-hidden")[1];
		var signUpForm = document.querySelectorAll(".form-hidden")[0];
		var floatBack = document.querySelectorAll(".close");
		var signInLink = document.getElementById("signup__form--signin");
		var signUpLink = document.getElementById("signin__form--signup");

		signInBtn.onclick = function () {
			signUpForm.className = "form-hidden";
			signInForm.className = "form-visible";
		};
		signInLink.onclick = function () {
			signUpForm.className = "form-hidden";
			signInForm.className = "form-visible";
		};
		signUpBtn.onclick = function () {
			signInForm.className = "form-hidden";
			signUpForm.className = "form-visible";
		};
		signUpLink.onclick = function () {
			signInForm.className = "form-hidden";
			signUpForm.className = "form-visible";
		};
		Array.from(floatBack).forEach(function (element) {  //in Chrome can use floatback.foreach
			element.onclick = function () {
				signInForm.className = "form-hidden";
				signUpForm.className = "form-hidden";
			};
		});
	}

    renderSignForm();
	errorCheck();
})();