<h1>Post-Half-Life (p½)</h1>
<?php
$steps = array("30m", "1h", "2h", "4h", "8h", "1d", "2d", "3d", "1w", "1m", "1y");
$args = array( 'nopaging' => true );
$project_query = new WP_Query( $args );
$rows = array();
$highlights = array();
while ( $project_query ->have_posts()) {
	# code...
	$project_query ->the_post();
	$details = get_post($post->ID); 
	$phlsqldate = $post->post_date; 
	$timestamp = strtotime($post->post_date); 
	$row = array();
	
	$row['id'] = $post->ID;
	$row['guid'] = $details->guid; 
	$row['title'] = $details->post_title;
	$row['dow'] = date("D", $timestamp); 
	$row['day'] = date("Y-m-d", $timestamp); 
	$row['time'] = date("H:i", $timestamp); 
	
	
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 30 MINUTE) AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['30m'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 1 HOUR) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['1h'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 2 HOUR) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['2h'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 4 HOUR) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['4h'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 8 HOUR) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['8h'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 1 DAY) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['1d'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 2 DAY) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['2d'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 3 DAY) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['3d'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 1 WEEK) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['1w'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 1 MONTH) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['1m'] = $myrows[0]->num;
	$phlquery = $wpdb->prepare("SELECT COUNT(*) as num FROM $phl_table_name WHERE fetch_date > %s AND fetch_date < DATE_ADD(%s, INTERVAL 1 YEAR) 	AND post_id=".$post->ID, $phlsqldate, $phlsqldate, $post->ID);  $myrows = $wpdb->get_results($phlquery); $row['1y'] = $myrows[0]->num;

	$rows[] = $row;
	
}
foreach ($steps as $step) {
	$highlights[$step] = null;
	foreach ($rows as $row) {
		if ($row[$step] > $highlights[$step]) {
			$highlights[$step] = $row[$step];
		}
	}
	# code...
}
wp_reset_postdata();
?>


<table border=1 cellspacing=0 cellpadding=3> 
	<tr>
		<th colspan="2">Post</th>
		<th colspan="3">Date</th>
		<th colspan="11">Number of views in the first.. </th>
		
		
		
		
		</tr>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Day of Week</th>
		<th>Date</th>
		<th>Time</th>
		<th>30m</th>
		<th>1h</th>
		<th>2h</th>
		<th>4h</th>
		<th>8h</th>
		<th>1d</th>
		<th>2d</th>
		<th>3d</th>
		<th>1w</th>
		<th>1m</th>
		<th>1y</th>
		</tr>
		<?php foreach ($rows as $i => $item): ?>
			<tr>
			<!-- <tr class="<?php echo ($i%2 == 0?'odd':'even'); ?>"> -->
			<td><?php echo $item['id'] ?></td>
			<td><a href="<?php echo $item['guid'] ?>" target="_blank"><?php echo $item['title'] ?></a></td>
			<td><?php echo $item['dow'] ?></td>
			<td><?php echo $item['day'] ?></td>
			<td><?php echo $item['time'] ?></td>
			<td class="<?php echo ($highlights['30m'] > 0 && $highlights['30m'] == $item['30m']) ? 'highlight' : ''; ?>">	<?php echo ($item['30m'])	? $item['30m'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['1h'] > 0 && $highlights['1h'] == $item['1h']) ? 'highlight' : ''; ?>">		<?php echo ($item['1h'])	? $item['1h'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['2h'] > 0 && $highlights['2h'] == $item['2h']) ? 'highlight' : ''; ?>">		<?php echo ($item['2h']) 	? $item['2h'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['4h'] > 0 && $highlights['4h'] == $item['4h']) ? 'highlight' : ''; ?>">		<?php echo ($item['4h']) 	? $item['4h'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['8h'] > 0 && $highlights['8h'] == $item['8h']) ? 'highlight' : ''; ?>">		<?php echo ($item['8h']) 	? $item['8h'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['1d'] > 0 && $highlights['1d'] == $item['1d']) ? 'highlight' : ''; ?>">		<?php echo ($item['1d']) 	? $item['1d'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['2d'] > 0 && $highlights['2d'] == $item['2d']) ? 'highlight' : ''; ?>">		<?php echo ($item['2d']) 	? $item['2d'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['3d'] > 0 && $highlights['3d'] == $item['3d']) ? 'highlight' : ''; ?>">		<?php echo ($item['3d']) 	? $item['3d'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['1w'] > 0 && $highlights['1w'] == $item['1w']) ? 'highlight' : ''; ?>">		<?php echo ($item['1w']) 	? $item['1w'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['1m'] > 0 && $highlights['1m'] == $item['1m']) ? 'highlight' : ''; ?>">		<?php echo ($item['1m']) 	? $item['1m'] 		: ""; ?></td>
			<td class="<?php echo ($highlights['1y'] > 0 && $highlights['1y'] == $item['1y']) ? 'highlight' : ''; ?>">		<?php echo ($item['1y']) 	? $item['1y'] 		: ""; ?></td>
			</tr>
		<?php endforeach ?>
		
		</table>
<style type="text/css" media="screen">
	
.odd {	background:#fff;}
.even {	background:#ddd;}
</style>