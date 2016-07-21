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

				//clear();

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


controlList.prototype.addStage = function(text) {
	var x = new Stage();

	x.text = text;

	this.StageList.push(x);
	
};

controlList.prototype.addScreenScore = function(x, y, score) {
	var score = new ScreenScore(x, y, score);	

	this.ScreenScoreList.push(score);	
};

controlList.prototype.drawStage = function() {
	for (var g = 0; g < this.StageList.length; g++) {
		if (this.StageList[g].isSelected) {
			this.StageList[g].draw(ctx);
			break;
		}
	}
};

controlList.prototype.drawScreenScore = function(context) {
	for (var g = 0; g < this.ScreenScoreList.length; g++) {
		context.save();

		context.globalAlpha = this.ScreenScoreList[g].opa;
		context.font = "60px Arial";
		context.fillText("+" + this.ScreenScoreList[g].score, this.ScreenScoreList[g].x, this.ScreenScoreList[g].y);

		context.restore();

		this.ScreenScoreList[g].opa -= 0.05;

		if (this.ScreenScoreList[g].opa < 0) {
			this.ScreenScoreList.splice(g, 1);
			g--;
		}
	}
};

controlList.prototype.updateScore = function() {
	var score = this.StageList[this.currentStage].score;

	scoreArea.innerHTML = score;

	if (score <= -5) {
		this.gameOver.x = canvas.width/2;
		this.gameOver.y = canvas.height/2;

		this.gameOver.draw(ctx);
		start_Flag = 0;
		control_Flag = 0;
		g_Flag = 0;
		list.reset();
		//elem.innerHTML += "-22-";
	}

	if (score >= this.StageList[this.currentStage].bossScore && !this.bossFlag) {
		list.reset();
		list.items[this.currentStage].isSelected = true;
		this.bossFlag = 1;
	}
};


controlList.prototype.reset = function() {
	this.bossFlag = 0;
	//this.StageList[this.currentStage].score = 0;
	//this.currentStage = 0;
	this.missClick = false;
	this.ScreenScoreList.length = 0;
};

controlList.prototype.checkOpacity = function() {
	
};

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

Stage.prototype.change = function(context) {
	this.opa -= 0.02;

	if (this.opa < 1 && this.opa > 0.96) {
		var img = new Image();

		img.onload = function() {
			ctx_background.drawImage(img, 0, 0);
		};

		//img.src = bk[cList.currentStage];
		img.src = bk[0];
	}

	if (this.opa < 0) {
		this.opa = 1;
		this.isSelected = false;
		control_Flag = 0;
		g_Flag = 1;
	}
};

function ScreenScore(x, y, score) {
	this.x = x;
	this.y = y;

	this.score = score;

	this.num  = 0;
	this.opa = 1;
}







