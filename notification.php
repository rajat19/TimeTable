<?php $access = array(0, 1, 2); ?>
<?php include 'include/header.inc.php'; ?>
<?php
	$per_page = 4;
	$x = $functions->displayNotifications($conn, $queries, $g_userid);
	$total_results = count($x);
	$total_pages = ceil($total_results / $per_page);
	if (isset($_GET['page'])) {
		$show_page = $_GET['page']; //current page
		if ($show_page > 0 && $show_page <= $total_pages) {
			$start = ($show_page - 1) * $per_page;
			$end = $start + $per_page;
		}
		else {
			$start = 0;
			$end = $per_page;
		}
		$page = intval($_GET['page']);
	}
	else {
		$start = 0;
		$end = $per_page;
		$page = 1;
	}
	
	$tpages=$total_pages;
	if ($page <= 0)
		$page = 1;

	$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
?>
	<div class="container">
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-3">
			            <div class="card-content">
			            <span class="card-title">Notifications</span>
			            <?php
			            	// $x = $functions->displayNotifications($conn, $queries, $g_userid);
			            	if(count($x) > 0) {
			            		echo '<ul class="collection">';
			            		// foreach($x as $notif) {
			            		for ($i = $start; $i < $end; $i++) {
			            			if ($i == $total_results) {
										break;
									}
									$notif = $x[$i];
									$q = $queries->updateNotificationRead($conn, $notif[4]);
			            			echo '<li class="avatar collection-item">';
			            			echo '<a class="link-grey" href="#!">';
			            			echo '<img src="images/akgec.png" class="circle">
			            			<span class="title">'.$notif[0].'</span>
									<p>'.$notif[3].'</p>
									<p><span class="notif-date">'.$notif[1].' '.$notif[2].'</span></p>';
			            			echo "</a>";
			            			echo '</li>';
			            		}
			            		echo '</ul>';
			            	}
			            	else echo "<br><b style='color:red;'>No notifications yet</b>";

			            	echo '<div class="pagination"><ul>';
							if ($total_pages > 1) {
								echo $functions->paginate($reload, $show_page, $total_pages);
							}
							echo "</ul></div>";
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