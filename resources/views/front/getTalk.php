 <?php

    $db = mysqli_connect("localhost", "root", "", "talk");
    if(!$db) die("錯誤".mysqli_error());
    mysqli_query($db, "SET NAMES 'UTF8'");
    $sql = 'select m_who, m_talk, m_time from message order by m_time desc';
    $rows = mysqli_query($db, $sql);
    $num = mysqli_num_rows($rows);
 ?>

<ul data-role="listview" data-inset="true">
<?php   
    if($num > 0)
    {
    //$str ='<ul data-role="listview" data-inset="true">';
    echo '';
          
        for($i = 0; $i < $num; $i++)
        {
           $row = mysqli_fetch_assoc($rows);

            echo '<li><h2>暱稱：'. $row["m_who"].'</h2>'.'<h3>留言：'. $row["m_talk"].'</h3>'.'<span class="ui-li-aside">'.$row["m_time"].'</span></li>';
           
        }
        }

mysqli_close($db);

?>
</ul>