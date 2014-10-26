<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APIs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
    /* Global */
    body {
      background-color: #E9EAED;
    }
    .resource,
    .field {
      color: #46a800;
    }
    .type {
      color: #4285f4;
    }
    .docs-collapse {
      cursor: pointer;
    }
    /* Layout */
	.docs-navbar {
      background-color: #428bca;
    }
    .docs-sidebar {}
    .docs-main {}
    .docs-section {
        background-color: #fff;
        padding: 5px 20px;
        margin-bottom: 15px;
    }   
    footer {
      background-color: #f9f9f9;
      border-top: 1px solid #e5e5e5;
      color: #999;
      padding: 40px 0;
      text-align: center;
	}
    
	.docs-header {
	  font-size: 30px;
	  border-bottom: 1px solid #eee;
	  margin: 20px 0 10px;
      padding-bottom: 4px;
	}
	.docs-sub-header {
	  font-size: 24px;
      border-bottom: 1px solid #eee;
      margin: 20px 0 10px;
      padding-bottom: 4px;
    }
    .docs-table > thead > tr > th {
      background-color: #6199DF;
    }
    
    </style>
  </head>
  <body>
    <header role="navigation" class="navbar docs-navbar">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="../" class="navbar-brand">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Reference Table of Contents</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </header><!--/.navbar -->
    
	<div class="container">
	  <div class="row">
	  
        <div class="col-md-2">
          <div class="docs-sidebar">
            <ul class="nav nav-sidebar">
              <li><a href="{{ url('docs/branding-api/v1') }}">Home</a></li>
              <li>
                <a href="{{ url('docs/branding-api/v1/using-branding-api') }}">Using the Branding API</a>
                <a href="{{ url('docs/branding-api/v1/reference') }}">Reference</a>
                <ul>
                  <li><a href="{{ url('docs/branding-api/v1/reference/cars') }}">/cars</a></li>
                  <li><a href="{{ url('docs/branding-api/v1/reference/cars/:id') }}">/cars/:id</a></li>
                  <li><a href="{{ url('docs/branding-api/v1/reference/makers') }}">/makers</a></li>
                </ul>
              </li>
              <li><a href="{{ url('docs/branding-api/v1/changelog') }}">Changelog</a></li>
            </ul>
          </div><!-- /.docs-sidebar -->
        </div>
        
        <div class="col-md-10">
          <div class="docs-main" role="main">
          	@yield('content')	    		    
          </div><!-- /.docs-main -->
        </div>
        
	  </div>
    </div><!-- /.container -->

    <footer>
      <div class="container">
        <p><a href="#">Back to top</a></p>
      </div>
    </footer><!-- /.footer -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>