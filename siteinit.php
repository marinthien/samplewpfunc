<?php
/*
Plugin Name: Site configuration
*/



add_action("admin_menu", "initalize_control");

function initalize_control()
{
    add_menu_page("Expression Of Interest",
            "Job Registers","manage_options","job_register",
            "load_job_register",
            "",
            1
            );
}

function load_job_register()
{
    
}
add_action("admin_menu","attach_to_admin_menu" );
function attach_to_admin_menu()
{    
	add_options_page("Custom DB", "CustomDB", "manage_options", "custom_db","custom_db");
}

function custom_db()
{
  
  add_option("linktopage");
  add_site_option("linkcontrl", "ControlCustom");
  global $wpdb;
  $members=  array();
  $members=$wpdb->get_results("SELECT*FROM {$wpdb->prefix}member;",ARRAY_A); 
  
  $results = $wpdb->get_results( 'show tables', ARRAY_A );
  //print_r($results);
  include( ABSPATH . 'wp-content/plugins/siteinit/template/member.php' );
  
  $option="SELECT option_name, option_value FROM $wpdb->options WHERE autoload = 'yes'";
  $rlt=$wpdb->get_results($option,ARRAY_A);
  
          
}






//function add_new_member()
//{
//
//
//}
//function init_custom_db()
//{
//  global $wpdb;
//  $charset_collate = $wpdb->get_charset_collate();
//  $table_name=$wpdb->prefix."membership";
//  $sql="CREATE TABLE $table_name (
//  membership_id mediumint(9) NOT NULL AUTO_INCREMENT,
//  first_name varchar(40) DEFAULT '' NOT NULL,
//  last_name varchar(40) DEFAULT '' NOT NULL,
//  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,  
//  PRIMARY KEY membership_id (membership_id),
//  KEY first_name (first_name),
//  KEY last_name  (last_name)
//  ) $charset_collate;";    
//  //$wpdb->query($sql);  
//  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//  dbDelta($sql);
//}
//function initialization_custom_db()
//{
//
//
//}
//
//add_action('admin_menu',"add_custom_control");
//function add_custom_control()
//{
//    add_menu_page("CustomControl", "Custom Control", "manage_options", "custom_control", "add_my_admin_control");
//
//}
//function add_my_admin_control()
//{
// echo "control have added";   
//}
//
//add_action('admin_menu',"add_new_user");
//
//function add_new_user()
//{
//   add_menu_page("Register", "Register", "manage_options", "add_register", "add_register_tpl");
//}
//function add_register_tpl()
//{
//   echo  "<table>"    
//    . "<tr>"
//    . "<td>"."whatever"
//
//    . "</td>"
//    . "</tr>"
//    . "</table>" ;
//
//
//}


function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard
  //remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
 // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
 // remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' ); 
  
}
add_action( 'admin_menu', 'remove_menus' );