var list = new monsterList();
var cList = new controlList();

var canvas;
var ctx;
var canvas_background;
var ctx_background;
var bk = [];
bk[0] = "img/hood_in_forest_wip02_3.jpg";//background image of canvas_background

var start_Flag = 0; //start the game
var control_Flag = 0;//draw stage image when begin a stage
var g_Flag = 0;//draw game when draw stage image finish
var pause_Flag = 0;

var scoreArea;
var boom_num = 3;

var req;

window.onload = function() {
	canvas = document.getElementById("canvas");
	ctx = canvas.getContext("2d");
	canvas_background = document.getElementById("background");
	ctx_background = canvas_background.getContext("2d");

	scoreArea = document.getElementById("score");

	firstDraw(ctx);

	createMonster();

	createStageName();

	canvas.onclick = ClickEventProcess;

	var play = document.getElementById("play"); //assign events to buttons
	play.onclick = startGame;

	var resume = document.getElementById("resume");
	resume.onclick = resumeGame;

	var pause = document.getElementById("pause");
	pause.onclick = pauseGame;

	var boom = document.getElementById("boom_img");
	boom.onclick = boomGame;

	req = window.requestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		window.oRequestAnimationFrame;

	process();
};

/*the main loop of the game

*/
function process() {
    if (start_Flag > 0) {
	clear();
	
	//draw the stage image
	if (control_Flag > 0) {
		cList.drawStage();
	}

	//draw score on the screen, update score and process
	cList.drawScreenScore(ctx);
	cList.updateScore();

	//draw monster when draw stage end
	if (g_Flag > 0) {
		drawGame();
	}
    }
   
    req(process);
}