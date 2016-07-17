function Ball(mapWidth, mapHeight) {
	this.mapWidth = mapWidth;
	this.mapHeight = mapHeight;

	this.radius = 20;
	this.speedX = (Math.ceil(Math.random()*5))* Math.pow(-1, Math.ceil((Math.random()*10)%2));
	this.speedY = (Math.ceil(Math.random()*5))* Math.pow(-1, Math.ceil((Math.random()*10)%2));

	this.cx = Math.floor(Math.random()*(this.mapWidth - 2*this.radius)) + this.radius;
	this.cy = Math.floor(Math.random()*(this.mapHeight - 2*this.radius)) + this.radius;

	this.color = "rgb(" + Math.floor(Math.random()*256) + ", " + Math.floor(Math.random()*256) + ", " + Math.floor(Math.random()*256) + ")";
}

Ball.prototype.draw = function(context) {
	context.beginPath();
	context.fillStyle = this.color;
	context.arc(this.cx, this.cy, this.radius, 0, Math.PI*2, true);
	context.closePath();
	context.fill();
};

Ball.prototype.move = function() {
	this.cx += this.speedX;
	this.cy += this.speedY;

	this.left = this.cx - this.radius;
	this.top = this.cy - this.radius;
	this.right= this.cx + this.radius;
	this.bottom = this.cy + this.radius;
};

Ball.prototype.checkCollision = function() {
	if (this.left <= 0 || this.right >= this.mapWidth) {
		this.speedX = -this.speedX;
	}

	if (this.top <= 0 || this.bottom >= this.mapHeight) {
		this.speedY = -this.speedY;
	}
};

Ball.prototype.moving = function() {
	this.draw(ctx);
	this.move();
	this.checkCollision();
};