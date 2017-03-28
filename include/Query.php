<?php


define("HOST_DB", "localhost");
define("NAME_DB", "Prolinked");
define("USER_DB", "root");
define("PASS_DB", "root");


/*
define("HOST_DB", "prolinkevsdev.mysql.db");
define("NAME_DB", "prolinkevsdev");
define("USER_DB", "prolinkevsdev");
define("PASS_DB", "ProLinked42");
*/


define("CHARSET", "utf8");
define("DSN_DB", "mysql:host=" . HOST_DB . ";dbname=" . NAME_DB . ";charset=". CHARSET ."");



/*		USER DEFINES 	*/

define("USER_TABLE", "users");
define("DB_USER_ID", "user_id");
define("DB_USER_GENDRE", "user_genre");
define("DB_USER_FIRSTNAME", "user_firstname");
define("DB_USER_LASTNAME", "user_lastname");
define("DB_USER_USERNAME", "user_username");
define("DB_USER_EMAIL", "user_email");
define("DB_USER_PASS", "user_pass");
define("DB_USER_REGISTER_DATE", "user_register_date");

/*                SQL FUNCTIONS                 */

function getConnect()
{
	try
	{
		$pdo = new PDO(DSN_DB, USER_DB, PASS_DB);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	}
	catch (PDOException $e)
	{
		die ("Erreur!:" . $e->getMessage());
		return (null);
	}
	return ($pdo);
}

function Query($query)
{
	$pdo = getConnect();
	$sth = $pdo->prepare($query);
	$sth->execute();
	$result = $sth->fetch();
	return ($result[0]);
}

function QueryExec($query)
{
	$pdo = getConnect();
	$sth = $pdo->prepare($query);
	$sth->execute();
}

function QueryToTab($query)
{
  $pdo = getConnect();
	$sth = $pdo->prepare($query);
	$sth->execute();
	$result = $sth->fetchAll();
	return ($result);
}

/*                PRELAUNCH FUNCTIONS                 */

function prelaunch_already_registred($mail)
{
  if ($res = Query("SELECT prelaunch_adress_id FROM prelaunch_data WHERE prelaunch_adress = '$mail'") == 0)
    return (false);
  return (true);
}

function prelaunch_add_adress($mail, $date)
{
  if (!prelaunch_already_registred($mail))
    {
      Query("INSERT INTO prelaunch_data (prelaunch_adress, prelaunch_date) VALUES('$mail', '$date')");
      return (true);
    }
    return (false);
}

function recommander($firstname, $lastname, $job, $mail, $phone)
{
	Query("INSERT INTO recommandations (recommendation_firstname, recommendation_lastname, recommendation_job, recommendation_email, recommendation_phone) VALUES('$firstname', '$lastname', '$job', '$email', 	'$phone')");
}

function prelaunch_count_adress()
{
  return (Query("SELECT COUNT(prelaunch_adress_id) FROM prelaunch_data"));
}

function getCategories()
{
	return (QueryToTab("SELECT * FROM categories ORDER BY category_name ASC"));
}

?>
