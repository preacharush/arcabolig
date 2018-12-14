@extends('layouts\dashboard-app', ['sidebarHide' => true], ['sidebarAdmin' => true] )

@section('title', 'page with settings sidebar')

@section('content')
    
@if ($flash = session('message'))
    <div class="alert alert-danger">
       <h2> {{ session('message') }} </h2>
    </div>
@endif

<div class="settings">

    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
        <li class="breadcrumb-item active"><a href="javascript:;">Data</a></li>
    </ol>
    <!-- end breadcrumb -->

    <!-- begin page-header -->
    <h1 class="page-header">Opret Virksomhed </h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h2 class="panel-title">Opret Virksomhed</h2>
        </div>
        <div class="panel-body">
            <section>
                <form action="{{ route('create-company.create') }}" method="POST" >
                    @csrf

                    <div class="form__body__columns" >
                        <div class="panel active" >

                            <div class="form__body__col form__body__col--first" >

                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                        <label class="form__ctrl__title" >Navn</label>
                                            <input value=""  type="text" name="comp_name">
                                    </div>

                                    <div class="controls form__ctrl form__ctrl--mandatory half" >
                                        <label class="form__ctrl__title">Adresse 1</label>
                                            <input value="" type="text" name="address" >
                                    </div>

                                    <div class="controls form__ctrl  half" >
                                        <label class="form__ctrl__title" >Adresse 2</label>
                                            <input value="" type="text" name="address2" >
                                    </div>


                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                        <label class="form__ctrl__title" >By</label>
                                        <select class="form-control" name="city">
                                                @foreach ($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->zipcode}} - {{$city->City}}</option>
                                                @endforeach
                                        </select>
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
                                        
                                        
                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                        <label class="form__ctrl__title" >Telefon</label>
                                            <input value=""  type="text" name="phone">
                                    </div>
                                        
                                    <div class="controls form__ctrl  half" >
                                        <label class="form__ctrl__title" >Fax</label>
                                            <input  type="text"></div>
                                        
                                    <div class="controls form__ctrl  half" >
                                        <label class="form__ctrl__title" >Mobil</label>
                                            <input  type="text" name="mobil">
                                    </div>
                                
                            </div>
                            
                            <div class="form__body__col" >

                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                        <label class="form__ctrl__title" >Kontaktperson</label>
                                            <input value=""  type="text" name="contactPerson">
                                    </div>
                                        
                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                        <label class="form__ctrl__title" >Kontakt-e-mail</label> 
                                            <input value=""  type="text" name="contactEmail">
                                    </div>
                                        
                                    <div class="controls form__ctrl  " >
                                        <label class="form__ctrl__title" >Hjemmeside</label>
                                            <input  type="text" name="website">
                                    </div>
                            
                            </div>
                            
                            <div class="form__body__col form__body__col--last">

                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                        <label class="form__ctrl__title" >E-mail-faktura til</label>
                                            <input value=""  type="text">
                                    </div>
                                        
                                    <div class="controls form__ctrl  " >
                                        <label class="form__ctrl__title" >CVR-nr.</label>
                                            <input value="" type="text" name="comp_reg_nr">
                                    </div>
                            
                            </div>

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                            <button class="btn btn-white" data-dismiss="modal">Annuller</button>
                            <button  id="save" type="submit" class="btn btn-success" data-toggle="modal">Opret</button>
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


