let FS = require('fs');
let CONFIG = '_aux/config.json';
let ENCODING = 'utf8';

var configObject = JSON.parse(FS.readFileSync(CONFIG, ENCODING));

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

function fixUrls(cssFile, urlDict) {

    FS.readFile(cssFile, ENCODING, function (err, data) {
        if (err) {
            return console.log(err);
        }

        let result = data;

        urlDict.forEach(function(item) {
            result = result.replaceAll(item.search, item.replacement);
        });

        FS.writeFile(cssFile, result, ENCODING, function (err) {
            if (err) {
                return console.log(err);
            }
        });
    });

}

configObject.styles.forEach(function(style) {
    fixUrls(configObject.path + style.file, style.urls);
});
