@extends('layouts\dashboard-app', ['sidebarHide' => true], ['sidebarAdmin' => true] )

@section('title', 'page with settings sidebar')

@section('content')
    
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
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
        <h1 class="page-header">Indstillinger <small>Her kan du se og rette virksomhedens Indstillinger</small></h1>
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

                @php
                    // echo "<pre>";
                    // print_r($request->session()->all());
                    // echo "</pre>";
                @endphp
    
                            <section>

                                @if((Auth::user()->company_id) == null)
                                    <h2>Virksomhed <a href="/create-company" class="btn btn-sm btn-success">Opret</a></h2>
                                @else
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
                              
                                @endif
                                
                                    
                            </section>

                            @if((Auth::user()->company_id) != null)
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
                                                        
                                                    <form action="{{route('settings.update',Auth::user()->id)}}" method="POST" id='compInfoUpdateForm'>
                                                        @csrf
                                                        {{ method_field('patch') }}

                                                            <div class="form__body__columns" >
                                                                    <div class="panel active" >

                                                                        <div class="form__body__col form__body__col--first" >

                                                                                <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                    <label class="form__ctrl__title" >Navn</label>
                                                                                        <input value="{{$data->comp_name}}"  type="text" name="comp_name">
                                                                                </div>

                                                                                <div class="controls form__ctrl form__ctrl--mandatory half" >
                                                                                    <label class="form__ctrl__title">Adresse 1</label>
                                                                                        <input value="{{$data->address}}" type="text" name="address" >
                                                                                </div>

                                                                                <div class="controls form__ctrl  half" >
                                                                                    <label class="form__ctrl__title" >Adresse 2</label>
                                                                                        <input value="{{$data->address2}}" type="text" name="address2" >
                                                                                </div>

                                                                                <div class="controls form__ctrl  " >
                                                                                    <label class="form__ctrl__title" >CVR-nr.</label>
                                                                                        <input value="{{$data->Comp_reg_nr}}" type="text" name="comp_reg_nr">
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
                                                                                            <input value="{{$data->zipcode}}" type="text" name="zipcode" >
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
                                                                                    <label class="form__ctrl__title" >Kontaktperson</label>
                                                                                        <input value=""  type="text" name="contactPerson">
                                                                                </div>
                                                                                    
                                                                                <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                    <label class="form__ctrl__title" >Kontakt-e-mail</label> 
                                                                                        <input value=""  type="text" name="contactEmail">
                                                                                </div>

                                                                                <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                        <label class="form__ctrl__title" >Telefon</label>
                                                                                            <input value="{{$data->phone}}"  type="text" name="phone">
                                                                                </div>

                                                                                <div class="controls form__ctrl  half" >
                                                                                        <label class="form__ctrl__title" >Mobil</label>
                                                                                            <input  type="text" name="mobil">
                                                                                </div>
                                                                                    
                                                                                <div class="controls form__ctrl  " >
                                                                                    <label class="form__ctrl__title" >Hjemmeside</label>
                                                                                        <input  type="text" name="website">
                                                                                </div>
                                                                        
                                                                        </div>
                                                                        
                                                                        <div class="form__body__col form__body__col--last">

                                                                                <div class="controls form__ctrl form__ctrl--mandatory " >
                                                                                    <label class="form__ctrl__title" >E-mail-faktura til</label>
                                                                                        <input value=""  type="text"></div>
                                                                                    
                                                                                
                                                                        
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
                            @endif
                            
                                        


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


        // $('#save').on('click', function (e) {
           
        //     $('#modal-dialog').modal('toggle');
            
        // //    e.preventDefault();
        // })


      $('#compInfoUpdateForm').submit(function(e){
            var url=$(this).closest('form').attr('action');
            e.preventDefault();
        
            $.ajax({
                url:url,
                type:'post',
                data:$('#compInfoUpdateForm').serialize(),
                success:function(){
                    $('#modal-dialog').modal('toggle');
                    location.reload();
                    
                    }
                });
                 
        });

        

    </script>

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{{-- <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script> --}}
	{{-- <script src="../assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script> --}}
	{{-- <script src="../assets/js/demo/ui-modal-notification.demo.min.js"></script> --}}
	<!-- ================== END PAGE LEVEL JS ================== -->
    @endsection


