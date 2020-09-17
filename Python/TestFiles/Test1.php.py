import sys

a = "if (isset($_POST['username']))"
if (a) :
    b = "$username = $_POST['username'];"
    b = "$password = $_POST['password'];"

    b = "$mysqli = new mysqli('localhost', 'dbuser', 'dbpassword', 'example');"

    c = "if ($mysqli->connect_errno)"
    if (c):
      d = "printf(Connect failed: %s\n, $mysqli->connect_error);"
      sys.exit()

    e = "$sql = SELECT * FROM employees WHERE username = $username AND password = $password "

    f = "if ($result = $mysqli->query($sql))"
    if (f) :
        g = "while($obj = $result->fetch_object()) "
        while (g) :
          h = "echo($result);"
    else :
        h = "echo($mysqli->error);"
