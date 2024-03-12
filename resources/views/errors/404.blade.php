<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>404 Not Found</title>
</head>
<style>
    body {
        max-width: 100%;
        max-height: 100%;
        overflow: hidden;
        justify-content: center;
        align-items: flex-end;
    }

    canvas {
        z-index: 1;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .caps {
        z-index: 2;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        animation: as 8s linear infinite;
    }

    .caps img {
        display: block;
        width: 100%;
        height: 100%;
    }

    @keyframes as {
        0% {
            opacity: 0;
        }

        10% {
            opacity: .3;
        }

        20% {
            opacity: .1;
        }

        30% {
            opacity: .5;
        }

        40% {
            opacity: 0;
        }

        50% {
            opacity: .8;
        }

        55% {
            opacity: 0;
        }

        55% {
            opacity: 0;
        }
    }

    .frame {
        z-index: 3;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: -moz-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%);
        /* FF3.6+ */
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(19%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.9)));
        /* Chrome,Safari4+ */
        background: -webkit-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%);
        /* Opera 12+ */
        background: -ms-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%);
        /* IE10+ */
        background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%);
        /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#e6000000', GradientType=1);
        /* IE6-9 fallback on horizontal gradient */

    }

    .frame div {
        position: absolute;
        left: 0;
        top: -20%;
        width: 100%;
        height: 20%;
        background-color: rgba(0, 0, 0, .12);
        box-shadow: 0 0 10px rgba(0, 0, 0, .3);
        animation: asd 12s linear infinite;
    }

    .frame div:nth-child(1) {
        animation-delay: 0;
    }

    .frame div:nth-child(2) {
        animation-delay: 4s;
    }

    .frame div:nth-child(3) {
        animation-delay: 8s;
    }

    @keyframes asd {
        0% {
            top: -20%;
        }

        100% {
            top: 100%;
        }
    }

    h1 {
        z-index: 3;
        position: absolute;
        font: bold 200px/200px Arial, sans-serif;
        left: 50%;
        top: 50%;
        margin-top: -100px;
        width: 100%;
        margin-left: -50%;
        height: 200px;
        text-align: center;
        color: transparent;
        text-shadow: 0 0 30px rgba(0, 0, 0, .5);
        animation: asdd 2s linear infinite;
    }

    @keyframes asdd {
        0% {
            text-shadow: 0 0 30px rgba(0, 0, 0, .5);
        }

        33% {
            text-shadow: 0 0 10px rgba(0, 0, 0, .4);
        }

        66% {
            text-shadow: 0 0 20px rgba(0, 0, 0, .2);
        }

        100% {
            text-shadow: 0 0 40px rgba(0, 0, 0, .8);
        }
    }

    #homepage{
        position: fixed;
        bottom: 15%; /* Atur jarak dari bawah sesuai keinginan Anda */
        left: 50%;
        transform: translateX(-50%);
        background: rgb(2,0,36);
        background: linear-gradient(75deg, rgba(2,0,36,1) 0%, rgba(180,180,219,1) 50%, rgba(85,97,99,1) 100%);
        z-index: 999999;
        text-align: center;
        padding: 2% 3%;
        display: inline-block;
        padding: 15px 30px;
        font-size: 3rem;
        text-decoration: none;
        background-color: #4285f4;
        color: #fff;
        border-radius: 3px;
        transition: 0.5s;
        text-transform: uppercase;
        box-shadow: 3px 3px 3px 3px black;
        text-shadow: 2px 2px 2px grey;
        letter-spacing: 3px;
    }

    #homepage:hover{
        background-color: #3367d6; /* Ganti dengan warna tombol hover yang diinginkan */
        box-shadow: 0px 0px 0px black;
    }
</style>

<body>
    <h1>404</h1>

    <div class="frame">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="caps"></div>
    <canvas id="canvas"></canvas>
    <a href="/" id="homepage"> Kembali</a>
    <script>
        // js source https://codepen.io/moklick/pen/zKleC

        var Application = ( function () {
            var canvas;
            var ctx;
            var imgData;
            var pix;
            var WIDTH;
            var HEIGHT;
            var flickerInterval;

            var init = function () {
                canvas = document.getElementById('canvas');
                ctx = canvas.getContext('2d');
                canvas.width = WIDTH = 700;
                canvas.height = HEIGHT = 500;
                ctx.fillStyle = 'white';
                ctx.fillRect(0, 0, WIDTH, HEIGHT);
                ctx.fill();
                imgData = ctx.getImageData(0, 0, WIDTH, HEIGHT);
                pix = imgData.data;
                flickerInterval = setInterval(flickering, 30);
            };

            var flickering = function () {
                for (var i = 0; i < pix.length; i += 4) {
                    var color = (Math.random() * 255) + 50;
                    pix[i] = color;
                    pix[i + 1] = color;
                    pix[i + 2] = color;
                }
                ctx.putImageData(imgData, 0, 0);
            };

            return {
                init: init
            };
        }());

        Application.init();
    </script>
</body>

</html>
