@extends('layouts\dashboard-app', ['sidebarHide' => false], ['sidebarAdmin' => false] )

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
  <h1 class="page-header">Ejendoms data</h1>
  <!-- end page-header -->

  <!-- begin panel -->
  <div class="panel panel-inverse">
      <div class="panel-heading">
          <h2 class="panel-title">Ejendoms oversigt</h2>
      </div>
      
      <div class="panel-body">

                <section>
                 
                  <div class="container" style="height: 500px">

                      <div class="row" style="height: 300px">
                        <div class="col bg-info text-white mr-1">
                          1 of 2
                          <br>
                          more text
                          
                        </div>
                        <div class="col bg-info text-white">
                          2 of 2
                        </div>
                      </div>
                  </div> 

          </section>
      </div>
  </div>
</div>


    @endsection

    @section('pageLevelJs')
    <script>
     

     $('#deleteClientForm').submit(function(e){
           var url=$(this).closest('form').attr('action');
           e.preventDefault();
       
           $.ajax({
               url:url,
               type:'post',
               data:$('#deleteForm').serialize(),
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


