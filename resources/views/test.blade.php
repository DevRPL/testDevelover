<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Test 1') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
           <div class="container">
			    <div class="row justify-content-center">
			        <div class="col-md-8">
			            <div class="card">
			                <div class="card-header">Test 1</div>
								<!-- @foreach (['error', 'success'] as $status)
								    @if(Session::has($status))
								        <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
								    @endif
								@endforeach -->

								@if ($message = Session::get('success'))
							      <div class="alert alert-success alert-block">
							        <button type="button" class="close" data-dismiss="alert">×</button> 
							          <strong>{{ $message }}</strong>
							      </div>
							    @endif

							    @if ($message = Session::get('error'))
							      <div class="alert alert-danger alert-block">
							        <button type="button" class="close" data-dismiss="alert">×</button> 
							        <strong>{{ $message }}</strong>
							      </div>
							    @endif
			                <div class="card-body">
		                	   <form method="POST" action="{{ url('sendPost') }}">
		                	   	{{ csrf_field() }}
			                    <div class="row">
			                    	<div class="col-md-6">
			                    		  <label for="email" class="col-form-label text-md-right">Word 1</label>
			                    		 <input type="text" class="form-control"
			                                name="word1" value="{{ old('word1') }}" required autocomplete="off" placeholder="Word 1">
			                    	</div>
			                    	<div class="col-md-6">
			                    		  <label for="email" class="col-form-label text-md-right">Word 2</label>
			                    		 <input type="text" class="form-control"
			                                name="word2" value="{{ old('word2') }}" required autocomplete="off" placeholder="Word 2">
			                    	</div>
			                    </div>
			                    <div class="pt-2">
			                       <button type="submit" class="btn btn-primary">
	                                    Submit
	                                </button>
	                            </div>
		                	   </form>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
        </main>
    </div>
</body>
</html>
