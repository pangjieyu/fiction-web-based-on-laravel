<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WRITE-PFICTION</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
    {{--<script src="https://cdn.ckeditor.com/ckeditor5/10.0.0/decoupled-document/ckeditor.js"></script>--}}
    @include('vendor.ueditor.assets')
</head>
<body>
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
@include('layout._header')

<!-- 编辑器容器 -->
<div class="row" style="padding-top: 10px; height: auto;">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <script id="container" name="content" type="text/plain"></script>
    </div>
</div>
</body>
</html>

