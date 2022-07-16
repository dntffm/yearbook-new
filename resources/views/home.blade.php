<!DOCTYPE html>
<html lang="en-US">
<head>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="{{asset('ipdf/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('ipdf/ipages.min.css')}}">
	<!-- /end css -->
</head>
<body>

<!-- flipbook markup -->
<div class="ipgs-flipbook" style="height: 500px" data-pdf-src="{{asset('sample/FEB PASCASARJANA isi.pdf')}}"></div>
<!-- /end flipbook markup -->
<!-- scripts-section -->
<script type="text/javascript" src="{{asset('ipdf/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('ipdf/pdf.min.js')}}"></script>
<script type="text/javascript" src="{{asset('ipdf/jquery.ipages.min.js')}}"></script>
<!-- /end scripts-section -->
</body>
</html>