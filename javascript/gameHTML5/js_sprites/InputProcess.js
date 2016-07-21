function InputProcess(event) {
	/*if (document.body.style.background == "black") {
		document.body.style.background = "white";
	} else {
		document.body.style.background = "black";
	}*/

	var x = event.pageX - canvas.offsetLeft;
	var y = event.pageY - canvas.offsetTop;

	for (var g = list.items.length - 1; g >= 0; g--) {
		if (list.items[g].isSelected && list.items[g].isClick && start_Flag > 0) {
			if (list.items[g].isClick(x, y)) {
				cList.missClick = false;
				break;
			}

			cList.missClick = true;
		}
	}

	if (cList.missClick) {
		cList.StageList[cList.currentStage].score--;
		cList.missClick = false;
	}

	//elem.innerHTML += cList.StageList[cList.currentStage].score;
}