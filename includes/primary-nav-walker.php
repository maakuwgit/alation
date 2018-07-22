<?php
/**
 * New Alation Walker
 *
 * @access      public
 * @since       3.3
 * @return      void
*/
class alation_headernav_walker extends Walker_Nav_Menu {
	    
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);

    $style = '';

    $output .= "\n$indent<ul style=\"$style\" class=\"sub-menu {locate_class}\">\n";
  }

  function end_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
    
    if($depth === 0){
      $output = str_replace("{locate_class}", "", $output);
    }
  }    

  function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
    global $wp_query;
    
    $item_output = $li_text_block_class = $column_class = "";        

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';            

    $item_output .= $args->before;
    $item_output .= '<a class="menu-item-link" '. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    
    
    
    
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="'.$li_text_block_class. esc_attr( $class_names ) . $column_class.'"';

    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
?>