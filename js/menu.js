"use strict";
(function () {
	function menuAction() {
		var userAvatar = document.getElementById("head__user-info");
		var menu = document.querySelectorAll("#head__menu");
		var menuAndAvatar = document.getElementById("head__menu-action");

		if (menu.length) {
			userAvatar.onmouseover = function () {
				menu[0].className = "head__menu-visible";
			};
			menu[0].onmouseover = function () {
				menu[0].className = "head__menu-visible";
			}
			menu[0].onmouseout = function () {
				menu[0].className = "";
			}
			userAvatar.onmouseout = function () {
				menu[0].className = "";
			}
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
		if (menu.length) {
			Array.from(menu).forEach(function (element) {
				element.style.width = window.getComputedStyle(userAvatar).width;
			});
		}
	}

	renderMenu();
	menuAction();
})();