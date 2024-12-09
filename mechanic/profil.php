<?php require('./templates/header.php') ?>

<?php require('./templates/navbar.php') ?>

<div id="layoutSidenav">

    <?php require('./templates/sidebar.php') ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
             
                <div class="container bg-white p-4 border bordered rounded">
    <div class="row">
		<div class="col-12">
			
			<div class="my-5">
				<h3>Personal Information</h3>
				<hr>
			</div>

			<form class="settings">
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Contact detail</h4>
						
								<div class="col-md-6">
									<label class="form-label">First Name</label>
									<input type="text" class="form-control" placeholder="Enter first name" aria-label="First name" value="">
								</div>
								
								<div class="col-md-6">
									<label class="form-label">Last Name</label>
									<input type="text" class="form-control" placeholder="Enter last name" aria-label="Last name" value="">
								</div>
								
								<div class="col-md-6">
									<label class="form-label">Phone number</label>
									<input type="text" class="form-control" placeholder="Enter phone number" aria-label="Phone number" value="">
								</div>
								
								
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email</label>
									<input type="email" class="form-control" id="inputEmail4"  placeholder="Enter email" value="">
								</div>
								
							</div> 
						</div>
					</div>

				<!-- Social media detail -->
				<div class="row mb-5 gx-5">
					<div class="col-xxl-6 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Social media details</h4>
								
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-facebook me-2 text-facebook"></i>Facebook</label>
									<input type="text" class="form-control" placeholder="E.g: http://www.facebook.com" aria-label="Facebook" value="">
								</div>
								
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-twitter text-twitter me-2"></i>Twitter</label>
									<input type="text" class="form-control" placeholder="E.g: http://www.twitter.com" aria-label="Twitter" value="">
								</div>
								
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-linkedin-in text-linkedin me-2"></i>Linkedin</label>
									<input type="text" class="form-control" placeholder="E.g: http://www.linkedin.com" aria-label="Linkedin" value="">
								</div>
								
								<div class="col-md-6">
									<label class="form-label"><i class="fab fa-fw fa-instagram text-instagram me-2"></i>Instagram</label>
									<input type="text" class="form-control" placeholder="E.g: http://www.instragram.com" aria-label="Instragram" value="">
								</div>
							</div> 
						</div>
					</div>

					<!-- change password -->
					<div class="col-xxl-6">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="my-4">Change Password</h4>
								
								<div class="col-md-6">
									<label for="exampleInputPassword1" class="form-label">Old password</label>
									<input type="password" class="form-control" id="exampleInputPassword1">
								</div>
								
								<div class="col-md-6">
									<label for="exampleInputPassword2" class="form-label">New password</label>
									<input type="password" class="form-control" id="exampleInputPassword2">
								</div>
								
								<div class="col-md-12">
									<label for="exampleInputPassword3" class="form-label">Confirm Password</label>
									<input type="password" class="form-control" id="exampleInputPassword3">
								</div>
							</div>
						</div>
					</div>
				</div> 
				<!-- button -->
				<div class="gap-3 d-md-flex justify-content-md-end text-center">
					<button type="button" class="btn btn-danger btn-sm">Delete profile</button>
					<button type="button" class="btn btn-primary btn-sm">Update profile</button>
				</div>
			</form> 
		</div>
	</div>
	</div>

   
            </div>
        </main>
        <?php require('./templates/copyright.php') ?>
    </div>
</div>

<?php require('./templates/footer.php') ?>