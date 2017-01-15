<?php $access = array(0); ?>
<?php include 'include/header.inc.php';?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3">
			            <div class="card-content">
			            	<span class="title">Last Visitors</span>
			            	<?php
			            		$q = $queries->getUsersAllOrderByLastVisit($conn);
			            		if($q->num_rows > 0) {
			            			echo '<ul class="collection">';
			            			while($row = $q->fetch_assoc()) {
			            				$name = $row['name'];
			            				$last_visit = $row['last_visit'];
			            				if(!empty($last_visit) || $last_visit!=null) {
			            					$lv = explode(' ', $last_visit);
			            					$date = $functions->prettyDateFormat($lv[0]);
				            				$time = $functions->prettyTimeFormat($lv[1]);
					            			echo '<li class="avatar collection-item">
					            			<img src="images/akgec.png" class="circle">
					            			<span class="title">'.$name.'</span>
											<p><b>Last Visit: </b>'.$date.' '.$time.'</p>
											</li>';
			            				}
			            			}
			            			echo '</ul>';
			            		}
			            		else echo "No users logged in still";
			            	?>
						</div>
			        </div>
			    </div>
			</div>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>
</body>
</html>