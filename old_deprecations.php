<?php

///**
// * @param array $array
// * @return array
// */
//function each(array &$array): array
//{
//    $key = key($array);
//    $value = current($array);
//    next($array);
//    $result = ($key !== null && $value !== false);
//    return array($result, 'key' => $key, 'value' => $value, '1' => $value, '0' => $key);
//}

//const MYSQL_ASSOC = MYSQLI_ASSOC;
//const MYSQL_NUM = MYSQLI_NUM;

//function get_magic_quotes_gpc(): bool
//{
////    return false;
//    return (bool)ini_get('magic_quotes_gpc');
//}

function slh_eregi($pattern, $string, &$matches = null)
{
    return preg_match("/$pattern/i", $string, $matches);
}

function slh_ereg($pattern, $string, &$matches = null)
{
    return preg_match("/$pattern/", $string, $matches);
}

function slh_ereg_replace($pattern, $replacement, $string)
{
    return preg_replace("/$pattern/i", $replacement, $string);
}

function slh_eregi_replace($pattern, $replacement, $string)
{
    return slh_ereg_replace($pattern, $replacement, $string);
}

function slh_mysql_connect($host, $username, $password)
{
    $mysqli = new mysqli($host, $username, $password);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    return $mysqli;
}

function slh_mysql_select_db($dbname, $db)
{
    mysqli_select_db($db, $dbname);

    return $db;
}

/**
 * @throws Exception
 */
function slh_mysql_query($query, $db)
{
    $result = mysqli_query($db, $query);

    if (!$result) {
        throw new Exception("Query failed: " . $db->error($query));
    }

    return $result;
}

function slh_mysql_errno($db): int
{
    return mysqli_errno($db);
}

function slh_mysql_error($db): string
{
    return mysqli_error($db);
}

function slh_mysql_fetch_array($result, $type = MYSQLI_ASSOC)
{
    return mysqli_fetch_array($result, $type);
}

function slh_mysql_list_dbs($db)
{
    return mysqli_query($db, "SHOW DATABASES");
}

function slh_mysql_fetch_object($results)
{
    return mysqli_fetch_object($results);
}

function slh_mysql_list_tables($dbname, $db)
{
    return mysqli_query($db, "SHOW TABLES FROM $dbname");
}

function slh_mysql_fetch_row($results)
{
    return mysqli_fetch_row($results);
}

function slh_mysql_free_result($results): void
{
    mysqli_free_result($results);
}

function slh_mysql_close($db): void
{
    mysqli_close($db);
}

function slh_mysql_affected_rows($db): void
{
    mysqli_affected_rows($db);
}

function slh_split($delimiter, $string)
{
    return explode(str_replace('\\', '', $delimiter), $string);
}

function slh_mysql_numrows($results): int
{
    return mysqli_num_rows($results);
}

function slh_mysql_num_rows($results): int
{
    return slh_mysql_numrows($results);
}

function slh_mysql_insert_id($db): int
{
    return mysqli_insert_id($db);
}
