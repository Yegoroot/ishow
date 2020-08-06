<?php

function json_response($code = 200, $data = null)
{

  // clear the old headers
  header_remove();
  // set the actual code
  http_response_code($code);
  // set the header to make sure cache is forced
  header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
  // treat this as json
  header('Content-Type: application/json');
  $status = array(
    200 => '200 OK',
    400 => '400 Bad Request',
    404 => '404 Not Found',
    422 => 'Unprocessable Entity',
    500 => '500 Internal Server Error'
  );
  // ok, validation error, or failure
  header('Status: ' . $status[$code]);
  // return the encoded json

  echo json_encode(array(
    'success' => $code < 300, // success or not?
    'data' => $data
  ));
  die; // ?
};

// // if you are doing ajax with application-json headers
// if (empty($_POST)) {
//   $_POST = json_decode(file_get_contents("php://input"), true) ?: [];
// }

// // usage
// echo json_response(200, $data);

// // array usage
// echo json_response(200, array(
//   'data' => array(1, 2, 3)
// ));
// // {"status":true,"data":{"data":[1,2,3]}}

// // usage with error
// echo json_response(500, 'Server Error! Please Try Again!'); // {"status":false,"data":"Server Error! Please Try Again!"}