class ObjectIterator {
    constructor(object) {
        this.object = object;
        this.currentElement;
        this.currentKey;
        this.objectKeys = Object.keys(object);
        this.length = Object.keys(object).length;
    }

    isLastElement() {
        return this.objectKeys[this.currentKey] === this.objectKeys[this.length - 1];
    }

    getFirstElement() {
        this.currentKey = 0;
        this.currentElement = this.objectKeys[0];

        return {
            lineId: this.objectKeys[this.currentKey],
            lineData: this.object[this.currentElement]
        };
    }

    nextElement() {
        if (this.currentKey === undefined || this.isLastElement())
        {
            return this.getFirstElement();
        }

        this.currentKey = this.currentKey + 1;
        this.currentElement = this.objectKeys[this.currentKey];

        return {
            lineId: this.objectKeys[this.currentKey],
            lineData: this.object[this.currentElement]
        };
    }
}
