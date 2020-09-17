from flask import request
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import text
from database.users import User

@app.route('hello')
def hello():
    test = request.args.get("id")
    stmt = text("SELECT * FROM users where id=%s" % test) # Query is constructed based on user inputs
    query = SQLAlchemy().session.query(User).from_statement(stmt) # Noncompliant
    user = query.one()
    return "Hello %s" % user.username