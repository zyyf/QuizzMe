"use strict";

(function () {
	function menuAction() {
		var userAvatar = document.getElementById("head__user-info");
		var menu = document.getElementById("head__menu");
		var menuAndAvatar = document.getElementById("head__menu-action");

		userAvatar.onmouseover = function () {
			menu.className = "head__menu-visible";
		};
		menu.onmouseover = function () {
			menu.className = "head__menu-visible";
		}
		menu.onmouseout = function () {
			menu.className = "";
		}
		userAvatar.onmouseout = function () {
			menu.className = "";
		}
	}
	function renderMenu() {
		var menu = document.querySelectorAll(".head__menu--choice");
		var userAvatar = document.getElementById("head__user-info");

		menu.forEach(function (element) {
			element.style.width = window.getComputedStyle(userAvatar).width;
		});
	}

	renderMenu();
	menuAction();
})();