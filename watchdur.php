 <?php
    header('Content-Type: application/json');
    include_once("db_connect.php");

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'add':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 3) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $result = mysqli_query($conn, $_POST['arguments'][2]) or die("database error:". mysqli_error($conn));
                   if (mysqli_num_rows($result)>0){
                    $aResult['result'] = $_POST['arguments'][1];
                   }
                   else{
                    $aResult['result'] = $_POST['arguments'][0];
                   }
                   mysqli_query($conn, $aResult['result']) or die("database error:". mysqli_error($conn));
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>