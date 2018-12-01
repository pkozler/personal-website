/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require("./bootstrap")

import "scrollreveal"
import "magnific-popup"
import "startbootstrap-creative/js/creative"

$(function() {

    var _0x1fce=['%66%61%63%65%62%6f%6f%6b%2e%63%6f%6d%2f%6b%6f%7a%6c%65%72%2e%70%65%74%72','%67%69%74%68%75%62%2e%63%6f%6d%2f%70%6b%6f%7a%6c%65%72','%2b%34%32%30%20%36%30%35%20%35%38%39%20%33%35%39','%70%6b%6f%7a%6c%65%72%2e%65%6d%61%69%6c%40%67%6d%61%69%6c%2e%63%6f%6d'];(function(_0x475f65,_0x2e15f0){var _0x5c52c2=function(_0x30450c){while(--_0x30450c){_0x475f65['push'](_0x475f65['shift']());}};_0x5c52c2(++_0x2e15f0);}(_0x1fce,0xda));var _0xe1fc=function(_0x3ad2c3,_0x30e796){_0x3ad2c3=_0x3ad2c3-0x0;var _0x5ec1e8=_0x1fce[_0x3ad2c3];return _0x5ec1e8;};var INFO={'phone':unescape(_0xe1fc('0x0')),'email':unescape(_0xe1fc('0x1')),'fblink':unescape(_0xe1fc('0x2')),'github':unescape(_0xe1fc('0x3'))};

    function showContact() {
        $('#phone-number').attr('href', 'tel:' + INFO.phone.replace(/\s/g, ''));
        $('#email-address').attr('href', 'mailto:' + INFO.email);
        $('#facebook-link').attr('href', 'https://' + INFO.fblink);
        $('#github-profile').attr('href', 'https://' + INFO.github);
        $('#github-profile').addClass('text-white');
        $('#phone-number .contact-text').text(INFO.phone);
        $('#email-address .contact-text').text(INFO.email/*.replace('@', '(at)')*/);
        $('#facebook-link .contact-text').text(INFO.fblink);
        $('#github-profile .contact-text').text(INFO.github);
    }

    showContact();

    $('[data-toggle="tooltip"]').tooltip();

});
