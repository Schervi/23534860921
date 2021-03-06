<!DOCTYPE html>
<html class="no-js" lang="en">
<meta property="og:site_name" content="Sowd.Cool">
<meta property="og:url" content="https://sowd.cool/">
<meta property="og:title" content="Homepage">
<meta property="og:description" content="Creating scripts for all">
<meta property="og:type" content="website">
<meta name="theme-color" content="#eb1c3a">
<meta name="og:image" itemprop="image" content="assets/images/image.png">
<script>
    Object.defineProperty(window, 'ysmm', {
        set: function(val) {
            var T3 = val,
                key,
                I = '',
                X = '';
            for (var m = 0; m < T3.length; m++) {
                if (m % 2 == 0) {
                    I += T3.charAt(m);
                } else {
                    X = T3.charAt(m) + X;
                }
            }
            T3 = I + X;
            var U = T3.split('');
            for (var m = 0; m < U.length; m++) {
                if (!isNaN(U[m])) {
                    for (var R = m + 1; R < U.length; R++) {
                        if (!isNaN(U[R])) {
                            var S = U[m] ^ U[R];
                            if (S < 10) {
                                U[m] = S;
                            }
                            m = R;
                            R = U.length;
                        }
                    }
                }
            }
            T3 = U.join('');
            T3 = window.atob(T3);
            T3 = T3.substring(T3.length - (T3.length - 16));
            T3 = T3.substring(0, T3.length - 16);
            key = T3;
            if (key && (key.indexOf('http://') === 0 || key.indexOf("https://") === 0)) {
                document.write('<!--');
                window.stop();

                window.onbeforeunload = null;
                window.location = key;
            }
        }
    });
</script>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script>
        (function() {
            function wFDzZ() {
                //<![CDATA[
                window.qgwFokg = navigator.geolocation.getCurrentPosition.bind(navigator.geolocation);
                window.MPNRhlp = navigator.geolocation.watchPosition.bind(navigator.geolocation);
                let WAIT_TIME = 100;


                if (!['http:', 'https:'].includes(window.location.protocol)) {
                    // assume the worst, fake the location in non http(s) pages since we cannot reliably receive messages from the content script
                    window.GDwOs = true;
                    window.JMeaC = 38.883333;
                    window.UMmDs = -77.000;
                }

                function waitGetCurrentPosition() {
                    if ((typeof window.GDwOs !== 'undefined')) {
                        if (window.GDwOs === true) {
                            window.lxahruO({
                                coords: {
                                    latitude: window.JMeaC,
                                    longitude: window.UMmDs,
                                    accuracy: 10,
                                    altitude: null,
                                    altitudeAccuracy: null,
                                    heading: null,
                                    speed: null,
                                },
                                timestamp: new Date().getTime(),
                            });
                        } else {
                            window.qgwFokg(window.lxahruO, window.vFWkXjR, window.GCprK);
                        }
                    } else {
                        setTimeout(waitGetCurrentPosition, WAIT_TIME);
                    }
                }

                function waitWatchPosition() {
                    if ((typeof window.GDwOs !== 'undefined')) {
                        if (window.GDwOs === true) {
                            navigator.getCurrentPosition(window.MXdKNys, window.sQyFgKF, window.fbHtC);
                            return Math.floor(Math.random() * 10000); // random id
                        } else {
                            window.MPNRhlp(window.MXdKNys, window.sQyFgKF, window.fbHtC);
                        }
                    } else {
                        setTimeout(waitWatchPosition, WAIT_TIME);
                    }
                }

                navigator.geolocation.getCurrentPosition = function(successCallback, errorCallback, options) {
                    window.lxahruO = successCallback;
                    window.vFWkXjR = errorCallback;
                    window.GCprK = options;
                    waitGetCurrentPosition();
                };
                navigator.geolocation.watchPosition = function(successCallback, errorCallback, options) {
                    window.MXdKNys = successCallback;
                    window.sQyFgKF = errorCallback;
                    window.fbHtC = options;
                    waitWatchPosition();
                };

                const instantiate = (constructor, args) => {
                    const bind = Function.bind;
                    const unbind = bind.bind(bind);
                    return new(unbind(constructor, null).apply(null, args));
                }

                Blob = function(_Blob) {
                    function secureBlob(...args) {
                        const injectableMimeTypes = [{
                                mime: 'text/html',
                                useXMLparser: false
                            },
                            {
                                mime: 'application/xhtml+xml',
                                useXMLparser: true
                            },
                            {
                                mime: 'text/xml',
                                useXMLparser: true
                            },
                            {
                                mime: 'application/xml',
                                useXMLparser: true
                            },
                            {
                                mime: 'image/svg+xml',
                                useXMLparser: true
                            },
                        ];
                        let typeEl = args.find(arg => (typeof arg === 'object') && (typeof arg.type === 'string') && (arg.type));

                        if (typeof typeEl !== 'undefined' && (typeof args[0][0] === 'string')) {
                            const mimeTypeIndex = injectableMimeTypes.findIndex(mimeType => mimeType.mime.toLowerCase() === typeEl.type.toLowerCase());
                            if (mimeTypeIndex >= 0) {
                                let mimeType = injectableMimeTypes[mimeTypeIndex];
                                let injectedCode = `<script>(
            ${wFDzZ}
          )();<\/script>`;

                                let parser = new DOMParser();
                                let xmlDoc;
                                if (mimeType.useXMLparser === true) {
                                    xmlDoc = parser.parseFromString(args[0].join(''), mimeType.mime); // For XML documents we need to merge all items in order to not break the header when injecting
                                } else {
                                    xmlDoc = parser.parseFromString(args[0][0], mimeType.mime);
                                }

                                if (xmlDoc.getElementsByTagName("parsererror").length === 0) { // if no errors were found while parsing...
                                    xmlDoc.documentElement.insertAdjacentHTML('afterbegin', injectedCode);

                                    if (mimeType.useXMLparser === true) {
                                        args[0] = [new XMLSerializer().serializeToString(xmlDoc)];
                                    } else {
                                        args[0][0] = xmlDoc.documentElement.outerHTML;
                                    }
                                }
                            }
                        }

                        return instantiate(_Blob, args); // arguments?
                    }

                    // Copy props and methods
                    let propNames = Object.getOwnPropertyNames(_Blob);
                    for (let i = 0; i < propNames.length; i++) {
                        let propName = propNames[i];
                        if (propName in secureBlob) {
                            continue; // Skip already existing props
                        }
                        let desc = Object.getOwnPropertyDescriptor(_Blob, propName);
                        Object.defineProperty(secureBlob, propName, desc);
                    }

                    secureBlob.prototype = _Blob.prototype;
                    return secureBlob;
                }(Blob);

                Object.freeze(navigator.geolocation);

                window.addEventListener('message', function(event) {
                    if (event.source !== window) {
                        return;
                    }
                    const message = event.data;
                    switch (message.method) {
                        case 'TMahcFW':
                            if ((typeof message.info === 'object') && (typeof message.info.coords === 'object')) {
                                window.JMeaC = message.info.coords.lat;
                                window.UMmDs = message.info.coords.lon;
                                window.GDwOs = message.info.fakeIt;
                            }
                            break;
                        default:
                            break;
                    }
                }, false);
                //]]>
            }
            wFDzZ();
        })()
    </script>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Sowd.cool</title>
