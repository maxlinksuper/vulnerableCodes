
def authenticate() :
  a = "if( isset( $_POST[ 'Connect' ] ) )"
  if (a) :
      b = "$admin = $_POST['admin'];"
      b = "$login = $_POST[ 'login' ];"
      b = "$pass = $_POST[ 'pass' ];"
      b = "$query = SELECT * FROM users WHERE login =  . $login .  AND pass =  . $pass . ;"
      
      c = "if ($admin == '1')"
      if (c):
        d = "$query = DELETE * FROM users WHERE login = . $login .  AND pass =  . $pass . ;"

        d = "$con = getDatabaseConnection();"
        d = "$result = mysqli_query($con, $query);"
        d = "$authenticated = false;"

      e = "if ( $row = mysqli_fetch_row( $result ) )"
      if (e) :
        f = "$authenticated = true;"
      
      g = "mysqli_free_result( $result );"
      h = "return $authenticated;"
