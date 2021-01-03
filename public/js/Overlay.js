class Overlay {
    _state;
    _element;

    constructor(element, state) {
        this._state = state;
        this._element = element;
    }

    set state(value) {
        if (value === '')
        {
            value = 'inactive';
        }

        this._state = value;
    }

    set element(value) {
        if (value === '')
        {
            throw new Error('Overlay element id is mandatory');
        }

        this._element = value;
    }

    switchState() {
        if (this._state === 'active') {
            this._state = 'inactive';
            this.deactivate();
            return;
        }

        this._state = 'active';
        this.activate();
    }

    activate() {
        $('#'+this._element)
            .removeClass('hidden')
            .addClass('overlay');

    }

    deactivate() {
        $('#'+this._element)
            .removeClass('overlay')
            .addClass('hidden');
    }
}
