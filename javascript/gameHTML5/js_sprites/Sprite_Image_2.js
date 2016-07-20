function Sprite_Image_2(src) {
	this.img = [];

	//this.src = src;

	for (var g = 0; g < src.length; g++) {
		this.img[g] = new Image();
		this.img[g].src = src[g];
	}

	this.px = 0;
	this.py = 0;

	this.count = 0;
	this.countControl = 0;

	this.speed = 15;

	this.isSelected = false;
}

Sprite_Image_2.prototype.draw = function(context) {
	var x = this.px;
	var y = this.py;

	elem.innerHTML = this.px;

	context.drawImage(this.img[this.count++], this.px, this.py);

	//this.img.src = this.src[this.count++];

	//this.count++;

	if (this.count == this.img.length - 3) {
		if (this.countControl < 2) {
			this.count = 1;
			this.countControl++;
		}
	}

	if (this.count > 10) {
		this.count = 0;
		this.countControl = 0;

		this.px = canvas.width - 200;
		this.py = canvas.height/2;
	}


	this.move();
};


Sprite_Image_2.prototype.move = function() {
	this.px -= this.speed;
};

Sprite_Image_2.prototype.clip = function() {
};