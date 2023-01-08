<?php 

function up_rest_api_signup_handler($request) {
  $response = ['status' => 1];
  $params = $request->get_json_params();

  if(!isset($params['email'], $params['username'], $params['password']) || 
      empty($params['email']) || 
      empty($params['username']) ||
      empty($params['password'])
  ) {
    return $response;
  }

  $email = sanitize_email( $params['email'] );
  $username = sanitize_text_field( $params['username'] );
  $password = sanitize_text_field( $params['password'] );

  if(username_exists( $username ) || !is_email( $email ) || email_exists( $email )){
    return $response;
  }

  /*  Create new user */
  $user_ID = wp_insert_user([ 
    'user_login' => $username, 
    'user_pass' => $password, 
    'user_email' => $email 
  ]);

  if(is_wp_error($userID)){
    return $response;
  }

  wp_new_user_notification($userID, null, 'user');
  wp_set_current_user($userID);
  wp_set_auth_cookie($userID);

  $user = get_user_by('id', $userID);

  do_action('wp_login', $user->user_login, $user);

  $response['status'] = 2;
  return $response;
}