<?php $access = array(0); ?>
<?php include 'include/header.inc.php';?>
<?php
	$per_page = 4;
	$x = $functions->displayVisitors($conn, $queries);
	$total_results = count($x);
	$total_pages = ceil($total_results / $per_page);
	if (isset($_GET['page']) && !empty($_GET['page'])) {
		$show_page = $_GET['page']; //current page
		if ($show_page > 0 && $show_page <= $total_pages) {
			$start = ($show_page - 1) * $per_page;
			$end = $start + $per_page;
		}
		else {
			$start = 0;
			$end = $per_page;
		}
		$page = intval($show_page);
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
			            	<span class="title">Last Visitors</span>
			            	<?php
			            	if(count($x) > 0) {
			            		echo '<ul class="collection">';
			            		for ($i = $start; $i < $end; $i++) {
			            			if ($i == $total_results) {
										break;
									}
									$d = $x[$i];
									$name = $d[0];
		            				if(!empty($d[1])) {
		            					$date = $d[1];
			            				$time = $d[2];
				            			echo '<li class="avatar collection-item">';
				            			if(!empty($d[3]) && file_exists("images/profile/$d[3].png"))
			            					echo "<img src='images/profile/$d[3].png' class='imgsqr'>";
			            				else echo '<img src="images/akgec.png" class="circle">'; 
				            			echo '<span class="title">'.$name.'</span>
										<p><b>Last Visit: </b>'.$date.' '.$time.'</p>
										</li>';
		            				}
			            		}
			            		echo '</ul>';
			            	}
			            	echo '<div class="pagination"><ul>';
							if ($total_pages > 1) {
								echo $functions->paginate($reload, $page, $total_pages);
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
</body>
</html>