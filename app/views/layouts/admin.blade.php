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
        {{ HTML::style('css/admin.css'); }}

    </head>
    <body class="admin">
        <header role="banner">

        	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		      <div class="container-fluid">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="/">{{ HTML::image('images/brian-gilbreath-logo.png', $alt="Brian Gilbreath", $attributes = array()) }}</a>
		          <a class="navbar-brand" href="/">briangilbreath.com</a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		           <ul class="nav navbar-nav navbar-left">
		           	 <li><a href="/admin">Dashboard</a></li>
		           </ul>
		           <ul class="nav navbar-nav navbar-right">
		            <li><a href="#">Settings</a></li>
		            <li><a href="/logout">Logout</a></li>
		           </ul>
		   
		        </div>
		      </div>
		    </nav>
          
        </header>
  
       
        <div class="container-fluid">

        	<div class="row">

	            <div class="col-sm-3 col-md-2 sidebar">
		          <ul class="nav nav-sidebar">
		          	<h4>Posts</h4>
		            <li>{{ link_to_route('admin.post.create', 'Create Post')}}</li>
					<li>{{ link_to_route('admin.post.index', 'Post Listing')}}</li>
		          </ul>
		          <ul class="nav nav-sidebar">
		            <h4>Tags</h4>
		            <li>{{ link_to_route('admin.tag.create', 'Create Tag')}}</li>
					<li>{{ link_to_route('admin.tag.index', 'Tag Listing')}}</li>
		          </ul>
		          <ul class="nav nav-sidebar">
		            <h4>Images</h4>
		            <li>{{ link_to_route('admin.photo.create', 'Upload Image')}}</li>
					<li>{{ link_to_route('admin.photo.index', 'Image Listing')}}</li>
		          </ul>
		        </div>

		        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		        	
		        	<!-- will be used to show any messages -->
	                @if (Session::has('message'))
	                    <div class="alert alert-info">{{ Session::get('message') }}</div>
	                @endif

	                @yield('content')

	                <footer class="footer">
			            <div class="inner">
			                <div class="logo"><a href="/">{{ HTML::image('images/brian-gilbreath-logo.png', $alt="Brian Gilbreath", $attributes = array()) }} <div class="name">Brian Gilbreath.com</div></a></div>
			               <div class="copyright"> &copy; {{date('Y')}} Brian Gilbreath</div>
			            </div>
			        </footer>

	            </div>

           </div>
        </div>


      

        {{ HTML::script('js/jquery-1.11.1.min.js') }}
        {{ HTML::script('js/bootstrap.min.js'); }}
        {{ HTML::script('js/image-picker.min.js'); }}
        {{ HTML::script('js/admin.js'); }}

    </body>
</html>