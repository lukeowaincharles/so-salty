/**
 * broozr v1.0
 * 
 * Broozr, browser and OS detection to you.
 */
; var broozr = function(options) {

    var doc = document;
    var docEl = doc.documentElement;

    docEl.id = 'broozr';

    var settings = {
        debug: false,
        chrome: {classes: true},
        safari: {classes: true},
        opera: {classes: true},
        firefox: {classes: true},
        ie11: {classes: true},
        ie10: {classes: true},
        ie9: {classes: true},
        ie8: {classes: true},
        ie7: {classes: true},
        ie6: {classes: true},
        mac: true,
        win: true,
        x11: true,
        linux: true
    };

    function broozrMerge(obj1, obj2) {
        for (var p in obj2) {
            try {
                if (obj2[p].constructor == Object) {
                    obj1[p] = broozrMerge(obj1[p], obj2[p]);
                } else {
                    obj1[p] = obj2[p];
                }
            } catch (e) {
                obj1[p] = obj2[p];
            }
        }
        return obj1;
    }

    if (options) {
        broozrMerge(settings, options);
    }

    function broozrLoader() {

        for (var resourceType in browserSettings) {
            var val = browserSettings[resourceType];
            var head = doc.getElementsByTagName('head')[0];

            if (resourceType === 'classes' && val) {
                docEl.className += ' ' + theBrowser;
            }
        }
    }

    var actualBrowser = '';

    var browsers = [
        {'testWith': 'chrome', 'testSettings': settings.chrome},
        {'testWith': 'safari', 'testSettings': settings.safari},
        {'testWith': 'firefox', 'testSettings': settings.firefox},
        {'testWith': 'opera', 'testSettings': settings.opera}
    ];

    for (var i = 0; i < browsers.length; i++) {
        var currentBrowser = browsers[i];

        if (navigator.userAgent.toLowerCase().indexOf(currentBrowser.testWith) > -1) {
            var browserSettings = currentBrowser.testSettings;
            var theBrowser = currentBrowser.testWith;
            broozrLoader();
            actualBrowser = theBrowser;
            break;
        }
    }

    function getIEVersion() {
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp('MSIE ([0-9]{1,}[\.0-9]{0,})');

            if (re.exec(ua) != null) {
                rv = parseFloat(RegExp.$1);
            }
        }
        return rv;
    }

    var version = getIEVersion();

    if (version > -1) {

        if (version === 11.0) {
            var browserSettings = settings.ie11;
        }
        else if (version === 10.0) {
            var browserSettings = settings.ie10;
        }
        else if (version === 9.0) {
            var browserSettings = settings.ie9;
        }
        else if (version === 8.0) {
            var browserSettings = settings.ie8;
        }
        else if (version === 7.0) {
            var browserSettings = settings.ie7;
        }
        else if (version === 6.0) {
            var browserSettings = settings.ie6;
        }

        var theBrowser = 'iex ie' + version;

        broozrLoader();

        actualBrowser = theBrowser;

    }

    var oSys = [
        {'testWith': 'Win', 'testSettings': settings.win},
        {'testWith': 'Mac', 'testSettings': settings.mac},
        {'testWith': 'X11', 'testSettings': settings.x11},
        {'testWith': 'Linux', 'testSettings': settings.linux}
    ];

    for (var i = 0; i < oSys.length; i++) {

        var currentPlatform = oSys[i];

        if (navigator.appVersion.indexOf(currentPlatform.testWith) > -1) {
            var osSettings = currentPlatform.testSettings;
            var theOS = currentPlatform.testWith;

            if (osSettings) {
                docEl.className += ' ' + currentPlatform.testWith.toLowerCase();
            }
            break;
        }
    }
    
    if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
        docEl.className += ' ' + 'ios';
    }

    /*if (settings.debug) {
        console.log('Start Broozr Debug\n');
        console.log('Browser: ' + theBrowser);
        console.log('OS: ' + theOS);
        console.log('End Broozr Debug\n');
    }*/
};
broozr();
