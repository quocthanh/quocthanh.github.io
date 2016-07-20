function createMonster() {
	var i = 0;

	var path = "img/sprite1.png";
	list.addItem(Sprite_Image, path, 110, 101, 3, 5, 4);
	list.items[i].speed = 15;
	list.items[i].isSelected = true;
	i++;



	/*var path = "img/Ninja Sprites.png";
	list.addItem(Sprite_Image, path, 51, 60, 2, 5, 4);
	list.items[i].px = 0;
	list.items[i].py = 440;
	list.items[i].speed = 5;
	list.items[i].move = function() {
				this.px += this.speed;
				this.py -= this.speed;

				if (this.px > 100 || this.px < -60) {
					this.speed = -this.speed;
				}
			     };
	i++;



	var path = "img/volt_sprite_sheet_by_kwelfury-d5hx008_2.png";
	list.addItem(Sprite_Image, path, 80, 110, 2, 5, 5);
	list.items[i].py = 200;
	list.items[i].speed = 10;
	list.items[i].move = function() {
				this.px += this.speed;

				if (this.px >= canvas.width/2) {
					this.px = -40;
					mist.loop = -1;
				}
			     };
	list.items[i].draw = function(context) {
		context.drawImage(this.img, this.sx, this.sy, this.disX, this.disY, this.px, this.py, this.disX, this.disY);
		mist.draw(context);
	};
	i++;



	var path = "img/Mist_2.png";
	mist = new Sprite_Image(path, 0, 0, 0, 0, 0)
	mist.px = 0;
	mist.py = 0;
	mist.loop = 0;
	mist.draw = function(context) {
		this.loop += 1;
		
		for (var g = 0; g < this.loop; g++) {
			this.px = Math.round(canvas.width/2) + (Math.ceil(Math.random()*60))* Math.pow(-1, Math.ceil((Math.random()*10)%2)) - 20;
			this.py = Math.round(canvas.height/2) + (Math.ceil(Math.random()*50))* Math.pow(-1, Math.ceil((Math.random()*10)%2)) - 20;
			context.drawImage(this.img, this.px, this.py);
		}
	};




	var srcArray = [];
	var m = 0;
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-02-1.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-02-2.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-02-3.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-01-1.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-01-2.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-01-3.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-03-1.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-03-2.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-03-3.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-00.gif";
	srcArray[m++]  = "img/MythicalFerianDragon-Fly-16.gif";

	list.addItem(Sprite_Image_2, srcArray);
	list.items[i].px = canvas.width - 200;
	list.items[i].py = canvas.height/2;
	i++;*/




	for (g = 0; g < 8; g++) {
		var path = "img/alien-29939_960_720_3.png";
		list.addItem(Static_Image, path, 0, 0, 0, 0, 0);
	}
};












