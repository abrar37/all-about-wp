<?php

function post_reading_time() {
	$article = get_the_content(); //gets full text from article
	$wordcount = str_word_count( strip_tags( $article ) ); //removes html tags
	$time = ceil($wordcount / 200); //takes rounded of words divided by 200 words per minute
		
	$label = ($time == 1) ? " min" : " mins"; 

	// if ($time == 1) { //grammar conversion
	// 	$label = " minute read";
	// } else {
	// 	$label = " minutes read";
	// }
		
	$totalString = $time . $label; //adds time with minute/minutes label
	return $totalString;
		
	}
add_shortcode('post_reading_time', 'post_reading_time');


?>