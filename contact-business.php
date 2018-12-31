<?php

define( 'SHORTINIT', true );

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    post_handler();
    return;
  case 'GET':
    get_handler();
    return;
  default:
    echo 'Not implemented';
    return;
}

function post_handler() {
  // global $wpdb;

  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
  // exit();

	// $table_name = $wpdb->prefix.'contact_notification';
	// $data_array = array (
  //   'l_id'      => (isset($_POST['l_ID']))? $_POST['l_ID'] : '',
	// 	'l_title'   => (isset($_POST['l_title']))? $_POST['l_title'] : '',
	// 	'l_name'    => (isset($_POST['l_name']))? $_POST['l_name'] : '',
	// 	'l_oemail'  => (isset($_POST['l_oemail']))? $_POST['l_oemail'] : '',
	// );

  $id      = (isset($_POST['c_id']))? $_POST['c_id'] : '';
  $title   = (isset($_POST['c_title']))? $_POST['c_title'] : '';
  $oemail  = (isset($_POST['c_oemail']))? $_POST['c_oemail'] : '';
  
	// if($wpdb->insert($table_name, $data_array, $format=NULL) == false){
	// 	echo 	$wpdb->last_error;
	// 	exit();
	// }else{
	// // 		echo "<pre>";
  // // print_r($wpdb);
	// // echo "</pre>";
	// // exit();
	// 	// contact_send_message($data_array);
		
  // }
 
  $txt = " Business Name: ".$title." \n\r Email: ".$oemail." \n\r Tracking ID: ".$id;

  $message = $txt;

	// // write the email content
	$header = 'From: Mr Relax <jonathan@phillipislandtime.com.au>';
	$subject = 'Phillip Island Time Notification';
	$to = "jonathan@phillipislandtime.com.au";
	// $to = "tom@xenus.com.au";

	// send the email using wp_mail()
	if( mail($to, $subject, $message, $header) ) {
		// $url = site_url( '/', 'http' );
    // wp_redirect($url);
    echo 'sent!';
    // foreach($_POST as $post_var){
    //   echo strtoupper($post_var) . "<br/>";
    // }
  }else{
    // echo 'Try Agian';
    echo print_r(error_get_last());
  }
}

function get_handler() {
  echo 'GET METHOD CALLED';
}  

  //handle();
add_action( 'init', 'post_handler' );
?>
