let PUBLIC_DIR = 'C:/Users/Petr/Dropbox/www/personal-website/public/';
let APP_MAIN_CSS = 'css/app.css';
let HOMEPAGE_CSS = 'css/template.css';
let ENCODING = 'utf8';

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

function Translation(urlPrefix, pattern, replacement) {
    this.pattern = urlPrefix + pattern;
    this.replacement = urlPrefix + replacement;
}

let FS = require('fs');

function fixUrls(cssFile, urlDict) {

    FS.readFile(cssFile, ENCODING, function (err, data) {
        if (err) {
            return console.log(err);
        }

        let result = data;

        urlDict.forEach(function(item) {
            result = result.replaceAll(item.pattern, item.replacement);
        });

        FS.writeFile(cssFile, result, ENCODING, function (err) {
            if (err) {
                return console.log(err);
            }
        });
    });

}

var appMainCssFile = PUBLIC_DIR + APP_MAIN_CSS;
var homepageCssFile = PUBLIC_DIR + HOMEPAGE_CSS;
var urlPrefix = '../';

var appMainUrlDict = [
    new Translation(urlPrefix, 'webfonts/fa-', 'fonts/vendor/@fortawesome/fontawesome-free/webfa-')
];
var homepageUrlDict = [
    new Translation(urlPrefix, 'img/', 'images/vendor/startbootstrap-creative/'),
    new Translation(urlPrefix, 'fonts/devicons.', 'fonts/vendor/devicons/devicons.')
];

fixUrls(appMainCssFile, appMainUrlDict);
fixUrls(homepageCssFile, homepageUrlDict);
