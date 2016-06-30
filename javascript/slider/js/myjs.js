/*

*/
var i = 0;
function slide(direct) {
	var pic = document.getElementById("pics");
	var img_src = [];

	img_src[0] = 'url("img/111126_kis_manzara_resmi_hareketli_2.jpg")';
	img_src[1] = 'url("img/Featured-Image1.jpg")';
	img_src[2] = 'url("img/36488_2.jpg")';
	img_src[3] = 'url("img/snow-wallpaper8_2.jpg")';
	img_src[4] = 'url("img/Snow-Wallpapers-10_2.jpg")';

	if (direct == 0) {
		if (i > 0) {
			i--;
		} else {
			i = 4;
		}
	} else {
		if (i < 4) {
			i++;
		} else {
			i = 0;
		}
	}

	pic.style.backgroundImage = img_src[i];
}