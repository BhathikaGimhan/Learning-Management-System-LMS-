<?php
/**
 * This script is to list the comments in a nested order.
 */
use Phppot\DataSource;
require_once __DIR__ . '/DataSource.php';
$database = new DataSource();
$sql = "SELECT * FROM tbl_comment ORDER BY parent_comment_id asc, comment_id asc";
$result = $database->select($sql);
echo json_encode($result);