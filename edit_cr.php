<?php $access = array(0); ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">Change Class Representatives</span>
							<table class="bordered responsive-table">
								<thead><tr><td>Class</td><td>Class Representative</td><td></td></tr></thead>
								<?php
									$c = $queries->getClassesAll($conn);
									while($row = $c->fetch_assoc()) {
										$class_id = $row['id'];
										$class_name = $functions->getClassName($conn, $queries, $class_id)[0];
										$cr_id = $row['cr_id'];
										$cr_name = $queries->getUserById($conn, $cr_id)->fetch_assoc()['name'];
										echo "<tr>";
										echo "<td>$class_name</td>";
										echo "<td id='x-$cr_id'>$cr_name</td>";
										echo "<td id='u-$cr_id' class='center'><button id='edit-$cr_id' onclick='cr_form($cr_id, \"$cr_name\");' class='btn-floating waves-effect waves-light blue lighten-1'><span><i class='fa fa-edit'></i></span></button></td>";
										echo "</tr>";
									}
								?>
							</table>					
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	function cr_form(cr_id, cr_name) {
		$('#x-'+cr_id).html("<input type='text' id='newname-"+cr_id+"' value='"+cr_name+"'><input type='hidden' value='"+cr_id+"' id='newcr-"+cr_id+"'>");
		$('#u-'+cr_id).html("<button id='changecr' onclick='lol("+cr_id+")' class='btn-floating waves-effect waves-light green lighten-1'><span><i class='fa fa-check'></i></span></button>");
	}

	function lol(xid) {
		var newname = $('#newname-'+xid).val();
		var cr_id = $('#newcr-'+xid).val();
		$.post("ajax/edit_cr.php", {
			cr_id: cr_id,
			newname: newname
		},
		function(response, status) {
			var data = JSON.parse(response);
			swal(data[0], data[1], data[2]);
			if(data[3]==1) {
				$('#x-'+cr_id).html(newname);
				$('#u-'+cr_id).html("<button id='edit-"+cr_id+"' onclick='cr_form("+cr_id+", \""+newname+"\");' class='btn-floating waves-effect waves-light blue lighten-1'><span><i class='fa fa-edit'></i></span></button>");
			}
		});
	}
</script>