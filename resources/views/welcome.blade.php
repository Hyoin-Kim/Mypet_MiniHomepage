
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oh-My Pet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #F8C400;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            @font-face {
              font-family: Cyber;
              src: url("https://assets.codepen.io/605876/Blender-Pro-Bold.otf");
              font-display: swap;
            }

            * {
              box-sizing: border-box;
            }

            body {
              display: flex;
              align-items: center;
              flex-direction: column;
              justify-content: center;
              min-height: 100vh;
              font-family: 'Cyber', sans-serif;
            }

            body .cybr-btn + .cybr-btn {
              margin-top: 2rem;
            }

            .cybr-btn {
              --primary: hsl(var(--primary-hue), 85%, calc(var(--primary-lightness, 50) * 1%));
              --shadow-primary: hsl(var(--shadow-primary-hue), 90%, 50%);
              --primary-hue: 0;
              --primary-lightness: 50;
              --color: hsl(0, 0%, 100%);
              --font-size: 26px;
              --shadow-primary-hue: 180;
              --label-size: 9px;
              --shadow-secondary-hue: 60;
              --shadow-secondary: hsl(var(--shadow-secondary-hue), 90%, 60%);
              --clip: polygon(0 0, 100% 0, 100% 100%, 95% 100%, 95% 90%, 85% 90%, 85% 100%, 8% 100%, 0 70%);
              --border: 4px;
              --shimmy-distance: 5;
              --clip-one: polygon(0 2%, 100% 2%, 100% 95%, 95% 95%, 95% 90%, 85% 90%, 85% 95%, 8% 95%, 0 70%);
              --clip-two: polygon(0 78%, 100% 78%, 100% 100%, 95% 100%, 95% 90%, 85% 90%, 85% 100%, 8% 100%, 0 78%);
              --clip-three: polygon(0 44%, 100% 44%, 100% 54%, 95% 54%, 95% 54%, 85% 54%, 85% 54%, 8% 54%, 0 54%);
              --clip-four: polygon(0 0, 100% 0, 100% 0, 95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);
              --clip-five: polygon(0 0, 100% 0, 100% 0, 95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);
              --clip-six: polygon(0 40%, 100% 40%, 100% 85%, 95% 85%, 95% 85%, 85% 85%, 85% 85%, 8% 85%, 0 70%);
              --clip-seven: polygon(0 63%, 100% 63%, 100% 80%, 95% 80%, 95% 80%, 85% 80%, 85% 80%, 8% 80%, 0 70%);
              font-family: 'Cyber', sans-serif;
              color: var(--color);
              cursor: pointer;
              background: transparent;
              text-transform: uppercase;
              font-size: var(--font-size);
              outline: transparent;
              letter-spacing: 2px;
              position: relative;
              font-weight: 700;
              border: 0;
              min-width: 300px;
              height: 75px;
              line-height: 75px;
              transition: background 0.2s;
            }

            .cybr-btn:hover {
              --primary: hsl(var(--primary-hue), 85%, calc(var(--primary-lightness, 50) * 0.8%));
            }
            .cybr-btn:active {
              --primary: hsl(var(--primary-hue), 85%, calc(var(--primary-lightness, 50) * 0.6%));
            }

            .cybr-btn:after,
            .cybr-btn:before {
              content: '';
              position: absolute;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              clip-path: var(--clip);
              z-index: -1;
            }

            .cybr-btn:before {
              background: var(--shadow-primary);
              transform: translate(var(--border), 0);
            }

            .cybr-btn:after {
              background: var(--primary);
            }

            .cybr-btn__tag {
              position: absolute;
              padding: 1px 4px;
              letter-spacing: 1px;
              line-height: 1;
              bottom: -5%;
              right: 5%;
              font-weight: normal;
              color: hsl(0, 0%, 0%);
              font-size: var(--label-size);
            }

            .cybr-btn__glitch {
              position: absolute;
              top: calc(var(--border) * -1);
              left: calc(var(--border) * -1);
              right: calc(var(--border) * -1);
              bottom: calc(var(--border) * -1);
              background: var(--shadow-primary);
              text-shadow: 2px 2px var(--shadow-primary), -2px -2px var(--shadow-secondary);
              clip-path: var(--clip);
              animation: glitch 2s infinite;
              display: none;
            }

            .cybr-btn:hover .cybr-btn__glitch {
              display: block;
            }

            .cybr-btn__glitch:before {
              content: '';
              position: absolute;
              top: calc(var(--border) * 1);
              right: calc(var(--border) * 1);
              bottom: calc(var(--border) * 1);
              left: calc(var(--border) * 1);
              clip-path: var(--clip);
              background: var(--primary);
              z-index: -1;
            }

            @keyframes glitch {
              0% {
                clip-path: var(--clip-one);
              }
              2%, 8% {
                clip-path: var(--clip-two);
                transform: translate(calc(var(--shimmy-distance) * -1%), 0);
              }
              6% {
                clip-path: var(--clip-two);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
              }
              9% {
                clip-path: var(--clip-two);
                transform: translate(0, 0);
              }
              10% {
                clip-path: var(--clip-three);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
              }
              13% {
                clip-path: var(--clip-three);
                transform: translate(0, 0);
              }
              14%, 21% {
                clip-path: var(--clip-four);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
              }
              25% {
                clip-path: var(--clip-five);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
              }
              30% {
                clip-path: var(--clip-five);
                transform: translate(calc(var(--shimmy-distance) * -1%), 0);
              }
              35%, 45% {
                clip-path: var(--clip-six);
                transform: translate(calc(var(--shimmy-distance) * -1%));
              }
              40% {
                clip-path: var(--clip-six);
                transform: translate(calc(var(--shimmy-distance) * 1%));
              }
              50% {
                clip-path: var(--clip-six);
                transform: translate(0, 0);
              }
              55% {
                clip-path: var(--clip-seven);
                transform: translate(calc(var(--shimmy-distance) * 1%), 0);
              }
              60% {
                clip-path: var(--clip-seven);
                transform: translate(0, 0);
              }
              31%, 61%, 100% {
                clip-path: var(--clip-four);
              }
            }

.cybr-btn:nth-of-type(2) {
  --primary-hue: 260;
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="font-size: 33px">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/homepage/main')}}}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Oh-My Pet
                </div>
                <button class="cybr-btn">
                      >Mini-Homepage<span aria-hidden></span>
                      <span aria-hidden class="cybr-btn__glitch"><a href="{{ url('/homepage/main')}}">Mini-Homepage</a></span>
                      <span aria-hidden class="cybr-btn__tag"></span>
                    </button>
                    <button class="cybr-btn">
                      >explanation<span aria-hidden></span>
                      <span aria-hidden class="cybr-btn__glitch">explanation</span>
                      <span aria-hidden class="cybr-btn__tag"></span>
                </button>


            </div>
        </div>
    </body>
</html>
