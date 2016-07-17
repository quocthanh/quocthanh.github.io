
function canvasCreate(canvas_num) {
	for (var g = 0; g < canvas_num; g++) {
		list.items[g] = new Ball(canvas.width, canvas.height);
	}
}