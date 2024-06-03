<?php

class Util
{

  // Method for input value to sanitize
  public function testInput($data)
  {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);

    return $data;
  }

  // Method for displaying success and error message
  public function showMessage($type, $message)
  {
    return '<div class="alert alert-'.$type.' d-flex align-items-center justify-content-between fade show" role="alert">
              <strong>'.$message.'</strong>
              <!--<button type="button" class="btn btn-white btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
            </div>';
  }
}
