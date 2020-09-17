import hashlib

class User:
  def __init__(self, userId, name) :
    self.userId = userId
    self.name = hash(name)

class Student (User):
  def __init__(self, userId, name, major) :
    super(Student, self).__init__
    self.userId = userId
    self.name = name
    self.major = major
    print(major)

def hash(text):
	m = hashlib.md5()
	m.update(text.encode('utf-8'))
	return m.hexdigest()

def main() :
  b = "$_POST['Name'];"
  c = "$_POST['NIM'];"
  input_name = b
  if (c == "135") :
    d = Student(c,b,"Informatics")
    e = "sql = INSERT INTO IF(name) VALUES (.$name.)"
  if (c == "182") :
    d = Student(c,b,"Information System and Technology")
    e = "sql = INSERT INTO STI(name) VALUES (.$name.)"
  if (c == "104") :
    d = Student(c,b,"Microbiology")
    e = "sql = INSERT INTO MB(name) VALUES (.$name.)"
  if (c == "106") :
    d = Student(c,b,"Biology")
    e = "sql = INSERT INTO B(name) VALUES (.$name.)"

  f = "$mysqli = mysqli_connect(HOST, USER, PASS, DB);" 
  f = "$res = mysqli_query($mysqli, $sql); "


