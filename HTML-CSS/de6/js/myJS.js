/* show_trailer_1, show_trailer_2, show_trailer_3: 
thuc hien dong, mo cac khoi movie trailer khi user click vao
*/


function show_trailer_1() {
	var x = document.getElementsByClassName("movie_trailer_1");
	var z = document.querySelectorAll(".movie_bar_1 img");	

	if (x[0].style.display == "none") {
		x[0].style.display = "block";
		z[0].style.marginTop = "10px";
	} else {
		x[0].style.display = "none";
		z[0].style.marginTop = "-15px";
	}
}

function show_trailer_2() {
	var x = document.getElementsByClassName("movie_trailer_2");
	var z = document.querySelectorAll(".movie_bar_2 img");	

	if (x[0].style.display == "none") {
		x[0].style.display = "block";
		z[0].style.marginTop = "10px";
	} else {
		x[0].style.display = "none";
		z[0].style.marginTop = "-15px";
	}
}

function show_trailer_3() {
	var x = document.getElementsByClassName("movie_trailer_3");
	var z = document.querySelectorAll(".movie_bar_3 img");	

	if (x[0].style.display == "none") {
		x[0].style.display = "block";
		z[0].style.marginTop = "10px";
	} else {
		x[0].style.display = "none";
		z[0].style.marginTop = "-15px";
	}
}