<?php
include '../include/connect.inc.php';
include '../queries.php';
include '../functions.php';

$queries = new Queries();
$functions = new Functions();
?>
<span class="card-title">Add New Faculty</span>
<form autocomplete="off">
	<div class="row">
		<div class="input-field col s12 m3">
			<select name="title" id="title">
			<option value="" disabled selected>Choose title</option>
			<?php
			$titles = $queries->getTitlesAll();
			foreach($titles as $title) {
				echo "<option value='$title'>$title</option>";
			}
			?>
			</select>
			<label>Title</label>
		</div>
		<div class="input-field col s12 m6">
			<input type="text" name="name" id="name" required>
			<label>Full Name</label>
		</div>
		<div class="input-field col s12 m3">
			<select name="designation_id" id="designation_id">
    			<option value="" disabled selected>Choose your option</option>
				<?php
				$res = $queries->getDesignationsAll($conn);
				if($res->num_rows > 0) {
					while($row = $res->fetch_assoc()) {
						echo "<option value='".$row['id']."'>".$row['designation']."</option>";
					}
				}
				?>
			</select>
			<label>Designation</label>			
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12">
			<select name="department" id="department">
    			<option value="" disabled selected>Choose your option</option>
				<?php
				$res = $queries->getDepartmentsAll($conn);
				if($res->num_rows > 0) {
					while($row = $res->fetch_assoc()) {
						echo "<option value='".$row['dept']."'>".$row['department']."</option>";
					}
				}
				?>
			</select>
			<label>Department</label>
		</div>
	</div>
	<p class="light-text">
	Gender:
		<input type="radio" class="with-gap" name="gender" id="male" value="m">
		<label for="male">Male</label>
		<input type="radio" class="with-gap" name="gender" id="female" value="f">
		<label for="female">Female</label>
	</p>
	<div class="row">
		<div class="input-field col s12 m6">
			<input type="email" name="email" id="email" required>
			<label>Email</label>
		</div>
		<div class="input-field col m6 s12">
			<input type="text" name="phone" id="phone" required>
			<label>Phone No.</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12 m6">
			<input type="text" name="username" id="username" autocomplete="off" required>
			<label>Username</label>
		</div>
		<div class="input-field col s12 m6">
			<input type="password" name="password" id="password" autocomplete="off" required>
			<label>Password</label>
		</div>
	</div>
</form>
<div class="row">
	<div class="input-field col s12">
		<button class="btn waves-effect waves-light blue-grey lighten-1" id="addfaculty" name="action">Add Faculty
			<span><i class="fa fa-plus-circle"></i></span>
		</button>
	</div>
</div>