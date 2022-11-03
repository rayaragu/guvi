
<?php
$host = "localhost";
$username = "root";
$password = "";

try 
{
    $conn = new PDO("mysql:host=$host;dbname=phptest", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$response = array('success' => false);

if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['phone']) && $_POST['phone']!='' && isset($_POST['email']) && $_POST['email']!='')
{
	$sql = "INSERT INTO contacts(name, phone, email) VALUES('".addslashes($_POST['name'])."', '".addslashes($_POST['phone'])."', '".addslashes($_POST['email'])."')";
	
	if($conn->query($sql))
	{
		$response['success'] = true;
	}
}

echo json_encode($response);