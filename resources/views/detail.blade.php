<meta http-equiv="content-language" content="en">
<meta name="google" content="notranslate">

<html>

<head>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/top.css">
    <link rel="stylesheet" href="css/detail.css">
    <script src="js/detail.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ secure_asset('/favicon.ico') }}">
    @extends('layouts.app')
    @section('content')
</head>
<boby>
    <div class="MuiPaper-root MuiPaper-elevation MuiPaper-rounded MuiPaper-elevation0 css-fu3f3w">
        <div class="MuiGrid-root MuiGrid-container css-y503kw">
            <div class="MuiGrid-root MuiGrid-container css-sdy8ps">
                <a class="MuiTypography-root MuiTypography-inherit MuiLink-root MuiLink-underlineAlways css-1hw2e6a" href="#" onclick="return false;" target="_blank">応募する</a>
            </div>
        </div>
    </div>
    {!! $detail !!}
    </body>
    <footer class="footer">
        <div>© All rights reserved by yellow.</div>
    </footer>

</html>
@endsection