class Ajaxer {
    _type;
    _url;
    _dataType;
    _data;
    _beforeSendCallback;
    _successCallback;
    _completeCallback;
    _cache = false;
    _errorCallback;

    constructor(type, url, dataType, data, beforeSendCallback, successCallback, completeCallback, errorCallback) {
        this._type = type;
        this._url = url;
        this._dataType = dataType;
        this._data = data;
        this._beforeSendCallback = beforeSendCallback;
        this._successCallback = successCallback;
        this._completeCallback = completeCallback;
        this._errorCallback = errorCallback;
    }

    get type() {
        return this._type;
    }

    set type(value) {
        // TODO: make get default ?
        if (value !== 'GET' &&  value !== 'POST')
        {
            throw new Error('Type should be either GET or POST');
        }

        this._type = value;
    }

    set url(value) {
        if (value === '') {
            throw new Error('Url can not be empty');
        }

        this._url = value;
    }

    set dataType(value) {
        /*if (value === '') {
            value = 'json';
        }*/

        this._dataType = value;
    }

    set data(value) {
        this._data = value;
    }

    set beforeSendCallback(value) {
        if (value === '' || typeof value !== 'function') {
            value = function(){};
        }
        this._beforeSendCallback = value;
    }
    set successCallback(value) {
        if (value === '' || typeof value !== 'function') {
            value = function(){};
        }
        this._successCallback = value;
    }

    set completeCallback(value) {
        if (value === '' || typeof value !== 'function') {
            value = function(){};
        }
        this._completeCallback = value;
    }

    set errorCallback(value) {
        if (value === '' || typeof value !== 'function') {
            value = function(){};
        }
        this._errorCallback = value;
    }

    send() {
        let app = this;
        $.ajax({
            type: this._type,
            url: this._url,
            dataType: this._dataType,
            data: this._data,
            beforeSend: this._beforeSendCallback,
            success: this._successCallback,
            complete: this._completeCallback,
            cache: this._cache,
            error: this._errorCallback
        })
            .fail(function(){
                alert("Something went wrong!");
                app.log();
            });
    }

    log(){
        let log = {
            type: this._type,
            url: this._url,
            dataType: this._dataType,
            data: this._data,
            beforeSendCallback: this._beforeSendCallback,
            successCallback: this._successCallback,
            completeCallback: this._completeCallback
        };

        console.log(log);
    }
}
