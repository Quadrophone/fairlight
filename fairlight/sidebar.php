<?php
/**
 * @package Fairlight
 */
?>
	<div id="sidebar" class="hidden" role="complementary">
	<a class="close-sidebar"><i class="fi-x"></i></a>
	<h3><a href=" <?php echo home_url(); ?> "><i class="fi-home"></i>Home</a></h3>
	<h3><i class="fi-list-thumbnails"></i>Categories</h3>
	<ul class="categories">
		<?php
$args = array(
  'orderby' => 'name',
  'order' => 'ASC'
  );
$categories = get_categories($args);
  foreach($categories as $category) { 
    echo '<li><a class="category" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li> ';
 } 
?>
</ul>
<h3 class="search"><a href="#" id="sidebar-search"><i class="fi-magnifying-glass"></i>Search</a></h3>
	</div><!-- #secondary -->
