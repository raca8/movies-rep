<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("./components/Database/Database.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE movies SET comment_status=1 WHERE comment_status=0";
  mysqli_query($conn, $update_query);
 }
 $query = "SELECT movies.year, movies.name, movies.rating, users.username FROM movies INNER JOIN users ON movies.user_fk = users.id";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="movieRequests.php">
     <strong>'.$row["username"].' requested a '.$row["name"].' movie</strong><br />
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }

 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM movies WHERE comment_status=0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
