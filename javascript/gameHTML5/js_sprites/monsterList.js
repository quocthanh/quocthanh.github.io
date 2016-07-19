function monsterList() {
	this.items = [];
}

monsterList.prototype.addItem = function(path, disX, disY, row, col, finalCol) {
	var monster = new Sprite_Image(path, disX, disY, row, col, finalCol);

	this.items.push(monster);
};