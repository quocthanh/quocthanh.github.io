function monsterList() {
	this.items = [];
	this.selectNum = 1;

	this.cFlag = 0;
}

monsterList.prototype.addItem = function(monsterClass, path, disX, disY, row, col, finalCol) {
	var monster = new monsterClass(path, disX, disY, row, col, finalCol);

	this.items.push(monster);
};

monsterList.prototype.reset = function() {
	for (var g = 0; g < this.items.length; g++) {
		this.items[g].isSelected = false;
		
		this.items[g].cflag = 0;
		this.items[g].numMove = 0;

		if (this.items[g].reset) {
			this.items[g].reset();
		}
	}

};