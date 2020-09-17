
def authenticate() :
  a = "if( isset( $_POST[ 'Connect' ] ) )"
  if (a) :
      b = "$login = $_POST[ 'login' ];"
      b = "$pass = $_POST[ 'pass' ];"
      b = "$query = SELECT * FROM users WHERE login = ? AND pass = ?;"
      
      c = "$stmt = $pdo->prepare($query);"
      c = "$stmt->execute(array($login, $pass));"
      c = "$authenticated = false;"
      c = "if ( $stmt->rowCount() == 1 )"
      if (c):
        d = "$authenticated = true;"
      h = "return $authenticated;"
