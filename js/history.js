"use strict";

(function () {
    function checkIsEmpty() {
        var table = document.querySelector('tbody');
        var tableContent = document.querySelectorAll('table tbody tr');

        if (!tableContent.length) {
            table.innerHTML = ""
                + "<p>"
                    + "You haven't take any quizz!"
                + "</p>";
        }
    }
    function renderLogo() {
		var logoBtn = document.getElementById("head__logo--img");
		logoBtn.onclick = function () {
			window.location.href = "user-menu.php";
		};
	}

    checkIsEmpty();
    renderLogo();
})();