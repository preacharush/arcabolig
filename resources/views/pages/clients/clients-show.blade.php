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
                              <th>Adr</th>
                              <th>Kontakt person</th>
                              <th>TLF</th>
                              <th>E-mail</th>
                              <th>Oprettet</th>
                            </tr>

                          </thead>

                          <tbody>
                          
                            @foreach ($clients as $client )
                             
                              <tr>
                                <td>{{$client->client_reg_nr}}</td>
                                <td>{{$client->client_name}}</td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->client_contact}}</td>  
                                <td>{{$client->client_phone1}}</td>  
                                <td>{{$client->email}}</td>  
                                <td>{{date('d M, Y',strtotime($client->created_at))}}</td>  
                                <td>
                                  <form action="{{route('client.destroy', $client->id)}}" method="POST" id='deleteClientForm'> {{ method_field('DELETE') }} @csrf
                                    <div class="btn btn-info btn-sm"> 
                                      <a href="{{route('client.edit', $client->id)}}" style="color:inherit;">Rediger </a> 
                                    </div>
                                    |
                                      <button  type="submit"  class="btn btn-danger btn-sm" > slet </button>
                                  </form> 
                                </td>   
                              </tr>

                            @endforeach
                          
                          </tbody>

                          <div class="modal-footer">
                            <a   href="{{route('client.create')}}"  class="btn btn-success">Opret</a>

                          </div>

                    </table>
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


