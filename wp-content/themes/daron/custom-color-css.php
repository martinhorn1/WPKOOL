<?php
//Default Theme Color
$daron_skin_theme_color = get_theme_mod('daron_skin_theme_color', '#F71735'); 
//Header
$banner 						= get_header_image(); 
$daron_header_height 			= get_theme_mod('daron_header_height', 400);
$daron_header_background_color 	= get_theme_mod('daron_header_background_color', '#000000');
$daron_theme_layout 			= get_theme_mod('daron_theme_layout', 'wide');

$hex = $daron_header_background_color;
$RGB_color = sscanf($hex, "#%02x%02x%02x");
$Final_Rgb_color = implode(", ", $RGB_color);
?>
<style>
/* genral
==================================== */
 body, h1,  h3, h4, h5, h6, p, div, ul, li, a, select, input, textarea {
	font-family: 'Lato', sans-serif;
} 

@media (max-width: 34em) {
	.site-description {
		display:none;
	}
}

.site-title {
 margin-bottom:0;	
}
.s-header-v2 {
position:absolute;
<?php
if($daron_theme_layout != 'boxed') {
?>
right:0;
left:0;
<?php } ?>
}

.site-title a {
	font-size: 27px;
    margin-bottom: 5px;
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.site-title:hover a {
	color:none;
}

@media (min-width: 62em) {
	.s-header__shrink .s-header-v2__navbar {
		box-shadow: 0 0 0.9375rem 0.25rem rgba(34, 35, 36, 0.05);
		background: #fff;
	}

	.s-header__shrink .s-header-v2__nav > li > a {
		color: #000;
	}
	.s-header__shrink .cd-search-trigger {
		color: #000;
	}

	.s-header-v2__nav > li > a, .cd-search-trigger {
		color: rgba(255, 255, 255, 1);
	}

	.no-padding {
		padding:.0rem 1.875rem
	}
	.daron-header-icon > li > a {
		margin: 0 0.5rem;
	}
	.s-header__shrink .site-description {
		color: #000;
	}
	
}
@media (max-width: 62em) {
	.header-icon {display:none;}
	#search {
		/* hide select element on small devices */
		display: none;
	}
}
.cd-search-trigger::after {
	/* icon lens */
	left: 50%;
	top: 50%;
	bottom: auto;
	right: auto;
	-webkit-transform: translateX(-50%) translateY(-50%);
	-moz-transform: translateX(-50%) translateY(-50%);
	-ms-transform: translateX(-50%) translateY(-50%);
	-o-transform: translateX(-50%) translateY(-50%);
	transform: translateX(-50%) translateY(-50%);
	height: 16px;
	width: 16px;
	background: url(<?php echo esc_url(DARON_THEME_URL) ?>/images/svg/cd-icons.svg) no-repeat -16px 0;
}
@media (max-width: 61.9em)
	.cd-main-search {
		display: none;
	}

/* home customizer
==================================== */
.info-box-icon {
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* menu Style
==================================== */
/* minimal header */
@media (min-width: 62em) {
	.s-header-v2__nav > li > a:hover {
	  color:#FFFFFF;
	}
	.s-header-v2__nav > li > a:focus {
	  color: rgba(255, 255, 255, 0.75);
	}
	.s-header-v2__nav > li > a.-is-active {
	  color:#FFFFFF;
	}
	.cd-search-trigger:hover {
		color:#FFFFFF;
	}
	.s-header-v2__dropdown-menu {
		border-top: 3px solid <?php echo esc_attr($daron_skin_theme_color); ?>;
	}
	.site-description {
		color:#FFFFFF;
	}
}

/* s-header shrink */
.s-header-v2__dropdown-menu > li > a:hover {
  color: <?php echo esc_attr($daron_skin_theme_color); ?> !important;
}
.s-header__shrink .s-header-v2__nav > li > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?> !important;
}
.s-header__shrink .s-header-v2__nav > li > a:focus {
	color: <?php echo esc_attr($daron_skin_theme_color); ?> !important;
}
.s-header__shrink .s-header-v2__nav > li > a.-is-active {
	color: <?php echo esc_attr($daron_skin_theme_color); ?> !important;
}
.s-header-v2__dropdown-menu > li > a.-is-active {
	color: <?php echo esc_attr($daron_skin_theme_color); ?> !important;
}
.s-header__shrink .cd-search-trigger:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?> !important;
}
.daron-search-form-news li a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* primary color 
====================================*/
.g-color--primary { 
	color: <?php echo esc_attr($daron_skin_theme_color); ?>; 
}
.g-color-icon {
	color: #647b85; 
}
.s-btn--primary-bg {
    background: <?php echo esc_attr($daron_skin_theme_color); ?>;
	 border-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.single-link-color:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.menu--alonso .menu__item--current .menu__link {
    color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.menu__line {
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* back to top 
====================================*/
.s-back-to-top {
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.s-back-to-top:hover:before {
  color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* blog 
====================================*/
.read-more {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.author-color:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.categories-color-blog:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.blog-icon-color { 
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.logged-in-as > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.comment-reply-title > a:hover {
	color:<?php echo esc_attr($daron_skin_theme_color); ?>;
}
.comment-reply-title > small > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.formate-hading-color > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.commentmetadata > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.metaInfo > span > a{
	color: #000000;
}
.post a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
} 
/* footer 
====================================*/
.footer-logo a:hover, .footer-bootom a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.footer-admin {
	color: #fff;
}
.border-bootom-widget{
	color: #6a6a6a;
	border-bottom: 1px inset #6a6a6a;
} 
.title-t {
	color: #8e8d8d;
}
.title-t:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* breadcumb 
====================================*/
.js__parallax-window {
	position: relative;
	height:<?php echo esc_attr($daron_header_height); ?>px;
	<?php if($banner) { ?>
	background: rgba(0,0,0,0.38) url('<?php echo esc_url($banner); ?>') 50% 0 no-repeat fixed;
	<?php } else { ?>
	background: linear-gradient(to right,<?php echo esc_attr($daron_header_background_color); ?> 0%, rgb(<?php echo esc_attr($Final_Rgb_color). ',' . '0.48'; ?>) 100%);
	<?php } ?>
	transition: background-color 1s;
}
.js__parallax-window:before {
	position: absolute;
	top: 0; right: 0; bottom: 0; left: 0;
	background-color: inherit;
	content: ' ';
}
.daron-breadcrumb {
	position:relative;
}
.breadcumb-color,
.breadcumb-color:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* widgets
====================================*/
.widget ul li a:hover, .widget ul li a:focus, 
.widget table#wp-calendar tbody a:hover, .widget table#wp-calendar tbody a:focus, 
.footer .widget a, 
.copyright a:hover, .copyright a:focus, 
.site-url a, .site-url a:hover, .site-url a:focus {
    color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
#searchform #searchsubmit, .tagcloud a:hover  {
background-color :<?php echo esc_attr($daron_skin_theme_color); ?>;
}
.sidebar-widget > h1, .sidebar-widget > h2, .sidebar-widget > h3, .sidebar-widget > h4 {
	border-left: 2px solid <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.widget ul li a::before {
	color:<?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* pagination
====================================*/
.daron-pagination .page-numbers.current {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.daron-pagination .page-numbers:hover {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
body.single-post .pager li>a:focus, .pager li>a:hover {
background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
color:#fff;
}
</style>