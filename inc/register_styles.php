<?php
/**
 * Block styles.
 *
 * @package aploblocks
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */

function aploblocks_plugin_register_block_styles() {


	/******************************************************
	 * 
	 * Image Styles 
	 * 
	 ******************************************************/

	register_block_style('core/image',array('name'  => 'aplo-image-caption-top-left','label' => __( 'Caption Top L', 'aploblocks' )));
	register_block_style('core/image',array('name'  => 'aplo-image-caption-bottom-left','label' => __( 'Caption Bot L', 'aploblocks' )));
	register_block_style('core/image',array('name'  => 'aplo-image-caption-top-right','label' => __( 'Caption Top R', 'aploblocks' )));
	register_block_style('core/image',array('name'  => 'aplo-image-caption-bottom-right','label' => __( 'Caption Bot R', 'aploblocks' )));
	
	/******************************************************
	 * Group Styles 
	 ******************************************************/
	/* these are for the sticky header */
	register_block_style('core/group',array('name'  => 'aplo-sticky-hide','label' => __( 'Hide Sticky Header', 'aploblocks' )));
	register_block_style('core/group',array('name'  => 'aplo-sticky-hide-in','label' => __( 'Hide Sticky Header In', 'aploblocks' )));

	/******************************************************
	 * Column Styles 
	 ******************************************************/
	register_block_style('core/column',array('name'  => 'aplo-column-sticky','label' => __( 'Sticky column', 'aploblocks' )));

	/******************************************************
	 * Cover Styles 
	 ******************************************************/
	register_block_style('core/cover',array('name'  => 'aplo-cover-hover','label' => __( 'Hover Fade', 'aploblocks' )));
	register_block_style('core/cover',array('name'  => 'aplo-cover-hover-left','label' => __( 'Hover Left', 'aploblocks' )));
	register_block_style('core/cover',array('name'  => 'aplo-cover-hover-right','label' => __( 'Hover Right', 'aploblocks' )));
	register_block_style('core/cover',array('name'  => 'aplo-cover-hover-bottom','label' => __( 'Hover Bottom', 'aploblocks' )));
	register_block_style('core/cover',array('name'  => 'aplo-cover-hover-top','label' => __( 'Hover Top', 'aploblocks' )));

	/******************************************************
	 * Navigation Styles 
	 ******************************************************/
	 register_block_style('core/navigation',array('name'  => 'aplo-navigation-underline-anim','label' => __( 'Link Underline hover anim', 'aploblocks' )));

	/******************************************************
	 * Media & Text Styles 
	 ******************************************************/

	/*****************************************************
	* Featured Image
	******************************************************/

	/*****************************************************
	* Separator
	******************************************************/
	register_block_style('core/separator',array('name'  => 'aplo-separator','label' => __( 'Style 1', 'aploblocks' )));
	register_block_style('core/separator',array('name'  => 'aplo-separator-two','label' => __( 'Style 2', 'aploblocks' )));
	register_block_style('core/separator',array('name'  => 'aplo-separator-three','label' => __( 'Style 3', 'aploblocks' )));

	/*****************************************************
	* Quote
	******************************************************/


}
add_action( 'init', 'aploblocks_plugin_register_block_styles' );