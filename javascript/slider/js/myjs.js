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

var z_index = []; //contain z-index of elements of the picture
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

	for (var picIndex = 0; picIndex < num_pic; picIndex++) { 
		z_index[picIndex] = [];
		pic[picIndex] = [];

		var id_under_pic = "under_pic_" + picIndex;
		under_pic[picIndex] = document.getElementById(id_under_pic);

		for (var rowIndex = 0; rowIndex < num_row; rowIndex++) { //make rows
			z_index[picIndex][rowIndex] = [];
			pic[picIndex][rowIndex] = [];
 
			for (var colIndex = 0; colIndex < num_col; colIndex++) { //make columns
				z_index[picIndex][rowIndex][colIndex] = num_pic - tmp_1;

				var div_node  = document.createElement("div");
				paren.appendChild(div_node);

				var id_string = "";
				var g_1 = picIndex + 1;
				id_string = "pic" + g_1 + "_" + rowIndex + "_" + colIndex;
				paren.lastChild.setAttribute("id", id_string);

				var width_square = pic_width/num_col;
				paren.lastChild.style.width = width_square + "px";

				var height_square = pic_height/num_row;
				paren.lastChild.style.height = height_square + "px";

				paren.lastChild.style.position = "absolute";

				var top_pixel = height_square * rowIndex;
				var left_pixel = width_square * colIndex;
				paren.lastChild.style.top = top_pixel + "px";
				paren.lastChild.style.left = left_pixel + "px";

				paren.lastChild.style.zIndex = z_index[picIndex][rowIndex][colIndex];

				paren.lastChild.style.background = 
				back_img[picIndex] + ' -' + left_pixel + 'px' + ' -' + top_pixel + 'px';

				pic[picIndex][rowIndex][colIndex] = document.getElementById(id_string);
			}
		} //end rowIndex
		tmp_1++;
	}//end picIndex

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
				for (var row = 0; row < num_row; row++) {
					for (var col = 0; col < num_col; col++) {
						z_index[g][row][col]--;
						pic[g][row][col].style.zIndex = z_index[g][row][col];
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

	for (var row = 0; row < num_row; row++) {
		if (row%2 == sodu_2[num_clear][0]) {
			for (var col = 0; col < num_col; col++) {
				if (col%2 == sodu_2[num_clear][1]) {
					z_index[pics_index][row][col] = 0;
					pic[pics_index][row][col].style.zIndex = z_index[pics_index][row][col];
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
				for (var row = 0; row < num_row; row++) {
					for (var col = 0; col < num_col; col++) {
						z_index[g][row][col]++;
						pic[g][row][col].style.zIndex = z_index[g][row][col];
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

	for (var row = 0; row < num_row; row++) {
		if (row%2 == sodu_2[num_increase][0]) {
			for (var col = 0; col < num_col; col++) {
				if (col%2 == sodu_2[num_increase][1]) {
					z_index[pics_index - 1][row][col] = num_pic - 1;
					pic[pics_index - 1][row][col].style.zIndex = z_index[pics_index - 1][row][col];
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
	for (var row = 0; row < num_row; row++) {
		for (var col = 0; col < num_col; col++) {				
			z_index[pic_show][row][col] = num_pic - 1;
			pic[pic_show][row][col].style.zIndex = z_index[pic_show][row][col];				
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
		
		for (var row = 0; row < num_row; row++) {
			for (var col = 0; col < num_col; col++) {				
				z_index[x][row][col] = num_pic - 2 - g;
				pic[x][row][col].style.zIndex = z_index[x][row][col];				
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