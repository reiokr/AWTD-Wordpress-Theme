<?php

/**
* Header Navigation template
*
* @package Awtd
*/

$menu_class = \AWTD_THEME\Inc\Menus::get_instance() ;

$header_menu_id = $menu_class->get_menu_id('awtd-header-menu');

$header_menus = wp_get_nav_menu_items($header_menu_id);

echo '<pre>';
print_r($header_menus);
wp_die();

function awtd_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
?>

<div style="display:flex; width: 100%;">
  <!--   Insert custom header -->
  <?php if ( get_header_image() ) : ?>
  <div id="site-header">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>"
        height="<?php echo absint( get_custom_header()->height ); ?>"
        alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    </a>
  </div>
  <?php endif; ?>

</div>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <!-- Custom logo -->
    <?php awtd_the_custom_logo();  ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php 
wp_nav_menu(
  [
    'theme_location' => 'awtd-header-menu',
    'container_class' => 'my_extra_menu_class'
  ]
);

?>