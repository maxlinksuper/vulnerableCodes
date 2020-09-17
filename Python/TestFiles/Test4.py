import sqlite3, os, hashlib
from flask import Flask, jsonify, render_template, request, g

app = Flask(__name__)
app.database = "sample.db"

@app.route('/')
def index():
    return render_template('index.html')

def connect_db():
    return sqlite3.connect(app.database)

# Create password hashes
def hash_pass(passw):
	m = hashlib.md5()
	m.update(passw.encode('utf-8'))
	return m.hexdigest()

#API routes
@app.route('/loginAPI', methods=['POST'])
def loginAPI():
    if request.method == 'POST':
        uname,pword = (request.json['username'],request.json['password'])
        uname = uname.escape_string()
        g.db = connect_db()
        cur = g.db.execute("SELECT * FROM employees WHERE username = '%s' AND password = '%s'" %(uname, hash_pass(pword)))
        if cur.fetchone():
            result = {'status': 'success'}
        else:
            result = {'status': 'fail'}
        g.db.close()
        return jsonify(result)
if __name__ == "__main__":

    #create database if it doesn't exist yet
    if not os.path.exists(app.database):
        with sqlite3.connect(app.database) as connection:
            c = connection.cursor()
            c.execute("""CREATE TABLE account(username TEXT, password TEXT)""")
            c.execute('INSERT INTO employees VALUES("test", "{}")'.format(hash_pass("hello")))
            c.execute('INSERT INTO employees VALUES("second", "{}")'.format(hash_pass("hi")))
            connection.commit()
            connection.close()

    app.run() # runs on machine ip address to make it visible on netowrk
