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
		var img = document.getElementById('head__user-info--img');
		var name = document.getElementById('head__user-info--name');
		var margin;

		margin = (150 - (parseInt(window.getComputedStyle(img).width) + parseInt(window.getComputedStyle(name).width)))/2 + "px";
		if (window.getComputedStyle(userAvatar).width == "150px") {
			img.style.marginLeft = margin;
			name.style.marginRight = margin;
		}
		Array.from(menu).forEach(function (element) {
			element.style.width = window.getComputedStyle(userAvatar).width;
		});
	}

	renderMenu();
	menuAction();
})();