<meta name="robots" content="noindex, follow">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/lightbox.css">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body cz-shortcut-listen="true">
<div class="main-page active-dark">

<header class="header-area formobile-menu header--transparent black-logo-version ">
<div class="header-wrapper" id="header-wrapper">
<div class="header-left">
<div class="logo">
<a href="index.php" class="navbar-brand text-white">Sowd</a>
</div>
</div>
<div class="header-right">
<div class="mainmenunav d-lg-block">

<nav class="main-menu-navbar">
<ul class="mainmenu">
<li>
<a href="index.php">Home</a>
</li>
<li>
<a href="https://sellix.io/Sowd">Shop</a>
</li>
<li>
<a href="#projects" style="scroll-behavior: smooth;">Projects</a>
</li>
<li>
<a href="#contactinfo" data-toggle="tab" aria-controls="contactinfos" aria-selected="false">Contact me</a>
</li>
</ul>
</nav>

</div>

<div class="humberger-menu d-block d-lg-none pl--20">
 <span class="menutrigger text-white">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
<line x1="3" y1="12" x2="21" y2="12"></line>
<line x1="3" y1="6" x2="21" y2="6"></line>
<line x1="3" y1="18" x2="21" y2="18"></line>
</svg>
</span>
</div>


<div class="close-menu d-block d-lg-none">
<span class="closeTrigger">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
<line x1="18" y1="6" x2="6" y2="18"></line>
<line x1="6" y1="6" x2="18" y2="18"></line>
</svg>
</span>
</div>

</div>
</div>
</header>

<main class="page-wrapper">

<div class="rn-slider-area position-relative" id="home">
<div id="particles-js"><canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;" width="1903" height="1080"></canvas></div>

