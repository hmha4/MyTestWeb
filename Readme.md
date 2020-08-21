패킷 생성의 자동화, 자동화에 따른 생산성, 안전성, 일반화된 코드를 만들기 위함

[types -> php]
0. 
1. db_name(required)   
2. table_name(required)   
3. post(not_required)
	post_name..
4. query(not_required)
	query_select, query_insert, query_delete, query_update...
   

[scripts -> php]
integrated_name:integrated_name
dbname:name_db
tablename:name_table
packet
[
	string name_post_0
	string name_get_0
	string name_put_0
	...
]
query
[
	GetUser(p1):SELECT password, id FROM users WHERE username = p1
]


[gen_php]
File Name : integrated_name.php
<?php

$servername = "127.0.0.1";
$username = "root";
$password = "0000";
$dbname = dbname;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

$post[0] = $_POST[post[0]];
$post[1] = $_POST[post[2]];
...

$sql = GetUser($post[0]);  
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    $rows = array();

  while($row = $result->fetch_assoc()) 
  {
    $rows[] = $row;
  }
  echo json_encode($rows);

} 

$conn->close();
?>

[gen_struct]
struct Login
{
	string name_post_0;
	strin name_post_1;
};

[cs]






Invoker.OnLogin.Broadcast(Login);
Handler.OnLogin += (notifier) => {};
