<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Max's AJAX File Uploader</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
<script language="javascript" type="text/javascript">
<!--


 


 

function startUpload(light){
     
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';
      //alert("hello");
      log.add("starting upload --> for 1 minute");
      
      return true;
}

function stopUpload(success){

      var result = '';
      if (success == 1){
         result = '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
      }
      else {
         result = '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
      }
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
      document.getElementById('f1_upload_form').style.visibility = 'visible';
      log.add("stoppingupload --> for 10 seconds");      
      return true;   
}
//-->
// log helper
 
var log = (function () {
    var log = "";
 
    return {
        add: function (msg) { log += msg + "\n"; },
        show: function () { alert(log); log = "";
        }
    }
})();
 
function run() {
 
    log.show();
}   
</script>   
</head>

<body>
       <div id="container">
            <div id="header"><div id="header_left"></div>
            <div id="header_main">Max's AJAX File Uploader</div><div id="header_right"></div></div>
            <div id="content">
                <form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process">Loading...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_form" align="center"><br/>
                         <label>File:  
                              <input name="myfile" type="file" size="30" />
                         </label>
                         <label>
                             <input type="submit" name="submitBtn" class="sbtn" value="Upload" />
                         </label>
                     </p>
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                 </form>
             </div>
             <div id="footer"><a href="http://www.ajaxf1.com" target="_blank">Powered by AJAX F1</a></div>
         </div>

         <div>
           <?php
            echo "<h1>User Page</h1>";

            include_once("db_connect.php");
            $result = mysqli_query( $conn, "SELECT * FROM uploads");

            echo "<table border='1' cellspacing=0 width='100%'>
                <tr>
                <th>ID</th>
                <th>File Name</th>
                <th>Upload Time</th>
                <th>View</th>
                </tr>";

             

            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td>" . $row['ID'] . "</td>";
              echo "<td>" . $row['file_name'] . "</td>";
              echo "<td>" . $row['upload_time'] . "</td>";
              $p = $row['path'];
              echo "<td><a href='#' onclick='showVid(\"$p\")'>View</a></td>";
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

          <button name="run" value="run" onclick="run()">RUN</button>
          <div id="videoDiv">
            
          </div> 
          <form method="post" action="1.php">
                <p>Add Comment:</p><input type="text" name="textbox" />
    
                 <input type="submit" name="submit">
          </form>
    

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
          <div id="commentdiv" style="color:blue;"><p>Comments: </p>
              <?php echo $row['comment']; ?>
           </div>
      <?php  } ?>
                 
</body>   