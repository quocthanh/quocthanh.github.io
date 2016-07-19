function createMonster() {
	var i = 0;

	var path = "img/sprite1.png";
	list.addItem(path, 110, 101, 3, 5, 4);
	list.items[i].speed = 15;
	i++;

	var path = "img/Ninja Sprites.png";
	list.addItem(path, 51, 60, 2, 5, 4);
	list.items[i].px = 0;
	list.items[i].py = 440;
	list.items[i].move = function() {
				this.px += this.speed;
				this.py -= this.speed;

				if (this.px > 100 || this.px < -60) {
					this.speed = -this.speed;
				}
			     };
	i++;

	var path = "img/volt_sprite_sheet_by_kwelfury-d5hx008_2.png";
	list.addItem(path, 80, 110, 2, 5, 5);
	list.items[i].py = 200;
	list.items[i].speed = 10;
	list.items[i].move = function() {
				this.px += this.speed;

				if (this.px >= canvas.width/2) {
					this.px = -40;
				}
			     };
	i++;

	var path = "";
	var mist = new Sprite_Image(path, 0, 0, 0, 0, 0)
};