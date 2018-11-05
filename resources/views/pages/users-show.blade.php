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
  <h1 class="page-header">Brugere</h1>
  <!-- end page-header -->

  <!-- begin panel -->
  <div class="panel panel-inverse">
      <div class="panel-heading">
          <h2 class="panel-title">Opret bruger</h2>
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
                          
                            @foreach ($users as $user)
                            
                              <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}} </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>  
                                <td>
                                  <form action="{{route('users.destroy', $user->id)}}" method="POST" id='deleteForm'> {{ method_field('DELETE') }} @csrf
                                    <div class="btn btn-info btn-sm"><a href="{{route('users.edit', $user->id)}}" style="color:inherit;"> Rediger </div>
                                    |
                                      <button  type="submit" class="btn btn-danger btn-sm" style="text-decoration: none;"> slet </button>
                                  </form> 
                                </td>   
                              </tr>

                            @endforeach
                          
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


