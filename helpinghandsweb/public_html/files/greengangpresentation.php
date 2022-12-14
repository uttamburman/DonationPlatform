<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    
 <script type="text/javascript" src="stylesheets/jquery.touchSwipe.js"></script>
    <script type="text/javascript" src="stylesheets/jquery.horizonScroll.js"></script>
   
</head>
<body>
<header data-role="header" id="header">
    <nav class="menu">
        <ul>
            <li>
                <a href="#section-section1"><span>Section</span></a>
            </li>
            <li>
                <a href="#section-section2"><span>Section</span></a>
            </li>
            <li>
                <a href="#section-section3"><span>Section</span></a>
            </li>
            <li>
                <a href="#section-section4"><span>Section{{message}}</span></a>
            </li>
        </ul>
    </nav>
</header>

<div class="horizon-prev"><img src="images/l-arrow.png"></div>
<div class="horizon-next"><img src="images/r-arrow.png"></div>

<section data-role="section" id="section-section1"></section>
<section data-role="section" id="section-section2"></section>
<section data-role="section" id="section-section3"></section>
<section data-role="section" id="section-section4">
    <div class="go-to-2">Go to panel 2 via ID.</div>
</section>

<footer data-role="footer" id="footer"></footer>

<script type="text/javascript">
    // By default, swipe is enabled.
    $('section').horizon();

    // If you do not want to include another plugin, TouchSwipe, you can set it to false in the default options by passing in the option as false.
    //$('section').horizon({swipe: false});

    $(document).on('click', '.go-to-2', function () {
        $(document).horizon('scrollTo', 'section-section2');
    });
</script>

</body>
</html>
