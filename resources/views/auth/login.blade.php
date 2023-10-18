<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->

	<!-- Bootstrap CSS -->
	<link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('backend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet">
	<title>CRICKET SCORING  | DASHBOARD | ADMIN</title>
</head>
<body class="bg-theme bg-theme1">
    <!--wrapper-->
	<div class="wrapper">
		<header class="login-header shadow">

		</header>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-7 my-lg-4">
			<div class="container-fluid">
				<div class="row" style="max-width:50%;margin-left:25%;">
					<div class="col mx-auto">
						<div class="card mt-2 mt-lg-0">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class=""> CRICKET SCORING DASHBOARD</h3>
                                        <br>
                                        <h3>SIGN IN</h3>

									</div>


									<div class="form-body">

                                        <form class="row g-3" method="POST" action="{{ route('login') }}">
                                          @csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text"><i class='bx bx-hide'></i></a>
												</div>
											</div>

											<div class="col-12">
												<div class="d-grid">
													<button type="submit" id="signIn" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		<footer class="bg-dark shadow-sm p-2 text-center fixed-bottom">
			<!-- <p class="mb-0 text-white">Copyright © 2023 All right reserved.</p> -->
		</footer>
	</div>
	<!--end wrapper-->
</body>
