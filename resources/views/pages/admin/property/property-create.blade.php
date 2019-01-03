@extends('layouts\dashboard-app', ['sidebarHide' => true], ['sidebarAdmin' => true] )

@section('title', 'page with settings sidebar')

@section('content')
    


<div class="settings">

    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
        <li class="breadcrumb-item active"><a href="javascript:;">Data</a></li>
    </ol>
    <!-- end breadcrumb -->

    <!-- begin page-header -->
    <h1 class="page-header">Opret Ejendom</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h2 class="panel-title">- -</h2>
        </div>
        <div class="panel-body">
            <section>
            <form action="{{route("properties.store")}}" method="POST" >
                    @csrf
                   

                    {{-- {{'UsersController@update', $user->id}} --}}
                    <div class="form__body__columns" >
                            <div class="panel active" >

                                <div class="form__body__col form__body__col--first" >

                                        <div class="controls form__ctrl form__ctrl--mandatory " >
                                            <label class="form__ctrl__title" >Klient</label>
                                                
                                                <select   name="client_id" >
                                                            
                                                        @foreach ($clients as $client)
                                                            
                                                            <option value="{{$client->id}}">{{$client->client_name}}</option>
                                                        
                                                        @endforeach
                                                    
                                                </select>

                                        </div>

                                        <div class="controls form__ctrl  " >
                                            <label class="form__ctrl__title">Ejendommens Navn</label>
                                                <input value="" type="text" name="property_name" placeholder="">
                                        </div>

                                        <div class="controls form__ctrl form__ctrl--mandatory half" >
                                            <label class="form__ctrl__title">Adresse</label>
                                                <input value="" type="text" name="address" placeholder="" >
                                        </div>

                                        <div class="controls form__ctrl form__ctrl--mandatory half" >
                                            <label class="form__ctrl__title">Adresse 2</label>
                                                <input value="" type="text" name="address2" placeholder="" >
                                        </div>

                                        

                                        

                                </div>

                                <div class="form__body__col" >

                                        <div class="controls form__ctrl">
                                                <label class="form__ctrl__title" >Land</label>
                                                <select class="form-control" name="country">
                                                    
                                                    @foreach ($countries as $country)
                                                        @if ($country->id == 8)
                                                            <option value="{{$country->id}}" selected="selected">{{$country->country}}</option>
                                                        @else
                                                            <option value="{{$country->id}}">{{$country->country}}</option>
                                                        @endif
                                                        
                                                    @endforeach

                                                </select>
                                        </div> 
                                        
                                        {{-- <div class="controls form__ctrl form__ctrl--mandatory half" >
                                                <label class="form__ctrl__title" >Postnr.</label>
                                                    <input value="" type="text" name="zipcode" >
                                        </div> --}}

                                        <div class="controls form__ctrl form__ctrl--mandatory " >
                                                <label class="form__ctrl__title" >By</label>
                                                <select class="form-control" name="city">

                                                        @foreach ($cities as $city)
                                                            <option value="{{$city->id}}" >{{$city->zipcode}} - {{$city->City}}</option>
                                                        @endforeach

                                                </select>
                                        </div>

                                
                                </div>
                                
                                <div class="form__body__col" >

                                        <div class="controls form__ctrl form__ctrl--mandatory " >
                                            <label class="form__ctrl__title" >placeholder</label>
                                        <input value=""  type="text" name="placeholder" placeholder="">
                                        </div>
                                </div>
                                
                                <div class="form__body__col form__body__col--last">

                                        <div class="controls form__ctrl form__ctrl--mandatory " >
                                            <label class="form__ctrl__title" >placeholder</label>
                                                <input value=""  type="text" name="placeholder">
                                        </div>
                                            
                                        
                                
                                </div>

                            </div>
                    </div>
                    
                    <div class="modal-footer">
                            <button  id="save" type="submit" class="btn btn-success" data-toggle="modal">Gem</button>
                    </div>       
                
                </form>
            </section>
        </div>
    </div>

</div>


    @endsection

    @section('pageLevelJs')
    

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{{-- <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script> --}}
	{{-- <script src="../assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script> --}}
	{{-- <script src="../assets/js/demo/ui-modal-notification.demo.min.js"></script> --}}
	<!-- ================== END PAGE LEVEL JS ================== -->
    @endsection


