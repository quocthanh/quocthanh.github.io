/*clear the canvas
*/
function clear() {
		canvas.width = canvas.width;
}

/*create monster images with properties
*/
function createMonster() {
	var i = 0;

	var path = "img/sprite1.png";
	list.addItem(Sprite_Image, path, 110, 101, 3, 5, 4);
	list.items[i].speed = 2;
	list.items[i].clickNum = 3;
	i++;

	for (g = 0; g < 8; g++) {
		var path = "img/alien-29939_960_720_3.png";
		list.addItem(Static_Image, path, 0, 0, 0, 0, 0);
	}
};

/*create stages  with properties

*/
function createStageName() {
	var i = 0;

	cList.addStage("Stage 1");
	cList.StageList[i].minMonsterNum = 1;
	cList.StageList[i].maxMonsterNum = 8;
	cList.StageList[i].bossScore = 2;
	i++;
}

/*draw when begin
context: context of canvas

*/
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

/*draw animation, monster
choose random monsters to draw at begin

*/
function drawGame() {

	//check whether the screen still has monster, list.cFlag = 1
	for (g = 0; g < list.items.length; g++) {
		if (list.items[g].isSelected) {
			list.cFlag = 1;
			break;
		}

		list.cFlag = 0;
	}

	//choose new random monsters when the screen has no monster
	if (list.cFlag == 0) {

		list.cFlag = 1;
		var preNum = [];

		for (var g = 0; g < list.selectNum; g++) {
	   		var check = 1;

			while (check == 1) {

				var x = list.items.length - Math.floor(Math.random()*8 + 1);

				check = 0;
				for (var h = 0; h < g; h++) {
					if (x == preNum[h]) {
						check = 1;
					}
				}

				if (check == 0) {
					list.items[x].isSelected = true;//choose this monster to draw

					preNum[g] = x;
				}
	    		}

		}

		if (list.selectNum < cList.StageList[cList.currentStage].maxMonsterNum) {
			list.selectNum++;
		}
	}


	//draw chosen monsters
	for (var g = 0; g < list.items.length; g++) {
		if (list.items[g].isSelected) {
			list.items[g].draw(ctx);
		}
	}

}

function setFlags() {
		cList.StageList[0].isSelected = true;
		cList.StageList[0].score = 0;
		cList.currentStage = 0;

		start_Flag = 1;
		control_Flag = 1;
		g_Flag = 0;
		list.reset();
		cList.reset();

		boom_num = 3;
		document.getElementById("boom").innerHTML = 3;

		list.selectNum = cList.StageList[0].minMonsterNum;

		cList.StageList[cList.currentStage].bossScore = 2;
		list.items[cList.currentStage].clickNum = 3;
}

/*set start_Flag to run main process to draw game
*/
function startGame() {

	//process when the game is paused
	if (pause_Flag) {
		start_Flag = 1;
		pause_Flag = 0;
		return;
	}

	if (start_Flag == 0) {
		setFlags();
	}	
}

/*resume game
set and reset flags, properties
*/
function resumeGame() {

	if (start_Flag == 0) {
		if (cList.StageList[cList.currentStage].score <= -5 || cList.bossFlag || pause_Flag) {
			setFlags();
		}
	} else {
			setFlags();
	}
}

/*pause game when game's running
*/
function pauseGame() {
	if (start_Flag) {
		start_Flag = 0;
		pause_Flag = 1;
	}
}

/*when user ckick on the boom image,
this function will erase all monster
and plus score
*/
function boomGame() {
    if (start_Flag && boom_num > 0 && !cList.bossFlag) { //for normal monster
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

    } else if (start_Flag && boom_num > 0 && cList.bossFlag) { //for boss
	var boss = list.items[cList.currentStage];

	boss.clickReact(boss.px, boss.py + boss.disY, 1);

	boom_num--;

	var boom = document.getElementById("boom");
	boom.innerHTML = boom_num;
    }
}

/*process when user click on the canvas
check which monster is clicked
*/
function ClickEventProcess(event) {
	var x = event.pageX - canvas.offsetLeft;
	var y = event.pageY - canvas.offsetTop;

	for (var g = list.items.length - 1; g >= 0; g--) {
		if (list.items[g].isSelected && list.items[g].isClick && start_Flag > 0) {//check to choose monsters on the screen
			if (list.items[g].isClick(x, y)) {
				cList.missClick = false;
				break;
			}

			cList.missClick = true;
		}
	}

	if (cList.missClick) {
		cList.StageList[cList.currentStage].score--; //minus score when user miss click
		cList.missClick = false;
	}
}