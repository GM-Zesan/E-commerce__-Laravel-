@extends('layout/template')
@section('title')
    My_Profile
@endsection
@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Welcome
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ (!empty($user->image))?$user->image:
							url('public/frontend/images/about-01.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h1 class="p-b-16 text-center">
						<strong>{{ $user->name }}</strong>
					</h1>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Genarel Info</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered text-center">
								<thead>
									<tr>
										<th class="text-center" style="width: 180px">Title</th>
										<th class="text-center">Information</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										Are you want to 
										<strong>
											<a href="{{ route('edit.profile') }}">
												<i class="fa fa-edit"></i> 
												Edit
											</a>
										</strong>
										your Information?
									</tr>
									<tr>
										<td>
											<i class="fa fa-envelope"></i> 
											<strong>E-mail Address</strong>
										</td>
										<td>{{ $user->email }}</td>
									</tr>

									<tr>
										<td>
											<i class="fa fa-map-marker"></i> 
											<strong>Present Address</strong>
										</td>
										<td>{{ $user->address }}</td>
									</tr>

									<tr>
										<td>
											<i class="fa fa-phone"></i> 
											<strong>Phone No.</strong>
										</td>
										<td>{{ $user->mobile }}</td>
									</tr>

									<tr>
										<td>
											<i class="fa fa-user"></i> 
											<strong>Gender</strong>
										</td>
										<td>{{ $user->gender }}</td>
									</tr>
								</tbody>
								
							</table>
							<a href="{{ route('edit.profile') }}">
								<button type="button" class="btn btn-block btn-dark">Edit</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection