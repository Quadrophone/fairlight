	<header class="small-12 columns site-header" style="background-image:url('<?php header_image(); ?>')">
        <div class="clouds"></div>
     <div class="search-box">
<aside id="search" class="widget widget_search">
                <?php get_search_form(); ?>
            </aside>
</div>
    <a class="nav-menu">
            </a>
    <h1><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h1>


</header><!-- #masthead -->

<div id="content" class="site-content">
