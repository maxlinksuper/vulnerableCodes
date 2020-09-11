<?php
function authenticate() {
  if( isset( $_POST[ 'Connect' ] ) ) {
    $login = $_POST[ 'login' ];
    $pass = $_POST[ 'pass' ];

    $query = "SELECT * FROM users WHERE login = ? AND pass = ?"; // Safe even if authenticate() method is still vulnerable to brute-force attack in this specific case

    $stmt = $pdo->prepare($query);

    $stmt->execute(array($login, $pass));

    $authenticated = false;
    if ( $stmt->rowCount() == 1 ) {
      $authenticated = true;
    }

    return $authenticated;
  }
}