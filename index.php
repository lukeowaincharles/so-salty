<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
        
        <title>So Salty shop</title>
        <meta name="description" content="">
        
        <link rel="stylesheet" href="/static/ext/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/static/ext/bootstrap/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,700" rel="stylesheet">
        <link rel="stylesheet" href="/static/css/master.css">
    </head>
    <body data-spy="scroll">
        <div id="pageLoader">
            <div class="background">
                <div class="circle-1"></div>
                <div class="circle-2"></div>
                <div class="circle-3"></div>    
            </div>
        </div>
        <section class="hero__gradient">
            <div class="logo__wrapper">
                <img src="/static/img/logo-so-salty.svg" data-tilt data-tilt-max="50" data-tilt-speed="400" data-tilt-perspective="500"  />
            </div>
            <a href="#main-content" class="scroll page__scroll" id="scroll">Scroll<i class="icon-angle-down"></i></a>
        </section>

        <main>
            <a name="main-content"></a>
            <section class="product__wrapper">
                <div class="product__image">
                    <img src="/static/img/poster-mockup.png" alt="So Salty Poster" />
                </div>
                <div class="product__info__wrapper">
                    <h5>Limited edition</h5>
                    <h1>So Salty Poster</h1>
                    <p class="product__copy">Bright and vibrant "So Salty" A2 poster. Lighten up from being Salty (the act of being upset, angry or bitter) with this super fun poster.</p>
                    <p class="product__price">£12.99 <span>plus P&amp;P</span>
                    </p>
                    <button><a href="/so-salty/public_html/purchase-page.php">Buy now</a></button>
                </div>
            </section>
        </main>

        <footer>
            <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Contact</a></li>
                    <li class="seperator"></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            </div>
        </footer>
        <canvas id="canvas"></canvas>
        <script src="/static/js/broozr.js"></script>
        <script src="/static/js/modernizr-custom.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/static/ext/bootstrap/js/bootstrap.min.js"></script>
        <script src="../public_html/static/js/vanilla-tilt.js"></script>
        <script src="/static/js/master.js"></script>
    </body>
</html>
