<?php 
if (!function_exists('wi_query_posts')) {
	function wi_query_posts($post_type, $posts_to_show){
 		$args = array(
		  'numberposts' => $posts_to_show,
		  'post_type'   => $post_type
		);
 
		$posts = get_posts( $args );		
		$list = array();
		foreach ($posts as $cpost){
		//	print_r($cform);
			$list[$cpost->ID] = $cpost->post_title;
		}
		return $list;
	}
}
?>