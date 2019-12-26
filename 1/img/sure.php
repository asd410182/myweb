<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>提交到服务器的结果</title>
  </head>
  <body>
    <h1> 提交到服务器的结果</h1>
<?php
  session_start();

  $user_id =$_POST['user_id']; //声明变量$user_id，把POST请求中的user_id的值赋给它
  $user_password= $_POST['user_password'];
  $user_limitation=$_POST['limit'];

  $host ='localhost';
  $user_name='root';
  $password ='';

  $admin_limitation ='1';
  $guest_limitation='0';

  $conn = mysql_connect($host,$user_name,$password);//连接MySQL
  if(!$conn){
    die('数据库连接失败：'.mysql_error());
  }
  mysql_select_db('scut_xiaoy');//选择数据库

  $sql='select id,password,limitation from login';//定义sql语句

  $result = mysql_query($sql) OR die("<br/>ERROR:<br>".mysql_error()."</b><br/>产生问题的SQL：".$sql);
  //执行sql语句，成功则返回结果集赋值给变量$result，失败则执行die语句

  if($num=mysql_num_rows($result))
  {
      while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
          //while循环，每一次循环取出结果集中的一行赋值给数组变量$row
          if($row['id']==$user_id&&$row['password']==$user_password&&$row['limitation']==$user_limitation){
              //判断语句，仅在用户名、密码、权限三者都符合的情况下为真
            if($row['limitation']==$guest_limitation){
                echo "This is a user page!";
             }
            else{
                echo "This is a admin page!";
             }
           }
        }
   }
           mysql_close($conn);
?>

  </body>
  </html>
