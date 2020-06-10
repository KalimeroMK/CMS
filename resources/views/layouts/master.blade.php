<!doctype html>
<html>
<head>
    @if (Request::path() == '/')
    <meta charset="utf-8">
    <meta name="author" content="Zoran Shefot Bogoevski">
    <meta class="viewport" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @endif
    @yield('seo')

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.ico">
    <!-- Google Fonts -->
    <link rel="stylesheet"
    href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="/assets/vendor/icon-etlinefont/style.css">
    <link rel="stylesheet" href="/assets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="/assets/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
    <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
    <link rel="stylesheet" href="/assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/assets/vendor/animate.css">
    <link rel="stylesheet" href="/assets/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="/assets/css/unify-core.css">
    <link rel="stylesheet" href="/assets/css/unify-components.css">
    <link rel="stylesheet" href="/assets/css/unify-globals.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    @yield('extra_css')
</head>
<body data-gr-c-s-loaded="true">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <!--/#scripts-->
    <!-- jQuery -->
    <!-- JS Global Compulsory -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/assets/vendor/popper.js/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>


    <!-- JS Implementing Plugins -->
    <script src="/assets/vendor/appear.js"></script>
    <script src="/assets/vendor/slick-carousel/slick/slick.js"></script>
    <script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
    <script src="/assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
    <script src="/assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>

    <!-- JS Unify -->
    <script src="/assets/js/hs.core.js"></script>
    <script src="/assets/js/components/hs.carousel.js"></script>
    <script src="/assets/js/components/hs.header.js"></script>
    <script src="/assets/js/helpers/hs.hamburgers.js"></script>
    <script src="/assets/js/components/hs.tabs.js"></script>
    <script src="/assets/js/components/hs.onscroll-animation.js"></script>
    <script src="/assets/js/components/hs.sticky-block.js"></script>
    <script src="/assets/js/components/hs.go-to.js"></script>

    <!-- JS Customization -->
    <script src="/assets/js/custom.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of scroll animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });

        $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });

        // initialization of sticky blocks
        setTimeout(function () { // important in this case
            $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
        }, 300);
    });

        $(window).on('resize', function () {
            setTimeout(function () {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
        });
    </script>

    @yield('extra_js')
</body>
</html>