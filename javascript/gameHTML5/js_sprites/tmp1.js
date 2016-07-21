function drawGame() {

for (g = 0; g < list.items.length; g++) { //nho sua laiiiiiiiiiiiiiiii
		if (list.items[g].isSelected) {
			list.cFlag = 1;
			break;
		}
		
		list.cFlag = 0;
}


    if (list.cFlag == 0) {

	//elem.innerHTML += 22;
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
			list.items[x].isSelected = true;

			preNum[g] = x;
		}

	    }
	}

	if (list.selectNum < cList.StageList[cList.currentStage].maxMonsterNum) {
		list.selectNum++;
	}
    }



	for (var g = 0; g < list.items.length; g++) {
		if (list.items[g].isSelected) {
			//elem.innerHTML = "item: " + g + "-";
			list.items[g].draw(ctx);
		}
	}

}