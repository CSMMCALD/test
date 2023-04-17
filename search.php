<!DOCTYPE html>
<html lang="en">

<?PHP
if (!$_SESSION['isLoggedIn'])
{
    echo "<script>alert('Not logged in');window.location.href='../index.php';</script>"; 
    /* Alerts the user that they have to be logged in before attempting to use the search function */
}

if(isset($_POST["query"]))
{
    $search_value = $_POST['query'];
    //Selects username, formename, surname, profilepic, userID from Users table
    $stmt = $GLOBALS['database']->prepare("SELECT `username`, `forename`, `surname`, `profilepic`, `userID` FROM `users` WHERE `username` LIKE ? OR `forename` LIKE ? OR `surname` LIKE ?");
    
    $stmt -> bind_param('sss', $search_value, $search_value, $search_value);
    $stmt -> execute();
    $result = $stmt->get_result();
//row is an array of results. r is a result individually.
?>
    <div class="result-container">
        <div class="result-inner">
        <?PHP
            while ($row = $result->fetch_array(MYSQLI_NUM))
            {
                //Formatting of individual search results
                echo '<div class="single-result">';
                    echo '<div class="person-headshot"><img src="'.$row[3].'"></div>';
                    echo '<div class="person-details"><p>'.$row[0].', '.$row[1].', '.$row[2].'</p></div>';
                    echo '<form action="Users/send-friend-request.php" method="post" enctype="multipart/form-data">';
                    echo '<button type="submit" value="' . strval($row[4]) . '" id="fr-confirm-button" name="friendID">Send Friend Request</button>';
                    echo '</form>';
                echo '</div>';
            }
        ?>
        </div>
    </div>

<?PHP } ?>
