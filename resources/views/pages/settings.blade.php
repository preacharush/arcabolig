@extends('layouts\dashboard-app', ['sidebarHide' => true], ['sidebarSettings' => true] )

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
        <h1 class="page-header">Page Header <small>header small text goes here...</small></h1>
        <!-- end page-header -->

        <!-- begin panel -->
        <div class="panel panel-inverse">

                <div class="panel-heading">

                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>

                    <h2 class="panel-title">Stamoplysninger</h2>

                </div>
        
            <div class="panel-body">
    
                            <section>
                                
                                    <h2>Virksomhed <a href="#modal-dialog" class="btn btn-sm btn-success" id="rediger1" data-toggle="modal">Redigér</a></h2>
                                
                        
                                        <div class="column">
                                            <h3>Navn og adresse</h3>
                                            <p>
                                                {{$data->comp_name}}<br>
                                                {{$data->address}}<br>
                                                {{$data->city}} {{$data->zipcode}}<br>  
                                            </p>
                                                <h3>CVR-nr.</h3>
                                                <p>{{$data->Comp_reg_nr}}</p>
                                            
                                        </div>
                        
                                        <div class="column">
                                            
                                                <h3>Telefon</h3>
                                                <p>{{$data->phone}}</p>
                                            
                                        </div>
                        
                                        <div class="column">
                                            
                                                <h3>Kontakt-e-mail</h3>
                                                <p>{{$data->email}}</p>
                                            
                                                <h3>E-mail- faktura til</h3>
                                                <p>xxxxxxxxxxxxxxxxx</p>
                                            
                                        </div>
                            </section>
                            
                                        <!-- #modal-dialog -->
                                        <div class="modal fade" id="modal-dialog">
                                            <div class="modal-dialog settings">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Navn - adresse - kontakt</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body" >

                                                        <div id="company-info">
                                                            
                                                        <form action="{{ route('settings.store') }}" method="POST" >
                                                            @csrf

                                                                <div class="form__body__columns" >
                                                                        <div class="panel active" >

                                                                            <div class="form__body__col form__body__col--first" >

                                                                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                        <label class="form__ctrl__title" >Navn</label>
                                                                                            <input value="{{$data->comp_name}}"  type="text" name="comp_name"></div>

                                                                                    <div class="controls form__ctrl form__ctrl--mandatory half" >
                                                                                        <label class="form__ctrl__title">Adresse 1</label>
                                                                                            <input value="{{$data->address}}" type="text" name="address" ></div>

                                                                                    <div class="controls form__ctrl  half" >
                                                                                        <label class="form__ctrl__title" >Adresse 2</label>
                                                                                            <input value="{{$data->address2}}" type="text" name="address2" ></div>

                                                                                    <div class="controls form__ctrl form__ctrl--mandatory half" >
                                                                                        <label class="form__ctrl__title" >Postnr.</label>
                                                                                            <input value="{{$data->zipcode}}" type="text" name="zipcode" ></div>

                                                                                    <div class="controls form__ctrl form__ctrl--mandatory half" >
                                                                                        <label class="form__ctrl__title" >By</label>
                                                                                            <input value="{{$data->city}}" type="text" name="city" ></div>
                                                                            
                                                                            </div>

                                                                            <div class="form__body__col" >

                                                                                    <div class="controls form__ctrl  " >
                                                                                        <label class="form__ctrl__title" >Land</label>
                                                                                            <input value="{{$data->country}}"  type="text" name="country"></div>
                                                                                        
                                                                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                        <label class="form__ctrl__title" >Telefon</label>
                                                                                            <input value="{{$data->phone}}"  type="text" name="phone"></div>
                                                                                        
                                                                                    <div class="controls form__ctrl  half" >
                                                                                        <label class="form__ctrl__title" >Fax</label>
                                                                                            <input  type="text"></div>
                                                                                        
                                                                                    <div class="controls form__ctrl  half" >
                                                                                        <label class="form__ctrl__title" >Mobil</label>
                                                                                            <input  type="text" name="mobil"></div>
                                                                            
                                                                            </div>
                                                                            
                                                                            <div class="form__body__col" >

                                                                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                        <label class="form__ctrl__title" >Kontaktperson</label>
                                                                                            <input value=""  type="text" name="contactPerson"></div>
                                                                                        
                                                                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                        <label class="form__ctrl__title" >Kontakt-e-mail</label> 
                                                                                            <input value=""  type="text" name="contactEmail"></div>
                                                                                        
                                                                                    <div class="controls form__ctrl  " >
                                                                                        <label class="form__ctrl__title" >Hjemmeside</label>
                                                                                            <input  type="text" name="website"></div>
                                                                            
                                                                            </div>
                                                                            
                                                                            <div class="form__body__col form__body__col--last">

                                                                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                        <label class="form__ctrl__title" >E-mail-faktura til</label>
                                                                                            <input value=""  type="text"></div>
                                                                                        
                                                                                    <div class="controls form__ctrl  " >
                                                                                        <label class="form__ctrl__title" >CVR-nr.</label>
                                                                                            <input value="{{$data->Comp_reg_nr}}" type="text" name="comp_reg_nr"></div>
                                                                            
                                                                            </div>

                                                                        </div>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                        <button class="btn btn-white" data-dismiss="modal">Annuller</button>
                                                                        <button  id="save" type="submit" class="btn btn-success" data-toggle="modal">Gem</button>
                                                                </div>       
                                                            
                                                            </form>
                                                        
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                            <section>
                                
                                <h2>Øvrige oplysninger <a href="#" class="btn btn-sm btn-success" data-toggle="modal"> Redigér</a></h2>
                        
                                    <div class="column">
                                        <h3>Bankoplysninger</h3>
                                            <p>
                                                Danske bank<br>
                                                4183<br>
                                                4180274367
                                            </p>
                                    </div>

                                        <div class="column">
                                                    
                                        </div>

                                <div class="column admin-column">
                                    
                                    <h3>Administratoroplysninger</h3>
                                    
                                            <p>Administrator 1: 123135 - BDO Statsautoriseret revisionsaktieselskab – København</p>
                                        
                                            <p>Administrator 2: 1179240 - Arca Holding - Koncern</p>
                                        
                                            <p>Administrator 3: 1291161 - BDO Statsautoriseret Revisionsaktieselskab – Danmark</p>
                                        
                                </div>

                            </section>
                                  
             </div>
     </div>
</div>


    @endsection

    @section('pageLevelJs')
    <script>
       $('#rediger1').on('click', function (e) {
          

        
        
        })


        $('#save').on('click', function (e) {
           
            $('#modal-dialog').modal('toggle');
            
           e.preventDefault();
        })

    </script>

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{{-- <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script> --}}
	{{-- <script src="../assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script> --}}
	{{-- <script src="../assets/js/demo/ui-modal-notification.demo.min.js"></script> --}}
	<!-- ================== END PAGE LEVEL JS ================== -->
    @endsection


