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
                            <td><a href="{{route('users.edit', $user->id)}}" > {{$user->name}} </td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->created_at}}</td>
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
    

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	{{-- <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script> --}}
	{{-- <script src="../assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script> --}}
	{{-- <script src="../assets/js/demo/ui-modal-notification.demo.min.js"></script> --}}
	<!-- ================== END PAGE LEVEL JS ================== -->
    @endsection


