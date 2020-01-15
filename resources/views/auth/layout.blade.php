@include('header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('footer')
