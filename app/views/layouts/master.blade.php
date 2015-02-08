<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        @if(!empty($page_title))
        <title>{{{$page_title}}} | Brian Gilbreath</title>
        @if(!empty($page_description))
        <meta name="description" content="{{{$page_description}}}">
        @endif
        @else
        <title>Brian Gilbreath</title>
        <meta name="description" content="The official site of Brian Gilbreath. Learn about PHP, Laravel, Wordpress, Front End Web Development, and CSS.">
        @endif
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="/images/brian-gilbreath-logo.png" type="image/x-icon" />

        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
        <![endif]-->

        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/animate.css'); }}
        {{ HTML::style('css/image-picker.css'); }}
        {{ HTML::style('css/main.css'); }}

        @if(isset($post))
            @if($post->photos->first())
            <style>
                .hero{
                    background:url('/uploads/{{$post->photos()->first()['name']}}');
                    background-size: cover;
                    background-position-y: 20%;
                }
            </style>
            @endif
        @endif
    </head>
    <body>
        <header class="hero" role="banner">
            <hgroup>
                <div class="logo"><a href="/">{{ HTML::image('images/brian-gilbreath-logo.png', $alt="Brian Gilbreath", $attributes = array()) }} <div class="name">Brian Gilbreath</div></a></div>
            
                 <nav class="inner">
                    <div class="navigation">
                        <div class="top-border"></div>
                        <ul role="navigation">
                            <li> {{link_to('tag/articles', 'Articles')}} </li>
                            <li> {{link_to('tag/thoughts', 'Thoughts')}} </li>
                            <li> {{link_to('about', 'About')}} </li>
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
                <div class="logo">
                    <a href="/">{{ HTML::image('images/brian-gilbreath-logo.png', $alt="Brian Gilbreath", $attributes = array()) }} <div class="name">Brian Gilbreath.com</div></a>
                    <div class="name">Site custom made with <a href="http://laravel.com/" target="_blank">Laravel PHP</a> by Brian Gilbreath</div>
                </div>
                <br><br>
                <div class="copyright"> &copy; {{date('Y')}} Brian Gilbreath</div>

            </div>
        </footer>

        {{ HTML::script('js/jquery-1.11.1.min.js') }}
        {{ HTML::script('js/bootstrap.min.js'); }}
        {{ HTML::script('js/image-picker.min.js'); }}
        {{ HTML::script('js/master.js'); }}

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-8536421-6', 'auto');
          ga('send', 'pageview');

        </script>

    </body>
</html>