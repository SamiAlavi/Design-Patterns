package servlets;

import java.Datastore;
import com.google.gson.Gson;
import java.io.IOException;

import java.util.Set;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


@WebServlet("/user-list")
public class UserListServlet extends HttpServlet {

    private Datastore datastore;
    DatastoreService datas;

    @Override
    public void init() {
       datas  = datastore.getDatastoreInstance(); //getting singleton instance
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws IOException {
        response.setContentType("application/json");
        Set<String> users = datas.getUsers();
        Gson gson = new Gson();
        String json = gson.toJson(users);
        response.getOutputStream().println(json);
    }
}