function monsterList() {
	this.items = [];
	this.selectNum = 3;

	this.cFlag = 0;
}

monsterList.prototype.addItem = function(monsterClass, path, disX, disY, row, col, finalCol) {
	var monster = new monsterClass(path, disX, disY, row, col, finalCol);

	this.items.push(monster);
};