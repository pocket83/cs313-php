<%-- 
    Document   : login
    Created on : Nov 11, 2016, 2:56:36 PM
    Author     : clark
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Login</title>
    </head>
    <body>
        <h1>User Login</h1>
        <h3>Please enter your user name and password</h3>
        <form action ="validateLogin" method="POST">
            <input type="text" name="userName" placeholder="username"><br/>
            <input type="password" name="password" placeholder="password"><br/>
            <input type="submit" value="Login">
            
        </form>
    </body>
</html>
