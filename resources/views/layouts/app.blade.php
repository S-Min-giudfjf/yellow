<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>求人検索｜IT/Web業界の求人</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="height60 padding0 navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="height60 widthMax container justify" style="background-color: khaki; justify-content: center;">
                <a class="wordColorBlack appNamePx paddingLeft navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form action="search" method="GET" class="middle">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                        </ul>
                        <!-- 職種 -->
                        <select
                            class="width230 height40 wordColorGlay borderRight borderColor overflowHidden paddingTop1"
                            name="jobKinds">
                            <option value="0" {{$jobKinds1}}>職種</option>
                            <option value="1" {{$jobKinds2}}>営業</option>
                            <option value="2" {{$jobKinds3}}>エンジニア</option>
                            <option value="3" {{$jobKinds4}}>マーケティング</option>
                        </select>
                        <!--勤務地 -->
                        <select
                            class="width230 height40 wordColorGlay wordColorGlay borderRight borderColor overflowHidden paddingTop1"
                            name="jobLand">
                            <option value="0" {{$jobLand1}}>勤務地</option>
                            <option value="1" {{$jobLand2}}>東京</option>
                            <option value="2" {{$jobLand3}}>大阪</option>
                            <option value="3" {{$jobLand4}}>フルリモート</option>
                        </select>
                        <!--年収-->
                        <select
                            class="width230 height40 wordColorGlay borderRight borderColor overflowHidden paddingTop1"
                            name="income">
                            <option value="0" {{$income1}}>年収</option>
                            <option value="300" {{$income2}}>300万円以上</option>
                            <option value="400" {{$income3}}>400万円以上</option>
                            <option value="500" {{$income4}}>500万円以上</option>
                            <option value="600" {{$income5}}>600万円以上</option>
                        </select>
                        <!--フリーワード-->
                        <input type="text"
                            class="width230 height40 wordColorGlay borderRight borderColor overflowHidden"
                            onfocus="if (this.value == 'フリーワード') this.value = '';"
                            onblur="if (this.value == '') this.value = 'フリーワード';" {{$freeWord}} name="freeWord" />
                        <!--検索ボタン-->
                        <input type="submit" name="FORM_NAME2"
                            class="width65 height41 wordColorGlay borderNone borderColor searchBtnColor paddingTop1 marginRight99"
                            value="🔍">
                        <!-- Right Side Of Navbar -->
                    </div>
                </form>
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">会員登録</a>
                    </li>
                    @endif

                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    @endif

                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>