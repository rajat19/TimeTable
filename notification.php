<?php $access = array(0, 1, 2); ?>
<?php include 'include/header.inc.php'; ?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3">
			            <div class="card-content">
			            <span class="card-title">Notifications</span>
			            <?php
			            	$x = $functions->displayNotifications($conn, $queries, $g_userid);
			            	if(count($x) > 0) {
			            		echo '<ul class="collection">';
			            		foreach($x as $notif) {
			            			echo '<a class="link-grey" href="#!">';
			            			echo '<li class="avatar collection-item">
			            			<img src="images/akgec.png" class="circle">
			            			<span class="title">'.$notif[0].'</span>
									<p>'.$notif[3].'</p>
									<p><span class="notif-date">'.$notif[1].' '.$notif[2].'</span></p>
			            			</li>';
			            			echo "</a>";	
			            		}
			            		echo '</ul>';
			            	}
			            	else echo "No notifications yet";
			            ?>
			            </div>
			        </div>
			    </div>
			</div>
		</section>
	</div>
<?php include 'include/footer.inc.php'; ?>
<script type="text/javascript">
	
</script>