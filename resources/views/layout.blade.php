@include('header')

<div class="wrapper">

    <h1>{{ $pageTitle ?? '' }}</h1>

	@yield('content')

</div>

@include('footer')
