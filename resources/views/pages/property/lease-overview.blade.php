
@extends('layouts\dashboard-app')

@section('title', 'user dashboard')

        @section('content')
        
                <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:;">Data</a></li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">Ejendoms Oversigt <small>...</small></h1>
                <!-- end page-header -->
                
                <!-- begin panel -->
                <div class="panel panel-inverse">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">DataTable </h4>
						</div>
						<!-- end panel-heading -->
						<!-- begin alert -->
						<div class="alert alert-secondary fade show">
							<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
							</button>
							In the modern world of responsive web design tables can often cause a particular problem for designers due to their row based layout. Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
						</div>
						<!-- end alert -->
						<!-- begin panel-body -->
						<div class="panel-body">

                            <!-- begin table -->
							<table id="data-table" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="1%"></th>
										<th width="1%" data-orderable="false"></th>
										<th class="text-nowrap">Adr. Nr</th>
										<th class="text-nowrap">Kunde Nr</th>
										<th class="text-nowrap">Beboer</th>
										<th class="text-nowrap">Total Leje</th>
                                        <th class="text-nowrap">Moms</th>
                                        <th class="text-nowrap">Leje</th>
                                        <th class="text-nowrap">Moms</th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd gradeX">
										<td width="1%" class="f-s-600 text-inverse">1</td>
										<td width="1%" class="with-img"><img src="../assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
										<td>Trident</td>
										<td>Internet Explorer 4.0</td>
										<td>Win 95+</td>
										<td>4</td>
										<td>X</td>
									</tr>
									<tr class="even gradeC">
										<td width="1%" class="f-s-600 text-inverse">2</td>
										<td width="1%" class="with-img"><img src="../assets/img/user/user-2.jpg" class="img-rounded height-30" /></td>
										<td>Trident</td>
										<td>Internet Explorer 5.0</td>
										<td>Win 95+</td>
										<td>5</td>
										<td>C</td>
									</tr>
									<tr class="odd gradeA">
										<td width="1%" class="f-s-600 text-inverse">3</td>
										<td width="1%" class="with-img"><img src="../assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
										<td>Trident</td>
										<td>Internet Explorer 5.5</td>
										<td>Win 95+</td>
										<td>5.5</td>
										<td>A</td>
									</tr>
									<tr class="even gradeA">
										<td width="1%" class="f-s-600 text-inverse">4</td>
										<td width="1%" class="with-img"><img src="../assets/img/user/user-4.jpg" class="img-rounded height-30" /></td>
										<td>Trident</td>
										<td>Internet Explorer 6</td>
										<td>Win 98+</td>
										<td>6</td>
										<td>A</td>
                                    </tr>
                                    
									
								</tbody>
							</table>
						</div>
						<!-- end panel-body -->
					</div>
                <!-- end panel -->
       
         @endsection
	
	
         @section('pageLevelJs')
         

         <script>

                

                $('#data-table').DataTable( {
                
               App.init();
                } );


        </script>
     
             <!-- ================== BEGIN PAGE LEVEL JS ================== -->
             {{-- <script src="../assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
             <script src="../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
             <script src="../assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
             <script src="../assets/js/demo/table-manage-responsive.demo.min.js"></script> --}}

         <!-- ================== END PAGE LEVEL JS ================== -->
         @endsection
     