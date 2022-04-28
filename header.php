<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
	<div class="container">
		

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><i class="fas fa-align-left"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <?php if (isset($_SESSION['BBNUMBER'])) { ?>

		<ul class="navbar-nav ml-auto">
			
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="request.php">Blood Request</a>
            </li>
		<li class="nav-item">
                <a class="nav-link btn btn-light" href="hospital.php">Hospital.php</a>
            </li>
			<li class="nav-item">
				<a class="nav-link btn btn-light" href="blood.php">Available blood samples</a>
            </li>
	    
            
            <li class="nav-item">
                <a class="nav-link btn btn-danger btn-sm font-weight-bold" href="logout.php">Logout</a>
            </li>
        </ul>

        <?php } elseif (isset($_SESSION['PATIENTID'])) { ?>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="request.php">Sent Blood Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="blood.php">Available blood samples</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link btn btn-danger btn-sm font-weight-bold" href="logout.php">Logout</a>
            </li>
        </ul>

        <?php }  else { ?>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-light" href="blood.php">Available blood samples</a>
            </li>
		<li class="nav-item">
                <a class="nav-link btn btn-light" href="patient.php">Patient list</a>
            </li>
		</li>
		<li class="nav-item">
                <a class="nav-link btn btn-light" href="hospital.php">Hospital list</a>
            </li>
		<li class="nav-item">
                <a class="nav-link btn btn-light" href="donor.php">Donor list</a>
            </li>
		<li class="nav-item">
                <a class="nav-link btn btn-danger btn-sm font-weight-bold" href="logout.php">Logout</a>
            </li>
	   
        </ul>

        <?php } ?>
       </div>
    </div>
</nav>