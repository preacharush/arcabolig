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
    <h1 class="page-header">Opret bruger</h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h2 class="panel-title">- -</h2>
        </div>
        <div class="panel-body">
            <section>
                <form action="{{route('users.store')}}" method="POST" >
                    @csrf
                    

                    <div class="form__body__columns" >
                        <div class="panel active" >

                            <div class="form__body__col form__body__col--first" >

                                    <div class="controls form__ctrl form__ctrl--mandatory " >
                                        <label class="form__ctrl__title" >Navn</label>
                                            <input value=""  type="text" name="name">
                                    </div>

                                    <div class="controls form__ctrl form__ctrl--mandatory half" >
                                        <label class="form__ctrl__title">E-mail</label>
                                            <input value="" type="email" name="email" >
                                    </div>

                                    <div class="controls form__ctrl  half" >
                                        <label class="form__ctrl__title" >Kode</label>
                                            <input value="" type="password" name="password" >
                                    </div>
                            
                            </div>

                        </div>
                    </div>
                    
                    <div class="modal-footer">
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


