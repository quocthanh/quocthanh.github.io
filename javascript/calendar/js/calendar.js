window.onload = init;

var elem = document.getElementById("test");

function init() {
	event_assign();

	createYearList();
}

function event_assign() {
	document.getElementById("calendar_img").onclick = function() { show_calendar(); };

	document.getElementById("pre_year").onclick = toPreYear;
	document.getElementById("pre_month").onclick = toPreMonth;
	document.getElementById("next_year").onclick = toNextYear;
	document.getElementById("next_month").onclick = toNextMonth;

	document.getElementById("month_select").onchange = change_calendar;
	document.getElementById("year_select").onchange = change_calendar;
}

function show_calendar() {
	var cal = document.getElementById("calendar");
	
    	if (cal.style.display != "block") {
		var today = new Date();
		var x = document.getElementById("month_select");
		var y = document.getElementById("year_select");

		x.selectedIndex = today.getMonth();
		y.selectedIndex = today.getFullYear() - 1990;

		change_calendar();

		cal.style.display = "block";
    	}
}

function hide_calendar() {
	var cal = document.getElementById("calendar");

	cal.style.display = "none";
}

function change_calendar() {
	var x     = document.getElementById("month_select");
	var y     = document.getElementById("year_select");
	var month = x.selectedIndex;
	var year  = y.selectedIndex + 1990;

	var date = new Date(year, month);
	var tmp =  new Date(year, month + 1, 0);
	var d = new Date();

	var x = tmp.getDate() - (7 - date.getDay());
	x = x/7;
	var row = Math.ceil(x) + 1;

	clear_table();
	create_table(row, 7);

	var r = 3;
	var c = date.getDay() + 1;
	for (var g = 0; g < tmp.getDate(); g++) {	
		var tb_cell_tmp = document.querySelectorAll("#calendar_tb > tbody > tr:nth-of-type(" + r + ") > td:nth-of-type(" + c + ")");
		tb_cell_tmp[0].childNodes[0].nodeValue = g + 1;

		if (c < 7) {
			c++;
		} else {
			r++;
			c = 1;
		}
	}

	if ((month == d.getMonth()) && (year == d.getFullYear())) {
		date_highlight();
	}
}

function create_table(row, col) {
	for (var r = 0; r < row; r++) {
		var tb_row = document.createElement("tr");

		for (var c = 0; c < col; c++) {
			var tb_cell = document.createElement("td");
			var textnode = document.createTextNode("");
			tb_cell.appendChild(textnode);

			var func_string = "";
			func_string = "show_date(" + (r + 3) + ", " + (c + 1) + ")";
			tb_cell.setAttribute("onclick", func_string); 

			tb_row.appendChild(tb_cell);
		}

		var tb = document.getElementById("calendar_tb");
		var tb_body = tb.childNodes[1];
		tb_body.appendChild(tb_row);
	}	
}

function clear_table() {
	var tb_row_tmp = document.querySelectorAll("#calendar_tb > tbody > tr:nth-of-type(3)");
	var tb = document.getElementById("calendar_tb");
	var tb_body = tb.childNodes[1];
	
	while (tb_row_tmp[0]) {
		tb_body.removeChild(tb_row_tmp[0]);
		tb_row_tmp = document.querySelectorAll("#calendar_tb > tbody > tr:nth-of-type(3)");
	}
}

function show_date(row, col) {
	var date_box = document.getElementById("date");
	var tb_cell_tmp = document.querySelectorAll("#calendar_tb > tbody > tr:nth-of-type(" + row + ") > td:nth-of-type(" + col + ")");
	
	var x = document.getElementById("month_select");
	var y = document.getElementById("year_select");

 	if (tb_cell_tmp[0].childNodes[0].nodeValue != "") {
		var date_string = tb_cell_tmp[0].childNodes[0].nodeValue + "/" + (x.selectedIndex + 1) + "/" + (y.selectedIndex + 1990);
		date_box.value = date_string;

		hide_calendar();
	}
}

function toPreYear() {
	var x = document.getElementById("month_select");
	var y = document.getElementById("year_select");

	if (y.selectedIndex > 0) {
		y.selectedIndex--;
	} else {
		y.selectedIndex = y.length - 1 ;
	}

	change_calendar();
}

function toPreMonth() {
	var x = document.getElementById("month_select");
	var y = document.getElementById("year_select");

	if (x.selectedIndex > 0) {
		x.selectedIndex--;
	} else {
		x.selectedIndex = 11;

		if (y.selectedIndex > 0) {
			y.selectedIndex--;
		} else {
			y.selectedIndex = y.length - 1 ;
		}
	}

	change_calendar();
}

function toNextYear() {
	var x = document.getElementById("month_select");
	var y = document.getElementById("year_select");

	if (y.selectedIndex < y.length - 1) {
		y.selectedIndex++;
	} else {
		y.selectedIndex = 0;
	}

	change_calendar();
}

function toNextMonth() {
	var x = document.getElementById("month_select");
	var y = document.getElementById("year_select");

	if (x.selectedIndex < 11) {
		x.selectedIndex++;
	} else {
		x.selectedIndex = 0;

		if (y.selectedIndex < y.length - 1) {
			y.selectedIndex++;
		} else {
			y.selectedIndex = y.length - 1 ;
		}
	}

	change_calendar();
}

function date_highlight() {
	var today = new Date();
	var first_date = new Date(today.getFullYear(), today.getMonth());

	var x = today.getDate() - (7 - first_date.getDay());

	if (x > 0) {
		x = Math.ceil(x/7) + 3;
	} else {
		x = 3;
	}

	var row = x;
	var col = today.getDay() + 1;

	var tb_cell_tmp = document.querySelectorAll("#calendar_tb > tbody > tr:nth-of-type(" + row + ") > td:nth-of-type(" + col + ")");
	tb_cell_tmp[0].style.border = "solid 2px";
	
}

function createYearList() {

	var x = document.getElementById("year_select");

	for (var g = 0; g < 50; g++) {
		var y = document.createElement("option");
		y.text = 1990 + g;
		y.value = 1990 + g;
		x.options.add(y);
	}
}