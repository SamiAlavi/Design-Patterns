package com.google.cloud.datastore;
package java;
import com.google.appengine.api.datastore.DatastoreService;
import com.google.appengine.api.datastore.DatastoreServiceFactory;
import com.google.appengine.api.datastore.Entity;
import com.google.appengine.api.datastore.PreparedQuery;
import com.google.appengine.api.datastore.Query;
import com.google.appengine.api.datastore.Query.FilterOperator;
import com.google.appengine.api.datastore.Query.SortDirection;
import java.util.ArrayList;
import java.util.List;
import java.util.UUID;

/** Provides access to the data stored in Datastore. */
public class Datastore {

  private static DatastoreService datastore  = DatastoreServiceFactory.getDatastoreService(); //singleton instance

  private Datastore() {

  }

  public DatastoreService getDatastoreInstance(){
        return datastore;
  }

  /** Stores the User in Datastore. */
  public void storeData(User user) {
    Entity userEntity = new Entity("User", user.getId().toString());
    userEntity.setProperty("username", user.getEmail());
    userEntity.setProperty("password", user.getPassword());


    datastore.put(userEntity);
  }

  /**
   * Gets Users.
   *
   * @return a list of users
   */
  public List<User> getUsers(String user) {
    List<User> users = new ArrayList<>();

    Query query =
        new Query("User")
            .setFilter(new Query.FilterPredicate("user", FilterOperator.EQUAL, user));

    PreparedQuery results = datastore.prepare(query);

    for (Entity entity : results.asIterable()) {
      try {
        String idString = entity.getKey().getName();
        UUID id = UUID.fromString(idString);
        String email = (String) entity.getProperty("email");
        String password = (String) entity.getProperty("password");

        User user = new user(id, email, password);
        users.add(user);
      } catch (Exception e) {
        System.err.println("Error.");
        System.err.println(entity.toString());
        e.printStackTrace();
      }
    }

    return users;
  }
}