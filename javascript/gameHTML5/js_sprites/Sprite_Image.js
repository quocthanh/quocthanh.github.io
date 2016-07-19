function Sprite_Image(path, disX, disY, row, col, finalCol) {
	this.img = new Image();
	this.img.src = path;

	this.sx = 0;
	this.sy = 0;

	this.disX = disX;
	this.disY = disY;

	this.px = -40;
	this.py = 0;
	this.speed = 1;

	this.row = row;
	this.col = col;
	this.finalCol = finalCol;
}

Sprite_Image.prototype.setSRC = function(path) {
	this.img.src = path;
};


Sprite_Image.prototype.move = function() {
	this.px += this.speed;

	if (this.px > canvas.width) {
		this.px = -40;
	}
};

Sprite_Image.prototype.clip = function() {

	this.sx += this.disX;

	if (this.sy > (this.row - 2)*this.disY) {
		if (this.sx > (this.finalCol - 1)*this.disX) {
			this.sx = 0;
			this.sy = 0;
		}
	}

	if (this.sx > (this.col - 1)*this.disX) {
		this.sy += this.disY;
		this.sx = 0;
	}
};

Sprite_Image.prototype.draw = function(context) {
	context.drawImage(this.img, this.sx, this.sy, this.disX, this.disY, this.px, this.py, this.disX, this.disY);
};














