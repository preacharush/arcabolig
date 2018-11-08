@extends('layouts\dashboard-app', ['sidebarHide' => false], ['sidebarSettings' => false] )

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
  <h1 class="page-header">Klienter</h1>
  <!-- end page-header -->

  <!-- begin panel -->
  <div class="panel panel-inverse">
      <div class="panel-heading">
          <h2 class="panel-title">Klient oversigt</h2>
      </div>
      
      <div class="panel-body">
          <section>
                  <table class="table">
                          
                          <thead>
                            
                            <tr>
                              <th>ID</th>
                              <th>Navn</th>
                              <th>E-mail</th>
                              <th>Oprettet</th>
                            </tr>

                          </thead>

                          <tbody>
                          
                            {{-- @foreach ( as ) --}}
                            
                              <tr>
                                <td>1</td>
                                <td>2 </td>
                                <td>3</td>
                                <td>4</td>  
                                <td>
                                  <form action="" method="POST" id='deleteForm'> {{ method_field('DELETE') }} @csrf
                                    <div class="btn btn-info btn-sm">Rediger <a href="" style="color:inherit;"> 
                                    
                                    </div>
                                    |
                                      <button  type="submit"  class="btn btn-danger btn-sm"  > slet </button>
                                  </form> 
                                </td>   
                              </tr>

                            {{-- @endforeach --}}
                          
                          </tbody>

                          <div class="modal-footer">
                            <a   href="/users/create"  class="btn btn-success">Opret</a>

                          </div>

                    </table>
          </section>
      </div>
  </div>
</div>


    @endsection

    @section('pageLevelJs')
    <script>
     

     $('#deleteForm').submit(function(e){
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


