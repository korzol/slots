class Reels {
    _interval;

    highlightMysteryTiles() {
        data.game.reelsBuffer.forEach(function(reel, index){
            reel.forEach(function(tile, i){
                let r = index + 1;
                let t = i + 1;
                $('#tile'+r+t).text(tile);
            });
        });

        this.replaceMysteryTiles();
    }

    replaceMysteryTiles() {
        let toTile = data.game['mysterySymbols'].toTile;
        let tiles = data.game['mysterySymbols'].tiles;

        if (tiles.length > 0) {
            tiles.forEach(function (tile) {
                let r = tile.reel + 1;
                let t = tile.index + 1;

                $('#tile' + r + t).removeClass('btn-outline-secondary').addClass('btn-success');
            });

            let self = this;
            setTimeout(function () {
                $('.btn-success').each(function () {

                    $(this).text(toTile);
                });
                self.resetTilesStyle();

                self.highlightPaylines();
            }, 1000);

        } else {
            this.highlightPaylines();
        }
    }

    highlightPaylines() {
        this.updateStats();

        let realizedLines = data.game['matchedLines']['realized_lines'];
        let self = this;

        if(Object.keys(realizedLines).length > 0) {

            let lines = new ObjectIterator(realizedLines);

            this._interval = setInterval(function () {

                self.resetTilesStyle();

                let line = lines.nextElement();

                // Mark tiles from payline
                let payLine = data.lines[line.lineId];

                payLine.forEach(function(tile, reel){
                    $('#tile'+(reel + 1)+(tile + 1))
                        .removeClass('btn-outline-secondary')
                        .addClass('btn-outline-primary');
                });


                // Mark tiles from matched lines
                for (const [index, tile] of Object.entries(line.lineData)) {
                    let r = tile.coords.reel + 1;
                    let t = tile.coords.tile + 1;

                    $('#tile'+r+t)
                        .removeClass('btn-outline-secondary')
                        .removeClass('btn-outline-primary')
                        .addClass('btn-primary');
                }
            }, 1000);
        }
    }

    resetTilesStyle() {
        $('.btn-sm').each(function (){
            $(this)
                .removeClass('btn-primary')
                .removeClass('btn-success')
                .removeClass('btn-outline-primary')
                .addClass('btn-outline-secondary');
        });
    }

    clearInterval() {
        clearInterval(this._interval);
    }

    updateStats() {
        let realizedLines = data.game['matchedLines']['realized_lines'];

        $('#paylines').text(Object.keys(realizedLines).length);

        let profit = 'Loss';
        if(data.game.profit > 0)
        {
            profit = data.game.profit;
        }
        $('#profit').text(profit);
    }
}
