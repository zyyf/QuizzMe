"use strict";

(function () {

	//Change the class of a HTML element
	function editClassName(type, content, name, action, index) {
		if (type === "id") {
			var element = document.getElementById(content);
		}else if (type === "query") {
			var element = document.querySelector(content);
		}else if (type === "queryall") {
			var element = document.querySelectorAll(content)[index];
		}
		var classArray = Array();

		switch (action) {
			case "add":
				classArray = element.className.split(" ");
				if (classArray.every(function(e) {return (e != name);})) {
					classArray.push(name);
					if (classArray[0] == "") {
						classArray.shift();
					}
				}
				element.className = classArray.join(" ");
				break;
			case "delete":
				classArray = element.className.split(" ");
				classArray.forEach(function (e, indexa, array) {
					if (e === name) {
						array.splice(indexa, 1);
					}
				});
				if (classArray[0] == "") {
					classArray.shift();
				}
				element.className = classArray.join(" ");
				break;
			default:
				alert("Wrong!");
		}
	}
	function checkIsInput(section) {
		var element = document.getElementById("Qinput__"+section);

		switch (section) {
			case "type":
				var radioSingle = document.querySelector("#Qinput__type--labels input");
				var radioMultiple = document.querySelector("#Qinput__type--labelm input");

				if (!radioSingle.checked && !radioMultiple.checked) {
					window.location.href = "#Qinput__type";
					editClassName("id", "Qinput__type", "uninput-section", "add");
					return false;
				}else {
					editClassName("id", "Qinput__type", "uninput-section", "delete");
					return true;
				}
				break;
			case "classify":
				var classifySelect = document.getElementById("Qinput__classify--select");
				var newInput = document.getElementById("Qinput__classify--new");

				if (classifySelect.selectedIndex === 0) {
					window.location.href = "#Qinput__classify";
					editClassName("id", "Qinput__classify", "uninput-section", "add");
					return false;
				}else if ((classifySelect.selectedIndex === classifySelect.length - 1) && newInput.value.trim() === "") {
					window.location.href = "#Qinput__classify";
					editClassName("id", "Qinput__classify", "uninput-section", "add");
					editClassName("id", "Qinput__classify--new", "uninput-section", "add");
					return false;
				}else {
					editClassName("id", "Qinput__classify", "uninput-section", "delete");
					editClassName("id", "Qinput__classify--new", "uninput-section", "delete");
					return true;
				}
				break;
			case "title":
				var titleText = document.getElementById("Qinput__title--content");

				if (titleText.value.trim() === "") {
					window.location.href = "#Qinput__title";
					editClassName("id", "Qinput__title", "uninput-section", "add");
					return false;
				}else {
					editClassName("id", "Qinput__title", "uninput-section", "delete");
					return true;
				}
				break;
			case "option":
				var option = document.querySelectorAll("#Qinput__option--list input");
				var isInput = true;

				Array.from(option).forEach(function (element, index) {
					if (element.value.trim() === "") {
						window.location.href = "#Qinput__option";
						editClassName("queryall", "#Qinput__option--list li", "uninput-section", "add", index);
						isInput = false;
					}else {
						editClassName("queryall", "#Qinput__option--list li", "uninput-section", "delete", index);
					}
				});
				if (isInput) {
					return true;
				}else {
					return false;
				}
				break;
			case "ensureoption":
				var confirmButton = document.getElementById("Qinput__option--ensure");

				if (confirmButton.style.visibility == "hidden") {
					editClassName("id", "Qinput__option", "uninput-section", "delete");
					return true;
				}else {
					editClassName("id", "Qinput__option", "uninput-section", "add");
					return false;
				}
			default:
				alert("checkInput() wrong!");
		}
	}
	function renderLogo() {
		var logoBtn = document.getElementById("head__logo--img");
		logoBtn.onclick = function () {
			window.location.href = "user-menu.html";
		};
	}
	function renderRadio() {
		var radioLabels = document.querySelector("#Qinput__type--labels input");
		var radioLabelm = document.querySelector("#Qinput__type--labelm input");

		radioLabels.addEventListener("click", function () {
			editClassName("id", "Qinput__type--labelm", "Qinput__type--labelm-checked", "delete");
			editClassName("id", "Qinput__type--labels", "Qinput__type--labels-checked", "add");
			radioLabels.checked = true;
		});
		radioLabelm.addEventListener("click", function () {
			editClassName("id", "Qinput__type--labels", "Qinput__type--labels-checked", "delete");
			editClassName("id", "Qinput__type--labelm", "Qinput__type--labelm-checked", "add");
			radioLabelm.checked = true;
		});
	}
	function renderClassifySelect() {
		var select = document.getElementById("Qinput__classify--select");
		var classifyinput = document.getElementById("Qinput__classify");
		var newClassify = document.getElementById("Qinput__classify--new");

		select.onchange = function () {
			if (this.selectedIndex === this.length-1) {
				newClassify.style.visibility = "visible";
			}else {
				newClassify.style.visibility = "hidden";
			}
		};
	}
	function deleteOption() {
		var optionList = document.getElementById("Qinput__option--list");
		var optionListNode = document.querySelectorAll("#Qinput__option--list li");
		var deleteButton = document.querySelectorAll("#Qinput__option--list img");

		if (deleteButton) {
			Array.from(deleteButton).forEach(function (element, index) {
				element.addEventListener("click", function () {
					optionList.removeChild(optionListNode[index]);
					editOption("delete");
				});
			});
		}
	}
	function addOption() {
		var addButton = document.getElementById("Qinput__option--add");

		if (addButton) {
			addButton.onclick = function () {
				editOption("add");
			}
		}
	}
	function editOption(action) {
		var optionList = document.getElementById("Qinput__option--list");
		var optionListNode = document.querySelectorAll(".Qinput__option--list-node");
		var inputNodeList = document.querySelectorAll("#Qinput__option--list input");
		var deleteButton = document.querySelectorAll("#Qinput__option--list img");
		var addButton = document.getElementById("Qinput__option--add");
		var listContent = "";

		if (action === "delete") {
			Array.from(inputNodeList).forEach(function (element, index, node) {
				if (node.length < 4) {
					listContent += ""
						+ "<li class='Qinput__option--list-node'>"
							+ "<img src='img/cross.png' class='Qinput__option--hidden'> "
							+ "<label>"
								+ "Option " + (index + 1) + ":<input type='text' name='option"
								+ (index + 1) + "' class='Qinput__option--label' "
								+ "placeholder='Input option here' value='"
								+ inputNodeList[index].value + "'>"
							+ "</label>"
						+ "</li>";
				}else {
					listContent += ""
						+ "<li class='Qinput__option--list-node'>"
							+ "<img src='img/cross.png'> "
							+ "<label>"
								+ "Option " + (index + 1) + ":<input type='text' name='option"
								+ (index + 1) + "' class='Qinput__option--label' "
								+ "placeholder='Input option here' value='"
								+ inputNodeList[index].value + "'>"
							+ "</label>"
						+ "</li>";
				}
			});

			listContent += "<li id='Qinput__option--add'>＋ Add more option</li>";
			optionList.innerHTML = listContent;
			addOption();
			deleteOption();
		}else if (action === "add") {
			Array.from(optionListNode).forEach(function (element, index, node) {
				listContent += ""
					+ "<li class='Qinput__option--list-node'>"
						+ "<img src='img/cross.png'> "
						+ "<label>"
							+ "Option " + (index + 1) + ":<input type='text' name='option"
							+ (index + 1) + "' class='Qinput__option--label' "
							+ "placeholder='Input option here' value='"
							+ inputNodeList[index].value + "'>"
						+ "</label>"
					+ "</li>";
			});
			listContent += ""
				+ "<li class='Qinput__option--list-node'>"
					+ "<img src='img/cross.png'> "
					+ "<label>"
						+ "Option " + (optionListNode.length + 1) + ":<input type='text' name='option"
						+ (optionListNode.length + 1) + "' class='Qinput__option--label' "
						+ "placeholder='Input option here'>"
					+ "</label>"
				+ "</li>"
				+ "<li id='Qinput__option--add'>＋ Add more option</li>";
			optionList.innerHTML = listContent;
			addOption();
			deleteOption();
			if (optionListNode.length > 4) {
				optionList.removeChild(optionList.lastChild);
			}
		}
	}
	function rightAnswerEdit() {
		var confirmButton = document.getElementById("Qinput__option--ensure");
		var editButton = document.getElementById("Qinput__option--edit");
		var optionList = document.getElementById("Qinput__option--list");
		var radioSingle = document.querySelector("#Qinput__type--labels input");
		var radioMultiple = document.querySelector("#Qinput__type--labelm input");
		var inputTextNode = document.querySelectorAll("input[type='text']");
		var saveRadioStatus;
		var content = "";
		var saveContent;
		var saveOptionValue = Array();

		function changeTypeToM() {
			var labelNode = document.querySelectorAll("#Qinput__option--list label");
			var inputNode = document.querySelectorAll("#Qinput__option--list input");

			Array.from(labelNode).forEach(function (e, index) {
				editClassName("queryall", "#Qinput__option--list label", "Qinput__option--list-node-ensure-m"
					, "add", index);
				editClassName("queryall", "#Qinput__option--list label", "Qinput__option--list-node-ensure-s"
					, "delete", index);
			});
			Array.from(inputNode).forEach(function (e) {
				e.type = "checkbox";
			});
		}
		function changeTypeToS() {
			var labelNode = document.querySelectorAll("#Qinput__option--list label");
			var inputNode = document.querySelectorAll("#Qinput__option--list input");

			Array.from(labelNode).forEach(function (e, index) {
				editClassName("queryall", "#Qinput__option--list label", "Qinput__option--list-node-ensure-s"
					, "add", index);
				editClassName("queryall", "#Qinput__option--list label", "Qinput__option--list-node-ensure-m"
					, "delete", index);
			});
			Array.from(inputNode).forEach(function (e) {
				e.type = "radio";
			});
		}

		confirmButton.addEventListener("click", function () {
			Array.from(inputTextNode).forEach(function (element) {
				element.blur();
			});
			if (checkIsInput("option") && checkIsInput("type")) {
				confirmButton.style.visibility = "hidden";
				editButton.style.visibility = "visible";
				radioSingle.addEventListener("click", changeTypeToS);
				radioMultiple.addEventListener("click", changeTypeToM);
				if (radioSingle.checked) {
					var inputNodeList = document.querySelectorAll("#Qinput__option--list input");

					content += "<p>Choose the correct answer.</p>"
					Array.from(inputNodeList).forEach(function (element, index) {
						content += ""
							+ "<label class='Qinput__option--list-node-ensure-s'>"
								+ "<input type='radio' name='option' value='option"
								+ (index + 1) + "'/>Option " + (index + 1) + ":  " + element.value.trim()
							+ "</label>";
						if (!index) {
							saveOptionValue[0] = element.value;
						}else {
							saveOptionValue.push(element.value);
						}
					});
					saveContent = optionList.innerHTML;
					optionList.innerHTML = content;
					content = "";
				}else {
					var inputNodeList = document.querySelectorAll("#Qinput__option--list input");

					content += "<p>Choose the correct answers.</p>"
					Array.from(inputNodeList).forEach(function (element, index) {
						content += ""
							+ "<label class='Qinput__option--list-node-ensure-m'>"
								+ "<input type='checkbox' name='option' value='option"
								+ (index + 1) + "'/>Option " + (index + 1) + ":  " + element.value.trim()
							+ "</label>";
						if (!index) {
							saveOptionValue[0] = element.value;
						}else {
							saveOptionValue.push(element.value);
						}
					});
					saveContent = optionList.innerHTML;
					optionList.innerHTML = content;
					content = "";
				}
			}
		});
		editButton.addEventListener("click", function () {
			var radioSingle = document.querySelector("#Qinput__type--labels input");
			var radioMultiple = document.querySelector("#Qinput__type--labelm input");
			var inputNodeList;

			optionList.innerHTML = saveContent;
			inputNodeList = document.querySelectorAll("#Qinput__option--list input");
			saveOptionValue.forEach(function (e, index) {
				inputNodeList[index].value = e;
			});
			saveOptionValue.splice(0, saveOptionValue.length);
			addOption();
			deleteOption();
			confirmButton.style.visibility = "visible";
			editButton.style.visibility = "hidden";
			radioSingle.removeEventListener("click", changeTypeToS);
			radioMultiple.removeEventListener("click", changeTypeToM);
		});
	}
	function submitCheck() {
		var form = document.getElementById("Qinput");

		form.onsubmit = function () {
			if (!checkIsInput("type")
				|| !checkIsInput("classify")
				|| !checkIsInput("title")
				|| !checkIsInput("ensureoption")) {
				return false;
			}
		};
	}

	renderLogo();
	renderRadio();
	renderClassifySelect();
	addOption();
	deleteOption();
	rightAnswerEdit();
	submitCheck();
})();