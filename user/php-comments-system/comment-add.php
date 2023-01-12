<?php
/**
 * This script is to add the comment to database.
 */
use Phppot\DataSource;
require_once __DIR__ . '/DataSource.php';
$database = new DataSource();
$sql = "INSERT INTO tbl_comment(parent_comment_id, comment, comment_sender_name) VALUES (?,?,?)";
$paramType = 'iss';
$paramValue = array(
    $_POST["comment_id"],
    $_POST["comment"],
    $_POST["name"]
);
$result = $database->insert($sql, $paramType, $paramValue);
echo $result;