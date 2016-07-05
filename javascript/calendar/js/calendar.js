window.onload = init;

var elem = document.getElementById("test");

function init() {
	document.body.style.backgroundColor = "aqua";

	var date_box = document.getElementById("date");
	date_box.onfocus = function() { show_calendar(2016, 6); };
	date_box.onblur  = hide_calendar;

	createYearList();
}

function show_calendar(year, month) {
	var date_box = document.getElementById("date");
	date_box.style.background = "red";

	var date = new Date(year, month);
	var tmp =  new Date(year, month + 1, 0);
	var d = new Date();

	var row;
	var x = tmp.getDate() - (7 - date.getDay());
	x = x/7;
	row = Math.ceil(x) + 1;
	//elem.innerHTML = x;
	//elem.innerHTML = tmp.getDate();
	//elem.innerHTML = d.getDay();
	//date.getDay()

	create_table(row, 7);

	var r = 3;
	var c;
	for (var g = 0; g < tmp.getDate(); g++) {

		c = date.getDay() + 1;
	
		var tb_cell_tmp = document.querySelectorAll("#calendar_tb > tbody > tr:nth-of-type(" + r + ") > td:nth-of-type(" + c + ")");
		elem.innerHTML = tb_cell_tmp[0];
		tb_cell_tmp[0].childNodes[0].nodeValue = "hahaha";
	}	
}

function create_table(row, col) {
	for (var r = 0; r < row; r++) {
		var tb_row = document.createElement("tr");

		for (var c = 0; c < col; c++) {
			var tb_cell = document.createElement("td");
			var textnode = document.createTextNode("vv");
			tb_cell.appendChild(textnode);
			tb_row.appendChild(tb_cell);
		}

		var tb = document.getElementById("calendar_tb");
		var tb_body = tb.childNodes[1];
		tb_body.appendChild(tb_row);
	}		
}

function createYearList() {

	var x = document.getElementById("year_select");

	for (var g = 0; g < 50; g++) {
		var y = document.createElement("option");
		y.text = 1990 + g;
		y.value = 1990 + g;
		x.options.add(y);
	}

	var today = new Date();
	x.selectedIndex = today.getFullYear() - 1990;
}

function hide_calendar() {
	var date_box = document.getElementById("date");
	date_box.style.background = "white";
}
