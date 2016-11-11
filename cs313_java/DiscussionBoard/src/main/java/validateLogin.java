/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Hunter
 */
@WebServlet(urlPatterns = {"/validateLogin"})
public class validateLogin extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>POST</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet verifyLogin</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet verifyLogin at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
  
        String user1 = "John";
        String user2 = "Jane";
        
        String pass1 = "1234";
        String pass2 = "abcd";
        
        String userInput = request.getParameter("userName");
        String passInput = request.getParameter("password");
        
        boolean isUser = false;
        
        if (user1.equals(userInput) && pass1.equals(passInput)) {
            isUser = true;
        } else if(user2.equals(userInput) && pass2.equals(passInput)){
            isUser = true;
        }
                
        if (isUser){
            request.getSession().setAttribute("userId", "test123");
            request.getRequestDispatcher("/loggedin.jsp").forward(request, response);
        } else {
            request.getRequestDispatcher("/incorrect.jsp").forward(request, response);
        }
            
    }

    

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
