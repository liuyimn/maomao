<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="{{ asset('/home/forget/bootstrap.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('/home/forget/bootstrap.min.css') }}">
</head>
<body>
	 @if(session('info'))
        <div class="alert alert-danger">
            {{ session('info') }}
        </div>
     @endif
</body>
</html>