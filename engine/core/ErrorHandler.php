<?php

namespace IShow;

require ROOT . '/plugins/json_response.php';

class ErrorHandler
{
  public function __construct()
  {
    if (DEBUG) {
      error_reporting(-1); // show all error  
    } else {
      error_reporting(0); // hide all error  
    }
    set_exception_handler([$this, 'exceptionHandler']);
  }

  public function exceptionHandler($e)
  {
    $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
    $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
  }

  protected function logErrors($message = '', $file = "", $line = "")
  {
    error_log(
      "[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line} \n==============\n",
      3, // this type indicate write in file
      ROOT . '/tmp/errors.log'
    );
  }

  protected function displayError($errno, $errstr, $errfile, $errline, $response = 404)
  {
    if ($response == 404 && !DEBUG) {
      json_response(404, "Not found");
    }
    if (DEBUG) {
      $array = array(
        "code" => $response,
        "message" => $errstr,
        "file" => $errfile,
        "line" => $errline,
      );
      json_response($response, $array);
    } else {

      json_response($response);
    }
  }
}
