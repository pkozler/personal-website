let FS = require('fs');
let CONFIG = '_aux/config.json';
let ENCODING = 'utf8';

var configObject = JSON.parse(FS.readFileSync(CONFIG, ENCODING));

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

function fixUrls(cssFile, urlDict) {

    console.log('Načítám obsah souboru: ' + cssFile);

    FS.readFile(cssFile, ENCODING, function (err, data) {
        if (err) {
            return console.log(err);
        }

        let result = data;

        urlDict.forEach(function(item) {
            console.log(cssFile + ': nahrazuji "\n' + item.search + '" za "' + item.replacement + '"');
            result = result.replaceAll(item.search, item.replacement);
        });

        if (result == data) {
            console.log(cssFile + ': Nenalezeny žádné chyby.');
        }
        else {console.log(cssFile + ': zapisuji výsledek do souboru.');
            FS.writeFile(cssFile, result, ENCODING, function (err) {
                if (err) {
                    return console.log(err);
                }

                console.log(cssFile + ': Oprava odkazů byla úspěšně dokončena.');
            });
        }
    });

}

configObject.styles.forEach(function(style) {
    fixUrls(configObject.path + style.file, style.urls);
});
