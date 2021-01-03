class App {

    _data;

    self = this;

    _overlay;

    init() {
        let cofigLoader = new Ajaxer();
        cofigLoader.dataType = 'json';
        cofigLoader.type = 'GET';
        cofigLoader.url = '/settings.php';
        cofigLoader.successCallback = this.self.setConfig;
        cofigLoader.send();

        this.game();
    }

    game() {
        let slotsLoader = new Ajaxer();
        slotsLoader.dataType = 'json';
        slotsLoader.type = 'GET';
        slotsLoader.url = '/game.php';
        slotsLoader.successCallback = this.self.setSlots;
        slotsLoader.errorCallback = this.self.ajaxError;
        slotsLoader.send();
    }

    turnOnOverlay() {
        this._overlay.activate();
    }

    turnOffOverlay() {
        this._overlay.deactivate();
    }

    setConfig(value) {
        data.lines = value;
    }

    setSlots(val) {
        data.game = val;
    }

    ajaxError(error, arg2) {
        console.log("Error ${error}");
        console.log("Arg2 ${arg2}");
    }

    get data() {
        return this._data;
    }


}
