<?php

function alation_generate_button( $data, $class ){
	$target_link = null;

	switch ($data['button_type']) {
		case 'custom':
				$target_link = $data['button_link'];
			break;
		case 'page':
				$target_link = $data['button_page'];
			break;
		case 'url':
				$target_link = $data['button_url'];
			break;
	}

	return '<a href="'.$target_link.'" class="button '.$class.'">'.$data['button_label'].'</a>';
}

function alation_button_link( $data, $class ){
	$target_link = null;

	switch ($data['button_type']) {
		case 'custom':
				$target_link = $data['button_link'];
			break;
		case 'page':
				$target_link = $data['button_page'];
			break;
		case 'url':
				$target_link = $data['button_url'];
			break;
	}

	return $target_link;
}
