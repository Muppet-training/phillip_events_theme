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

  // echo var_dump($wpdb);

	// $table_name = $wpdb->prefix.'contact_notification';
	// $data_array = array (
  //   'e_id'      => (isset($_POST['e_ID']))? $_POST['e_ID'] : '',
	// 	'e_title'   => (isset($_POST['e_title']))? $_POST['e_title'] : '',
	// 	'e_name'    => (isset($_POST['e_name']))? $_POST['e_name'] : '',
	// 	'e_oemail'  => (isset($_POST['e_oemail']))? $_POST['e_oemail'] : '',
	// );

  $e_id      = (isset($_POST['e_id']))? $_POST['e_id'] : '';
  $e_title   = (isset($_POST['e_title']))? $_POST['e_title'] : '';
  $e_oname    = (isset($_POST['e_oname']))? $_POST['e_oname'] : '';
  $e_oemail  = (isset($_POST['e_oemail']))? $_POST['e_oemail'] : '';
  
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
 
  $txt = " Event: ".$e_title." \n\r Organiser: ".$e_oname." \n\r Email: ".$e_oemail." \n\r Tracking ID: ".$e_id;

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
