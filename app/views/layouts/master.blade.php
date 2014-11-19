<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Brian Gilbreath</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,700' rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
        <![endif]-->

        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/animate.css'); }}
        {{ HTML::style('css/image-picker.css'); }}
        {{ HTML::style('css/main.css'); }}


    </head>
    <body>
        <header class="hero" role="banner">
            <hgroup>
                <div class="logo"><a href="/">{{ HTML::image('images/brian-gilbreath-logo.png', $alt="Brian Gilbreath", $attributes = array()) }} <div class="name">Brian Gilbreath</div></a></div>
            
                 <nav class="inner">
                    <div class="navigation">
                        <div class="top-border"></div>
                        <ul role="navigation">
                            <li> {{link_to('tag/1', 'Category 1')}} </li>
                            <li> {{link_to('tag/2', 'Category 2')}} </li>
                        </ul>
                    </div>
                </nav>

            </hgroup>
        </header>

        <div class="inner">
                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
        </div>

        <div class="content container-fluid">
            <div class="inner">
       
                @yield('content')

            </div>
        </div>


        <footer class="footer">
            <div class="inner">
                <div class="logo"><a href="/">{{ HTML::image('images/brian-gilbreath-logo.png', $alt="Brian Gilbreath", $attributes = array()) }} <div class="name">Brian Gilbreath.com</div></a></div>
               <div class="copyright"> &copy; {{date('Y')}} Brian Gilbreath</div>
            </div>
        </footer>

        {{ HTML::script('js/jquery-1.11.1.min.js') }}
        {{ HTML::script('js/bootstrap.min.js'); }}
        {{ HTML::script('js/image-picker.min.js'); }}
        {{ HTML::script('js/master.js'); }}

    </body>
</html>