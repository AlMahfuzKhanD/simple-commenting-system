<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Jassa">
	<meta name="keywords" content="Jassa, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('asset/backend/img/icons/icon-48x48.png')}}">


	<title>Simple Comment System</title>

	<link href="{{asset('asset/backend/css2.css?family=Inter:wght@300;400;600&display=swap')}}" rel="stylesheet">

	<link class="js-stylesheet" href="{{ asset('asset/backend/css/light.css')}}" rel="stylesheet">
	<!-- Toastr CSS -->
	@include('common.common-css')
	<!-- Toastr CSS -->

	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Complete user registration first to create a blog post.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="{{route('store.user')}}" method="POST">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" required autocomplete="off">
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required autocomplete="off">
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" required>
										</div>
                                        <div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Enter password again" required>
										</div>
										<div class="text-center mt-3">
											
										 <button type="submit" class="btn btn-lg btn-primary">Sign up</button> 
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{ asset('asset/backend/js/app.js')}}"></script> 
	@include('common.common-js')
</body>

</html>