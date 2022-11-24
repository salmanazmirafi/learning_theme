<?php
/*
MY theme funcction
*/
// theme title tag
add_theme_support('title-tag');

//Theme css and jqurey file calling
function salman_css_js_file_calling(){
    wp_enqueue_style('salman_stylesheet', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '5.2.2', 'all');
    wp_register_style('custome', get_template_directory_uri().'/css/custome.css', array(), '1.0.0', 'all');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custome');

    //jqurey
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri(  ).'/js/bootstrap.min.js', array(), '5.2.2', 'true');
    wp_enqueue_script('main', get_template_directory_uri(  ).'/js/min.js', array(), '1.0.0', 'true');

}
add_action('wp_enqueue_scripts','salman_css_js_file_calling');

// theme function
function salman_costomization_registar($wp_customize){
    $wp_customize->add_section('salman_header', array(
        'title'=>__('Header Area','learningtheme'),
        'description'=> 'if you interset to update your header',
    ));

    $wp_customize->add_setting('salman_logo',array(
        'default'=> get_bloginfo('template_directory', '/image/logos.png' ),
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'salman_logo', array(
        'label'=>'Logo Upload',
        'setting'=>'salman_logo',
        'section'=>'salman_header',
    )));
}
add_action('customize_register','salman_costomization_registar');