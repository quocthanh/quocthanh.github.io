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

	this.isSelected = false;

	this.clickNum = 0;

	this.clickedNum = 0;

	this.times = 0;
}

Sprite_Image.prototype.setSRC = function(path) {
	this.img.src = path;
};


Sprite_Image.prototype.move = function() {
	this.px += this.speed;

	if (this.px > canvas.width) {
		this.px = -40;
		this.clickedNum = 0;
		this.times++;

		if (this.times >= 3) {
			cList.gameOver.x = canvas.width/2;
			cList.gameOver.y = canvas.height/2;

			cList.gameOver.draw(ctx);
			start_Flag = 0;
			control_Flag = 0;
			g_Flag = 0;
			list.reset();

			this.reset();
		}
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

	this.move()
	this.clip();
};

Sprite_Image.prototype.isClick = function(x, y) {
	var left = this.px;
	var right = this.px + this.disX;
	var top = this.py;
	var bottom = this.py + this.disY

	if (x > left && x < right && y > top && y < bottom) {
		this.clickReact(x, y);

		return true;
	}
};


Sprite_Image.prototype.clickReact = function(x, y) {
	//cList.StageList[cList.currentStage].winScore
	this.clickedNum++;
	//this.times++;

	cList.addScreenScore(x, y, 1);
	++cList.StageList[cList.currentStage].score;

	if (this.clickedNum >= this.clickNum) {
		this.isSelected = false;
		//resettt
		this.reset();

		start_Flag = 1;
		control_Flag = 1;
		g_Flag = 0;
		list.reset();
		cList.reset();
		
		//cList.StageList[0].isSelected = true;
		boom_num = 3;
		document.getElementById("boom").innerHTML = 3;

		cList.currentStage++;
		cList.StageList[cList.currentStage].isSelected = true;
		//list.selectNum = cList.StageList[cList.currentStage].minMonsterNum;
	}

};

Sprite_Image.prototype.reset = function() {
	this.px = -40;
	this.py = 0;

	this.isSelected = false;

	this.clickedNum = 0;

	this.times = 0;
};








