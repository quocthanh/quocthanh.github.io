/*
making slider, a number of pictures is num_pic, each picture is divided into rows and columns to create many elements <div>
The pictures has different z-indexs to show on the web page, 
when user click on buttons, functions will change z-index of pictures
*/



var pics_index = 0; //index of the pic which has highesht z-index

var id; //clear timer

var num_row = 0;
var num_col = 0;
var num_pic = 0;

var num_clear = 0;
var num_increase = 0;

var timer_Flag = 0;

var z = []; //contain z-index of elements of the picture
var pic = [];// refer to elements of the picture

var under_pic = [];


/*init(): create <div> elements of pics
with id, css, background
num_pic_input: pictures number 
num_row_input:  row number 
num_col_input: column number
*/

function init(num_pic_input, num_row_input, num_col_input, pic_width, pic_height) {

	num_row = num_row_input;
	num_col = num_col_input;
	num_pic = num_pic_input;

	var back_img = []; //background-image

	back_img[0] = 'url("img/111126_kis_manzara_resmi_hareketli_2.jpg")';
	back_img[1] = 'url("img/Featured-Image1.jpg")';
	back_img[2] = 'url("img/36488_2.jpg")';
	back_img[3] = 'url("img/Snow-Wallpapers-10_2.jpg")';

	var tmp_1 = 1;
	var paren = document.getElementById("pics");

	for (var g = 0; g < num_pic; g++) { 
		z[g] = [];
		pic[g] = [];

		var id_under_pic = "under_pic_" + g;
		under_pic[g] = document.getElementById(id_under_pic);

		for (var r = 0; r < num_row; r++) { //make rows
			z[g][r] = [];
			pic[g][r] = [];
 
			for (var c = 0; c < num_col; c++) { //make columns
				z[g][r][c] = num_pic - tmp_1;

				var div_node  = document.createElement("div");
				paren.appendChild(div_node);

				var id_string = "";
				var g_1 = g + 1;
				id_string = "pic" + g_1 + "_" + r + "_" + c;
				paren.lastChild.setAttribute("id", id_string);

				var width_square = pic_width/num_col;
				paren.lastChild.style.width = width_square + "px";

				var height_square = pic_height/num_row;
				paren.lastChild.style.height = height_square + "px";

				paren.lastChild.style.position = "absolute";

				var top_pixel = height_square*r;
				var left_pixel = width_square*c;
				paren.lastChild.style.top = top_pixel + "px";
				paren.lastChild.style.left = left_pixel + "px";

				paren.lastChild.style.zIndex = z[g][r][c];

				paren.lastChild.style.background = back_img[g] + ' -' + left_pixel + 'px' + ' -' + top_pixel + 'px';

				pic[g][r][c] = document.getElementById(id_string);
			}
		} //end r
		tmp_1++;
	}//end g

	change_highlight(0);

	setInterval(function() { slide(1); }, 5000);
}

/*slide: turn on timer to change z-index of pictures
direct: the direction pictures will be slided

*/

function slide(direct) {

    if (timer_Flag == 0) {
	timer_Flag = 1;

	if (direct == 0) {
		if (pics_index == 0) {
			pics_index = num_pic;
		}
		
		for (var g = 0; g < num_pic; g++) {
			if (g != (pics_index - 1)) {
				for (var r = 0; r < num_row; r++) {
					for (var c = 0; c < num_col; c++) {
						z[g][r][c]--;
						pic[g][r][c].style.zIndex = z[g][r][c];
					}
				}
			}
		}
		
		id = setInterval(increase_z, 200);
	} else {
		id = setInterval(clear_z, 200);
	}
    }
}

/*assign 0 to z-index of the <div> elements of the pic whose z-index is highest

increase z-index of others 
*/

function clear_z() {

	var sodu_2 = [];
	sodu_2[0] = [0, 0];
	sodu_2[1] = [1, 1];
	sodu_2[2] = [0, 1];
	sodu_2[3] = [1, 0];

	for (var r = 0; r < num_row; r++) {
		if (r%2 == sodu_2[num_clear][0]) {
			for (var c = 0; c < num_col; c++) {
				if (c%2 == sodu_2[num_clear][1]) {
					z[pics_index][r][c] = 0;
					pic[pics_index][r][c].style.zIndex = z[pics_index][r][c];
				}
			}
		}
	}

	if (num_clear == 3) {
		num_clear = 0;

		clearInterval(id);
		timer_Flag = 0;

		for (var g = 0; g < num_pic; g++) {
			if (pics_index != g) {
				for (var r = 0; r < num_row; r++) {
					for (var c = 0; c < num_col; c++) {
						z[g][r][c]++;
						pic[g][r][c].style.zIndex = z[g][r][c];
					}
				}
			}
		}

		if (pics_index == (num_pic - 1)) {
			pics_index = 0;
		} else {
			pics_index++;
		}

		change_highlight(pics_index);
	} else {
		num_clear++;
	}
}

/*
assign the highest z-index value to the <div> elements of the pic which has the lowest z-index

*/

function increase_z() {

	var sodu_2 = [];
	sodu_2[0] = [1, 0];
	sodu_2[1] = [0, 1];
	sodu_2[2] = [1, 1];
	sodu_2[3] = [0, 0];

	for (var r = 0; r < num_row; r++) {
		if (r%2 == sodu_2[num_increase][0]) {
			for (var c = 0; c < num_col; c++) {
				if (c%2 == sodu_2[num_increase][1]) {
					z[pics_index - 1][r][c] = num_pic - 1;
					pic[pics_index - 1][r][c].style.zIndex = z[pics_index - 1][r][c];
				}
			}
		}
	}

	if (num_increase == 3) {
		num_increase = 0;

		clearInterval(id);
		timer_Flag = 0;

		pics_index--;

		change_highlight(pics_index);
	} else {
		num_increase++;
	}
}

/*change pictures when user click on the small pics below slider

*/

function fast_change(pic_show) {
    if (timer_Flag == 0) {
	for (var r = 0; r < num_row; r++) {
		for (var c = 0; c < num_col; c++) {				
			z[pic_show][r][c] = num_pic - 1;
			pic[pic_show][r][c].style.zIndex = z[pic_show][r][c];				
		}		
	}
	pics_index = pic_show;

	var x = pic_show;
	for (var g = 0; g < (num_pic - 1); g++) {

		if (x < (num_pic - 1)) {
			x += 1;
		} else {
			x = 0;
		}
		
		for (var r = 0; r < num_row; r++) {
			for (var c = 0; c < num_col; c++) {				
				z[x][r][c] = num_pic - 2 - g;
				pic[x][r][c].style.zIndex = z[x][r][c];				
			}		
		}
	}

	change_highlight(pics_index);
    }
}

/*highlight the small pic

*/

function change_highlight(index) {
	under_pic[index].style.border = "solid 3px indigo";

	for (var g = 0; g < num_pic; g++) {
		if (g != index) {
			under_pic[g].style.border = "none";
		}
	}
}