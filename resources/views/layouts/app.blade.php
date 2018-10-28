<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
   
<head>

        @include('includes.head')

</head>

<body>
    
    <div id="app">
        
        @include('includes/navbar')

        <main class="py-4">

            @yield('content')
        
        </main>
    
    </div>

    @include('includes.page-js')

</body>

</html>
