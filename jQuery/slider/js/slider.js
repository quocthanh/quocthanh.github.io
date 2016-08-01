var id;
var picSelected = 0;
var src = [];
var cFlag = true;
var NUM = 4;

src[0] = "img/Assassins_Creed_Rogue_Louisburg_Battle_Facing_enemy_ships_1413566994_2.jpg";
src[1] = "img/LjadabP_2.jpg";
src[2] = "img/ships_sea_light_rain_69192_1920x1080_2.jpg";
src[3] = "img/cat_face_glasses_thick_65455_1920x1080_2.jpg"

$(function() {
	//effect at begin
	var $ship = $('#ship');
	$ship.hide();
	$ship.show('drop', 2000, function() {
		highlight(0);
	});

	$('#smallVersion img').click(function() {
		var x = 0;
		$this = $(this);

		//find the order of the img
		while ($this.attr('src')) {
			x++;
			$this = $this.prev('img');
		}

		picSelected = (x - 2);
		changePic();
	});

	$('#pre').click(function() {
		if (cFlag) {
			picSelected += (NUM - 2);
			changePic();
		}
	});

	$('#next').click(function() {
		changePic();
	});

	id = setInterval(changePic, 8000);
	$('button').click(function() {
		changePic();
	});
});

/*change pictures on slider
by using effects of jquery ui
*/
function changePic() {
    if (cFlag) {
	cFlag = false;
	picSelected++;

	$('#container').prepend('<img src="' + src[picSelected%NUM] + '" alt="" />');
	$('#container img:first').hide();
	$('#ship').hide('drop', 2000, function() {
		$('#container img:first').show('drop', 2000, function() {
			$(this).attr('id', 'ship');
			cFlag = true;
			highlight(picSelected%NUM);
		});
	});
    }
}//end changePic

/*highlight the selected picture
in small version
*/
function highlight(index) {
	$('#smallVersion img').css('box-shadow', 'none');

	$('#smallVersion img:nth-child(' + (index + 1) + ')').css('box-shadow', '10px 10px 5px grey');
}