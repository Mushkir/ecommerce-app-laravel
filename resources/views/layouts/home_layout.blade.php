<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>

    @section('main-content')

    @show

    @include('home.footer')

</body>

</html>
