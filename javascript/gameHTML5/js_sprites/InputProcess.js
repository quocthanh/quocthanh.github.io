function InputProcess(event) {
	if (document.body.style.background == "black") {
		document.body.style.background = "white";
	} else {
		document.body.style.background = "black";
	}

	var x = event.pageX - canvas.offsetLeft;
	var y = event.pageY - canvas.offsetTop;

	for (var g = list.items.length - 1; g >= 0; g--) {
		if (list.items[g].isSelected && list.items[g].isClick) {
			if (list.items[g].isClick(x, y)) {
				break;
			}
		}
	}	
}