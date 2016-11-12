<%-- 
    Document   : loggedin
    Created on : Nov 11, 2016, 3:49:23 PM
    Author     : clark
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome!</title>
    </head>
    <body>
        <h1>Welcome: ${param.userName}</h1>
        <h3>Enter a new post or click the link to view thread</h3>
        <form action="writeFile" method="POST">
        <input type="hidden" name="username" value="${param.userName}">
        <textarea id="post" rows="10" cols="70" name="post"></textarea>
        <input type="submit" value="Post">
        </form>
        <br/>
        
        <a href="thread.jsp">View Thread</a>
    </body>
</html>
