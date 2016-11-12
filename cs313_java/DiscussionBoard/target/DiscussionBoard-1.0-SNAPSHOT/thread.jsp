<%-- 
    Document   : thread
    Created on : Nov 11, 2016, 4:30:15 PM
    Author     : clark
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Thread</title>
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js"></script>
        <script type="text/javascript">
            //This event is called when the DOM is fully loaded
            window.addEvent("domready",function(){
                //Creating a new AJAX request that will request 'test.csv' from the current directory
                var post = new Request({
                    url:"thread.txt",
                    onSuccess:function(response){
                        //The response text is available in the 'response' variable
                        //Set the value of the textarea with the id 'csvResponse' to the response
                        console.log(response);
                        document.getElementById("threadTable").innerHTML = response;
                    }
                }).send(); //Don't forget to send our request!
            });
        </script>
        
        
        
        
        
        
        
    </head>
    <body>
        <h1>Discussion Board</h1>
        <h3>User posts will be displayed here</h3>
        
        <table id="threadTable">
            
            <!-- <iframe src="thread.txt" ></iframe> -->
            
        </table>
        
        <?php
            print "This is a php test";
            ?>
        
    </body>
</html>
