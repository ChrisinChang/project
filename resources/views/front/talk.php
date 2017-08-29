<?php 
$db = mysql_connect("localhost", "root", "");
if(!$db) die("錯誤".mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_select_db("talk") or die("錯誤".mysql_error());

if (isset($_POST["send"]))
{
   if(!isset($_POST["nickname"]))
       echo "請輸入暱稱!!";
   $nickname = $_POST["nickname"];

        $m_who = $nickname;
        $m_talk = $_POST["msg"];
        $m_time = date("Y-m-d H:i:s");
        $sql = "insert into message(m_who, m_talk, m_time) values ('$m_who', '$m_talk', '$m_time')";
        $result = mysql_query($sql);

}
        $sql2 = 'select m_who, m_talk, m_time from message order by m_time desc';
        $rows = mysql_query($sql2);
        $num = mysql_num_rows($rows);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>暱稱</title>
<link rel="stylesheet" href="midwork.min.css">
<link rel="stylesheet" href="jquery.mobile.structure-1.4.2.min.css">
<script src="jquery-2.0.2.min.js"></script>
<script src="jquery.mobile-1.4.2.min.js"></script>
</head>
    <body>
  <div data-role="content">
    <form method="post" action="" data-ajax="false">
        <label for="nickname">請輸入您的暱稱： </label>
            <input type="text" name="nickname" id="nickname" required />
        <label for="msg">請輸入您的聊天內容:</label>
            <input type="text" name="msg" id="msg"/>
        <input type="submit" name="send" value="送出"/>
    </form>
     <div class="box">
           <div id="a">
                <ul data-role="listview" data-inset="true">
 <?php   
    if($num > 0)
    {
        //$str ='<ul data-role="listview" data-inset="true">';
        echo '';
          
        for($i = 0; $i < $num; $i++)
        {
           
            $m_who = mysql_result($rows,$i,"m_who");
            $m_talk = mysql_result($rows,$i,"m_talk");
            $m_time = mysql_result($rows,$i,"m_time");

            echo '<li><h3>'. $m_who.'</h3>'.'<h3>'. $m_talk.'</h3>'.'<span class="ui-li-aside">'.$m_time.'</span></li>';
           
        }
    }

    mysql_close($db);

 ?>
    </ul>
           </div>
     </div>
  </div>
    </body>
</html>
