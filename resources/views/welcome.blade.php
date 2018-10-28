@extends('layouts\app')
    
    
@section('content')

    <div class="jumbotron text-center">
        <h1>Velkommen til ArcaBolig</h1>
        <p>Herfra kan du administrere alle dine ejendomme nemt og hurtigt</p>
            <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login </a> 
                <a class="btn btn-success btn-lg" href="/register" role="button">Register </a>
            </p>

        @component('components.who')
                                    
        @endcomponent
        
    </div>

@endsection