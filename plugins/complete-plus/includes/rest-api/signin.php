<?php 

function up_rest_api_signin_handler($request) {
  $response = ['status' => 1];
  $params = $request->get_json_params();

  if(!isset($params['user_login'], $params['password']) ||
     empty($params['user_login']) ||
     empty($params['password']) 
  ){
    return $response;
  }

  $response['status'] = 2;
  return $response;
}