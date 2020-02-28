<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Max's AJAX File Uploader</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
</head>

<body>
       <div>
           <?php
            echo "<h1>Admin Page</h1>";

            include_once("db_connect.php");
            $result = mysqli_query( $conn, "SELECT ID, username FROM register");

            echo "<table border='1' cellspacing=0 width='100%'>
                <tr>
                <th>ID</th>
                <th>Username</th>
                <th>File Name</th>
                <th>Watched Duration</th>
                <th>Total Duration</th>
                </tr>";

             

            while($row = mysqli_fetch_array($result)){

              $username = $row['username'];
              $sql = "SELECT path, watched, duration FROM watchduration WHERE user='".$username."'";
              $result2 = mysqli_query( $conn, $sql);
              while($row2 = mysqli_fetch_array($result2)){
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row2['path'] . "</td>";
                echo "<td>" . $row2['watched'] . "</td>";
                echo "<td>" . $row2['duration'] . "</td>";
                echo "</tr>";
              }
              echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "</tr>";
              
            }
            echo "</table>";
          ?>
         </div>
          <script language="javascript" type="text/javascript"> 

            function showVid(path){
              var h = '<video id="video" width="100%" controls muted>  <source  src="'+path+'"> Your browser does not support the video tag.</video>';
              $("#videoDiv").html(h);
              $("#video").on("loadedmetadata", function(){
                $("#video").attr("ontimeupdate","updateProgress(this.currentTime,this.duration,'"+path+"')");             
              });
            }
            function updateProgress(currentTime, duration, path){
              var username = 'user2';

              mysql_insert = "INSERT INTO watchduration (user, path, watched, duration)VALUES('"+username+"','"+path+"','"+currentTime+"','"+duration+"')";
              mysql_update = "UPDATE watchduration SET watched='"+currentTime+"' WHERE user='"+username+"' AND path='"+path+"'";
              mysql_check = "SELECT user FROM watchduration WHERE user='"+username+"' AND path='"+path+"' LIMIT 1";
            
              $.ajax({
                type: "POST",
                url: 'watchdur.php',
                dataType: 'json',
                data: {functionname: 'add', arguments: [mysql_insert, mysql_update, mysql_check]},

                success: function (obj, textstatus) {
                              if( !('error' in obj) ) {
                                  yourVariable = obj.result;
                              }
                              else {
                                  console.log(obj.error);
                              }
                        }
            });
            }
          </script>
          <div id="videoDiv">
            
          </div> 
<div id="commentdiv" style="color:red;"><h3 style="color:maroon;">Notifications: </h3>
                  <?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
        $sql = "SELECT comment FROM comments ";
        $result = mysqli_query($conn, $sql); 
            
        while($row = mysqli_fetch_array($result)){
          ?>
          
              <span>A user has commented on User page: </span><?php echo $row['comment']; ?><br/>
           
      <?php  } ?>
      </div>           
</body>   