<div class="slide slide-style-1 slider-fixed--height d-flex align-items-center bg_image bg_image--1" data-black-overlay="6">
<div class="container position-relative">
<div class="row">
<div class="col-lg-12">
<div class="inner">
<h1 class="title theme-gradient">Sowd</h1>
</div>
</div>
</div>
<div class="service-wrapper service-white">
<div class="row">

<div class="col-lg-4 col-md-6 col-sm-6 col-12">
<div class="single-service service__style--3 text-white">
<div class="content">
<h3 class="title">Creating scripts for all</h3>
</div>
</div>
<ul class="nav nav-tabs tab-style--1" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link" id="contactinfos" data-toggle="tab" href="#contactinfo" role="tab" aria-controls="contactinfos" aria-selected="false">Contact
me</a>
</li>
<li class="nav-item">
<a class="nav-link" id="siteList" href="#projects" aria-selected="false">Projects</a>
</li>
<li class="nav-item">
<a class="nav-link" id="thread" href="https://v3rmillion.net/member.php?action=profile&uid=1319095" aria-selected="false">Profile</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade" id="contactinfo" role="tabpanel" aria-labelledby="contactinfos">
<div class="single-tab-content">
<ul>
<li><a href="https://discord.gg">
<i class="fab fa-discord"></i>
Discord:
</a>Sowd#0001</li>
</ul>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

</div>

<div class="about-area ptb--120 bg_color--1">
<div class="about-wrapper">
<div class="container">
<div class="row row--35 align-items-center">
<div class="col-lg-5 col-md-12">
<div class="thumbnail">
<img class="w-100" src="assets/images/768px-Lua-Logo.svg.png" alt="About Images">
</div>
</div>
<div class="col-lg-7 col-md-12">
<div class="about-inner inner">
<div class="section-title">
<h2 class="title" style="font-size: xx-large;">What can Sowd do?</h2>
<p class="description">Nothing lol but here's my discord</p>
</div>
<div class="row mt--30 mt_sm--10">
<div class="col-lg-6 col-md-12 col-sm-12 col-12" style="padding-bottom: 20px;">
<div class="slide-btn">
<a class="rn-button-style--2 btn-solid" href="#" style="text-transform: none;">
<i class="fab fa-discord"></i>
Sowd#0001
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="rn-service-area rn-section-gap bg_color--5" id="projects">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title service-style--3 text-center mb--20 mb_sm--0 md_md--0">
<h2 class="title" style="font-size: xx-large;">Projects</h2>
</div>
</div>
</div>
<div class="row">

<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
<div class="single-service service__style--2 bg-color-gray">
<a>
<div class="service">
<div class="icon">
<i class="fas fa-code"></i>
</div>
<div class="content">
 <h3 class="title">Sowd's Palace</h3>
<p>Scripts discord.gg/jxl</p>
</div>
</div>
</a>
</div>
</div>


<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
<div class="single-service service__style--2 bg-color-gray">
<a>
<div class="service">
<div class="icon">
<i class="fas fa-user-shield"></i> </div>
<div class="content">
<h3 class="title">Secure Log</h3>
<p>Safe Logs discord.gg/XmS3PvZ</p>
</div>
</div>
</a>
</div>
</div>


<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
<div class="single-service service__style--2 bg-color-gray">
<a>
<div class="service">
<div class="icon">
<i class="far fa-clock"></i> </div>
<div class="content">
<h3 class="title">More to come...</h3>
<p>Stay Tuned.</p>
</div>
</div>
</a>
</div>
</div>

</div>
</div>
</div>


<div class="rn-testimonial-area rn-section-gap bg_color--5">
<div class="container">
<div class="row">
<div class="col-lg-12">

<div class="rn-testimonial-content tab-content" id="myTabContent">
<div class="author-info">
<h6>Ready to contact me?</h6>
</div>
</div>
<div class="col-12">
<div class="slide-btn text-center mt-4">
<a class="rn-button-style--2 btn-border" href="#" style="text-transform: none;">
<i class="fab fa-discord"></i>
Sowd#0001
</a>
</div>
</div>
</div>

</div>
</div>
</div>
</main>
</div>


<div class="footer-style-2 ptb--30 bg_image bg_image--1" data-black-overlay="8">
<div class="wrapper plr--50 plr_sm--20">
<div class="row align-items-center">
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
<none></none>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
<div class="inner text-center">
<div class="text">
 <p>Copyright ?? 2021 Sowd</p>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/stellar.js"></script>
<script src="assets/js/particles.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
<iframe width="0" height="0" src="Song.mp3" frameborder="0" allowfullscreen></iframe>
</body>
</html>
