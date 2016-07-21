function createMonster() {
	var i = 0;

	var path = "img/sprite1.png";
	list.addItem(Sprite_Image, path, 110, 101, 3, 5, 4);
	list.items[i].speed = 15;
	list.items[i].clickNum = 3;
	//list.items[i].isSelected = true;
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

function createStageName() {
	var i = 0;

	cList.addStage("Stage 1");
	cList.StageList[i].minMonsterNum = 1;
	cList.StageList[i].maxMonsterNum = 2;
	cList.StageList[i].bossScore = 3;
	i++;

	cList.addStage("Stage 2");
	cList.StageList[i].minMonsterNum = 2;
	cList.StageList[i].maxMonsterNum = 5;
	cList.StageList[i].bossScore = 10;
	i++;
}


function firstDraw(context) {
	var img = new Image();

	img.onload = function() {
		context.globalAlpha = 0.3;
		context.drawImage(img, 0, 0);
		context.globalAlpha = 1;

		context.font = "30px Arial";
		context.fillStyle = "green";
		context.textAlign = "center";
		context.fillText("Press the button to play", canvas.width/2, canvas.height/2);
	};

	img.src = "img/joystick.png";
}


function startGame() {
	document.body.style.background = "teal";

	if (pause_Flag) {
		start_Flag = 1;
		pause_Flag = 0;
		return;
	}

	if (start_Flag == 0) {

	cList.StageList[0].isSelected = true;
	cList.StageList[0].score = 0;
	cList.currentStage = 0;

	start_Flag = 1;
	control_Flag = 1;
	list.reset();
	cList.reset();

	boom_num = 3;
	document.getElementById("boom").innerHTML = 3;

	list.selectNum = cList.StageList[0].minMonsterNum;

	//elem.innerHTML += 46;
	}
	
}

function resumeGame() {
	document.body.style.background = "yellow";

	if (start_Flag == 0) {
		if (cList.StageList[cList.currentStage].score <= -5 || cList.bossFlag) {
			cList.StageList[0].isSelected = true;
			cList.StageList[0].score = 0;
			cList.currentStage = 0;

			start_Flag = 1;
			control_Flag = 1
			list.reset();
			cList.reset();

			boom_num = 3;
			document.getElementById("boom").innerHTML = 3;
			list.selectNum = cList.StageList[0].minMonsterNum;
		}
	} else {
			cList.StageList[0].isSelected = true;
			cList.StageList[0].score = 0;
			cList.currentStage = 0;

			g_Flag = 0;
			control_Flag = 1
			list.reset();
			cList.reset();

			boom_num = 3;
			document.getElementById("boom").innerHTML = 3;
			list.selectNum = cList.StageList[0].minMonsterNum;
	}
}

function pauseGame() {
	if (start_Flag) {
		start_Flag = 0;
		pause_Flag = 1;
	}
}

function boomGame() {
    if (start_Flag && boom_num > 0 && !cList.bossFlag) {
	for (var g = 0; g < list.items.length; g++) {
	    if (list.items[g].isSelected) {
		list.items[g].isSelected = false;
		list.items[g].cflag = 0;
		list.items[g].numMove = 0;

		cList.addScreenScore(list.items[g].px, list.items[g].py, 1);
		++cList.StageList[cList.currentStage].score;
	    }
	}

	boom_num--;

	var boom = document.getElementById("boom");
	boom.innerHTML = boom_num;
    } else if (start_Flag && boom_num > 0 && cList.bossFlag) {
	var boss = list.items[cList.currentStage];

	boss.clickReact(boss.px, boss.py + boss.disY, 1);

	boom_num--;

	var boom = document.getElementById("boom");
	boom.innerHTML = boom_num;
    }
}








































