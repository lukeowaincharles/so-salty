



(function () {
    var animation = false,
            animationstring = "animation",
            keyframeprefix = "",
            domPrefixes = "Webkit Moz O ms Khtml".split(" "),
            pfx = "",
            elm = document.createElement("div");

    if (elm.style.animationName !== undefined) {
        animation = true;
    }

    if (animation === false) {
        for (var i = 0; i < domPrefixes.length; i++) {
            if (elm.style[domPrefixes[i] + "AnimationName"] !== undefined) {
                pfx = domPrefixes[i];
                animationstring = pfx + "Animation";
                keyframeprefix = "-" + pfx.toLowerCase() + "-";
                animation = true;
                break;
            }
        }
    }

    var minloadingtime = 300; /*variable min load time set to 100*/
    var maxloadingtime = 3000;

    var startTime = new Date();
    var elapsedTime;
    var dismissonloadfunc, maxloadingtimer;

    if (
            animation &&
            document.documentElement &&
            document.documentElement.classList
            ) {
        

        window.addEventListener(
                "load",
                (dismissonloadfunc = function () {
                    // when page loads
                    clearTimeout(maxloadingtimer); // cancel dismissal of transition after maxloadingtime time
                    elapsedTime = new Date() - startTime; // get time elapsed once page has loaded
                    var hidepageloadertimer =
                            elapsedTime > minloadingtime ? 0 : minloadingtime - elapsedTime;

                    setTimeout(function () {
                        document.getElementById("pageLoader").classList.add("dimissloader"); // dismiss transition
                    }, hidepageloadertimer);

                    setTimeout(function () {
                        document.documentElement.classList.remove("hidescrollbar");
                    }, hidepageloadertimer + 100); // 100 is the duration of the fade out effect
                }),
                false
                );

        maxloadingtimer = setTimeout(function () {
            // force dismissal of page transition after maxloadingtime time
            window.removeEventListener("load", dismissonloadfunc, false); // cancel onload event function call
            document.getElementById("pageLoader").classList.add("dimissloader"); // dismiss transition

            setTimeout(function () {
                document.documentElement.classList.remove("hidescrollbar");
            }, 100); // 100 is the duration of the fade out effect
        }, maxloadingtime);
    } else {
        document.getElementById("pageLoader").style.display = "none";
    }

    window.addEventListener(
            "beforeunload",
            function () {
                // outro effect
                document.body.classList.add("fadeout");
            },
            false
            );
})();








window.onload = function () {
    //canvas init
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");

    //canvas dimensions
    var W = window.innerWidth;
    var H = window.innerHeight;
    canvas.width = W;
    canvas.height = H;

    //snowflake particles
    var mp = 25; //max particles
    var particles = [];
    for (var i = 0; i < mp; i++)
    {
        particles.push({
            x: Math.random() * W, //x-coordinate
            y: Math.random() * H, //y-coordinate
            r: Math.random() * 4 + 1, //radius
            d: Math.random() * mp //density
        })
    }

    //Lets draw the flakes
    function draw()
    {
        ctx.clearRect(0, 0, W, H);

        ctx.fillStyle = "rgba(255, 255, 255, 0.8)";
        ctx.beginPath();
        for (var i = 0; i < mp; i++)
        {
            var p = particles[i];
            ctx.moveTo(p.x, p.y);
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2, true);
        }
        ctx.fill();
        update();
    }

    //Function to move the snowflakes
    //angle will be an ongoing incremental flag. Sin and Cos functions will be applied to it to create vertical and horizontal movements of the flakes
    var angle = 0;
    function update()
    {
        angle += 0.01;
        for (var i = 0; i < mp; i++)
        {
            var p = particles[i];
            //Updating X and Y coordinates
            //We will add 1 to the cos function to prevent negative values which will lead flakes to move upwards
            //Every particle has its own density which can be used to make the downward movement different for each flake
            //Lets make it more random by adding in the radius
            p.y += Math.cos(angle + p.d) + 1 + p.r / 2;
            p.x += Math.sin(angle) * 2;

            //Sending flakes back from the top when it exits
            //Lets make it a bit more organic and let flakes enter from the left and right also.
            if (p.x > W + 5 || p.x < -5 || p.y > H)
            {
                if (i % 3 > 0) //66.67% of the flakes
                {
                    particles[i] = {x: Math.random() * W, y: -10, r: p.r, d: p.d};
                } else
                {
                    //If the flake is exitting from the right
                    if (Math.sin(angle) > 0)
                    {
                        //Enter from the left
                        particles[i] = {x: -5, y: Math.random() * H, r: p.r, d: p.d};
                    } else
                    {
                        //Enter from the right
                        particles[i] = {x: W + 5, y: Math.random() * H, r: p.r, d: p.d};
                    }
                }
            }
        }
    }

    //animation loop
    setInterval(draw, 33);
};

(function ($) {
// **************
// ScrollAnchor --- Smooth scroll
// **************
    $('a[href*=#].scroll:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                var _st = target.offset().top;

                $('html,body').animate({scrollTop: _st}, 1000);
                return false;
            }
        }
    });


    $('[data-scroll]').on('click', function () {
        var scrollAnchor = $(this).attr('data-scroll'),
                scrollPoint = $('[data-anchor="' + scrollAnchor + '"]').offset().top - 30;
        $('body,html').animate({
            scrollTop: scrollPoint
        }, 500);
        return false;
    });
})(jQuery);


 