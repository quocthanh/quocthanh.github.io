/*class to create a dynamic monster
using sprite images
*/
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

	//dimension of sprites
	this.row = row;
	this.col = col;
	this.finalCol = finalCol;

	this.isSelected = false;//is selected to draw on the screen?

	this.clickNum = 0;
	this.clickedNum = 0;

	this.times = 0;

	this.clipControl = 0;
}

/*change coordinate of img
*/
Sprite_Image.prototype.move = function() {
	this.px += this.speed;

	if (this.px > canvas.width) {
		this.px = -40;
		this.clickedNum = 0;
		this.times++;

		//game over when the boss monster move out the screen 3 times
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

/*choose which image to cut to make animation
*/
Sprite_Image.prototype.clip = function() {
	this.sx += this.disX;

	//check if the final sprite and return to the first sprite
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

/*draw image
*/
Sprite_Image.prototype.draw = function(context) {
	context.drawImage(this.img, this.sx, this.sy, this.disX, this.disY, this.px, this.py, this.disX, this.disY);

	this.move();

	this.clipControl++;
	if (this.clipControl%3 == 0) {
		this.clip();
	}
};

/*check if this image is clicked
x, y: coordinate of the mouse
*/
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

/*process if this image is clicked
increase score
check click times to reset the monster
*/
Sprite_Image.prototype.clickReact = function(x, y) {
	this.clickedNum++;

	cList.addScreenScore(x, y, 1);
	++cList.StageList[cList.currentStage].score;

	//if user click enough times, then reset the boss
	if (this.clickedNum >= this.clickNum) {
		this.isSelected = false;
		this.reset();
		list.reset();
		cList.reset();
		list.selectNum = cList.StageList[cList.currentStage].minMonsterNum;

		cList.StageList[cList.currentStage].bossScore += 2;
		this.clickNum++;
	}

};

Sprite_Image.prototype.reset = function() {
	this.px = -40;
	this.py = 0;

	this.isSelected = false;

	this.clickedNum = 0;

	this.times = 0;
};

/*class to create monster
using one normal image
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

	this.speedX = Math.pow(-1, Math.ceil((Math.random()*10)%2));
	this.speedY = Math.pow(-1, Math.ceil((Math.random()*10)%2));

	this.cflag = 0;

	this.Bound = 0;
	this.numMove = 0;

	this.isSelected = false;
}

/*draw image
*/
Static_Image.prototype.draw = function(context) {

	//choose random properties at begin
	if (this.cflag == 0) {
		this.cflag = 1;

		this.changePosition();
		this.changeSpeed();
		this.changeBound();
	}

	context.drawImage(this.img, this.px, this.py);

	this.move();
	this.checkOut();
};

/*change coordinate of image
*/
Static_Image.prototype.move = function() {
	this.numMove++;

	//change direction
	if (this.numMove > this.Bound) {
		this.speedX = -this.speedX;
		this.speedY = -this.speedY;
		this.numMove = -5000;
	}

	this.px += this.speedX;
	this.py += this.speedY;

	//update dimensions
	this.left = this.px;
	this.right = this.px + this.img.width;
	this.top = this.py;
	this.bottom = this.py + this.img.height;
};

/*choose a random position
*/
Static_Image.prototype.changePosition = function() {
	var x = Math.floor(Math.random()*(canvas.width - this.img.width)); //create a random number between 0 and widht of the canvas
	var y = Math.floor(Math.random()*(canvas.height - this.img.height));

	//make monster appear at the edges of canvas
	if (Math.random() > 0.4) {
		this.px = x;
		this.py = 0 - Math.floor(Math.random()*2)*(0 - (canvas.height - this.img.height));
	} else {
		this.px = 0;
		this.py = y;
	}
};

/*choose the proper speed for the monster move
depend on the position

*/
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

/*create a random bound
*/
Static_Image.prototype.changeBound = function() {
	this.Bound = 100 + Math.round(Math.random()*500);
};

/*check if the monster move out the screen
if that, erase and reset the monster
*/
Static_Image.prototype.checkOut = function() {

	if ((this.right < 0) ||	(this.left > canvas.width) || (this.top > canvas.height) || (this.bottom < 0)) {
		this.isSelected = false;
		this.cflag      = 0;
		this.numMove = 0;

		cList.StageList[cList.currentStage].score--;
	}
};

/*check if this image is clicked
x, y: coordinate of the mouse
*/
Static_Image.prototype.isClick = function(x, y) {
	if (x > this.left && x < this.right && y > this.top && y < this.bottom) {
		this.clickReact(x, y);

		return true;
	}
};

/*process when the monster is clicked
*/
Static_Image.prototype.clickReact = function(x, y) {
	this.isSelected = false;
	this.cflag      = 0;
	this.numMove = 0;

	cList.addScreenScore(x, y, 1);
	++cList.StageList[cList.currentStage].score;
};

/*a list of monter objects
*/
function monsterList() {
	this.items = [];//monters number to draw

	this.cFlag = 0;
}

/*create new monster object
and push to the list
*/
monsterList.prototype.addItem = function(monsterClass, path, disX, disY, row, col, finalCol) {
	var monster = new monsterClass(path, disX, disY, row, col, finalCol);

	this.items.push(monster);
};

monsterList.prototype.reset = function() {
	for (var g = 0; g < this.items.length; g++) {
		this.items[g].isSelected = false;

		this.items[g].cflag = 0;
		this.items[g].numMove = 0;

		if (this.items[g].reset) {
			this.items[g].reset();
		}
	}
};

/*a list with properties to
control the game
*/
function controlList() {
	this.StageList = [];
	this.currentStage = 0;

	this.ScreenScoreList = [];

	this.gameOver = {
		text: "GAME OVER",
		x   :  0,
		y   :  0,
		draw:  function(context) {
				context.save();

				context.fillStyle = "midnightblue";
				context.fillRect(0, 0, canvas.width,canvas.height);

				context.font = "50px Arial";
				context.fillStyle = "coral";
				context.textAlign = "center";
				context.fillText(this.text, this.x, this.y);

				context.restore();
		       }
	};

	this.loop = 0;

	this.bossFlag = 0;

	this.missClick = false;
}

/*create a new stage
*/
controlList.prototype.addStage = function(text) {
	var x = new Stage();

	x.text = text;

	this.StageList.push(x);
};

/*create a score to draw on the screen
*/
controlList.prototype.addScreenScore = function(x, y, score) {
	var score = new ScreenScore(x, y, score);

	this.ScreenScoreList.push(score);
};

/*draw at the beginning of the stage
notify a new stage
*/
controlList.prototype.drawStage = function() {
	for (var g = 0; g < this.StageList.length; g++) {
		if (this.StageList[g].isSelected) {
			this.StageList[g].draw(ctx);
			break;
		}
	}
};

/*draw score on the screen
when user click on the monster
*/
controlList.prototype.drawScreenScore = function(context) {
	for (var g = 0; g < this.ScreenScoreList.length; g++) {
		context.save();

		context.globalAlpha = this.ScreenScoreList[g].opa;
		context.font = "60px Arial";
		context.fillText("+" + this.ScreenScoreList[g].score, this.ScreenScoreList[g].x, this.ScreenScoreList[g].y);

		context.restore();

		this.ScreenScoreList[g].opa -= 0.005;

		if (this.ScreenScoreList[g].opa < 0) {
			this.ScreenScoreList.splice(g, 1);
			g--;
		}
	}
};

/*update score to scoreArea
and process with special cases
*/
controlList.prototype.updateScore = function() {
	var score = this.StageList[this.currentStage].score;

	scoreArea.innerHTML = score;

	//game over
	if (score <= -5) {
		this.gameOver.x = canvas.width/2;
		this.gameOver.y = canvas.height/2;

		this.gameOver.draw(ctx);
		start_Flag = 0;
		control_Flag = 0;
		g_Flag = 0;
		list.reset();
	}

	//a boss monster appear when have enough score
	if (score >= this.StageList[this.currentStage].bossScore && !this.bossFlag) {
		list.reset();
		list.items[this.currentStage].isSelected = true;
		this.bossFlag = 1;
	}
};


controlList.prototype.reset = function() {
	this.bossFlag = 0;
	this.StageList[this.currentStage].score = 0;
	this.missClick = false;
	this.ScreenScoreList.length = 0;
};
/*class to create a stage of the game
*/
function Stage() {
	this.text = "";

	this.px = canvas.width/2;
	this.py = canvas.height/2;

	this.opa = 1;

	this.score = 0;

	this.isSelected = false;

	this.minMonsterNum = 0;
	this.maxMonsterNum = 0;

	this.bossScore = 0;
	this.winScore = 0;
};

/*draw, notify a new stage
*/
Stage.prototype.draw = function(context) {
	context.save();
	context.globalAlpha = this.opa;

	context.fillStyle = "darkgreen";
	context.fillRect(0, 0, canvas.width,canvas.height);

	context.font = "50px Arial";
	context.fillStyle = "coral";
	context.textAlign = "center";
	context.fillText(this.text, this.px, this.py);

	context.globalAlpha = 1;
	context.restore();

	this.change();
};

/*change the opacity
to disappear the image
*/
Stage.prototype.change = function(context) {
	this.opa -= 0.005;

	if (this.opa < 1 && this.opa > 0.96) {
		var img = new Image();

		img.onload = function() {
			ctx_background.drawImage(img, 0, 0);
		};

		img.src = bk[0];
	}

	if (this.opa < 0) {
		this.opa = 1;
		this.isSelected = false;
		control_Flag = 0;
		g_Flag = 1;
	}
};

/*class to create a score image on the screen
*/
function ScreenScore(x, y, score) {
	this.x = x;
	this.y = y;

	this.score = score;

	this.num  = 0;
	this.opa = 1;
}