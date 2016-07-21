/*

*/

function Static_Image(path) {
	this.img = new Image();

	this.img.src = path;

	this.px = 0;
	this.py = 0;

	this.left;
	this.right;
	this.top;
	this.bottom;

	this.speedX = (Math.ceil(Math.random()*5))* Math.pow(-1, Math.ceil((Math.random()*10)%2));;
	this.speedY = (Math.ceil(Math.random()*5))* Math.pow(-1, Math.ceil((Math.random()*10)%2));;

	this.cflag = 0;	


	this.Bound = 0;
	this.numMove = 0;

	this.isSelected = false;

}

Static_Image.prototype.draw = function(context) {
	//elem.innerHTML += this.cflag;
	if (this.cflag == 0) {
		this.cflag = 1;

		//elem.innerHTML += "-43-";
		this.changePosition();
		this.changeSpeed();
		this.changeBound();
	}

	context.drawImage(this.img, this.px, this.py);

	this.move();
	this.checkOut();
};


Static_Image.prototype.move = function() {
	this.numMove++;

	if (this.numMove > this.Bound) {
		this.speedX = -this.speedX;
		this.speedY = -this.speedY;
		this.numMove = -500;
	}

	this.px += this.speedX;
	this.py += this.speedY;

	this.left = this.px;
	this.right = this.px + this.img.width;
	this.top = this.py;
	this.bottom = this.py + this.img.height;
};

Static_Image.prototype.changePosition = function() {

	var x = Math.floor(Math.random()*(canvas.width - this.img.width));
	var y = Math.floor(Math.random()*(canvas.height - this.img.height));

	if (Math.random() > 0.4) {
		this.px = x;
		this.py = 0 - Math.floor(Math.random()*2)*(0 - (canvas.height - this.img.height));
	} else {
		this.px = 0;// - Math.floor(Math.random()*2)*(0 - (canvas.width - this.img.width));;
		this.py = y;
	}
};

Static_Image.prototype.changeSpeed = function() {
	if (this.px == 0) {
		this.speedX = Math.round(Math.sqrt(Math.pow(this.speedX, 2)));
	}

	if (this.px >= canvas.width - this.img.width- 1) {
		this.speedX = -Math.round(Math.sqrt(Math.pow(this.speedX, 2)));
	}

	if (this.py == 0) {
		this.speedY = Math.round(Math.sqrt(Math.pow(this.speedY, 2)));
	}

	if (this.py >= canvas.height - this.img.height - 1) {
		this.speedY = -Math.round(Math.sqrt(Math.pow(this.speedY, 2)));
	}
};

Static_Image.prototype.changeBound = function() {
	this.Bound = 10 + Math.round(Math.random()*100);
};

Static_Image.prototype.checkOut = function() {

	if ((this.right < 0) ||	(this.left > canvas.width) || (this.top > canvas.height) || (this.bottom < 0)) {
		this.isSelected = false;
		this.cflag      = 0;
		this.numMove = 0;

		cList.StageList[cList.currentStage].score--;
	}
};

Static_Image.prototype.isClick = function(x, y) {
	if (x > this.left && x < this.right && y > this.top && y < this.bottom) {
		this.clickReact(x, y);

		return true;
	}
};


Static_Image.prototype.clickReact = function(x, y) {
	this.isSelected = false;
	this.cflag      = 0;
	this.numMove = 0;

	cList.addScreenScore(x, y, 1);
	++cList.StageList[cList.currentStage].score;
};





















































