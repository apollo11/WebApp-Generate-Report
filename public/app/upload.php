<?php
/**
 * Created by PhpStorm.
 * User: apollomm
 * Date: 8/3/16
 * Time: 3:40 PM
 */

if ( !empty( $_FILES ) ) {
  $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
  $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];
  move_uploaded_file( $tempPath, $uploadPath );
  $answer = array( 'answer' => 'File transfer completed' );
  $json = json_encode( $answer );
  echo $json;
} else {
  echo 'No files';
}