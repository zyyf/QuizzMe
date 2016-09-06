"use strict";

(function () {

	function checkQInput() {
		var i;

		for (i = 1;i <= 10;i++) {
			var single = document.querySelectorAll(".single-choice__option-list--label input[name='single-choice" + i + "']");

			if (!Array.from(single).some(function (e) {
				return e.checked;
			})) {
				return false;
			}
		}
		for (i = 1;i <= 10;i++) {
			var multiple = document.querySelectorAll(".multiple-choice__option-list--label input[name='multiple-choice" + i + "']");

			if (!Array.from(multiple).some(function (e) {
				return e.checked;
			})) {
				return false;
			}
		}
		return true;
	}
	function submitConfirm() {
		var form = document.querySelector('form');

		form.onsubmit = function () {
			if (!checkQInput()) {
				if (!confirm("There are some questions not be done, are you sure you want to submit this quiz?")) {
					return false;
				}
			}
		}
	}

	submitConfirm();
})();