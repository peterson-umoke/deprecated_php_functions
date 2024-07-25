<?php

/**
 * Fallback functions for deprecated PHP functions.
 * 
 * These functions are provided for compatibility with older PHP versions.
 * They are intended to be used as a last resort when upgrading legacy code.
 * 
 * @link https://www.php.net/manual/en/migration56.deprecated.php
 * @link https://www.php.net/manual/en/migration70.deprecated.php
 * @link https://www.php.net/manual/en/migration71.deprecated.php
 * 
 * @author Peterson Umoke <umoke10@hotmail.com>
 */

/**
 * Replaces the deprecated `ereg` function (deprecated in PHP 5.3.0).
 * 
 * @param string $pattern The pattern to search for.
 * @param string $string The input string.
 * @param array &$matches If provided, will be filled with the matches.
 * @return bool True if matches found, false otherwise.
 */
function slh_ereg($pattern, $string, &$matches = null)
{
    return preg_match("/$pattern/", $string, $matches);
}

/**
 * Replaces the deprecated `eregi` function (deprecated in PHP 5.3.0).
 * 
 * @param string $pattern The pattern to search for.
 * @param string $string The input string.
 * @param array &$matches If provided, will be filled with the matches.
 * @return bool True if matches found, false otherwise.
 */
function slh_eregi($pattern, $string, &$matches = null)
{
    return preg_match('/' . $pattern . '/i', $string, $matches);
}

/**
 * Replaces the deprecated `eregi_replace` function (deprecated in PHP 5.3.0).
 * 
 * @param string $pattern The pattern to search for.
 * @param string $replacement The replacement string.
 * @param string $string The input string.
 * @return string The modified string.
 */
function slh_eregi_replace($pattern, $replacement, $string)
{
    return preg_replace('/' . $pattern . '/i', $replacement, $string);
}

/**
 * Replaces the deprecated `ereg_replace` function (deprecated in PHP 5.3.0).
 * 
 * @param string $pattern The pattern to search for.
 * @param string $replacement The replacement string.
 * @param string $string The input string.
 * @return string The modified string.
 */
function slh_ereg_replace($pattern, $replacement, $string)
{
    return preg_replace("/$pattern/", $replacement, $string);
}

/**
 * Replaces the deprecated `each` function (deprecated in PHP 7.2.0).
 * 
 * @param array &$array The input array.
 * @return array|false The current key/value pair or false if the array is empty.
 */
function slh_each(&$array)
{
    return current($array) !== false ? [key($array), current($array)] : false;
}

/**
 * Replaces the deprecated `split` function (deprecated in PHP 5.3.0).
 * 
 * @param string $pattern The delimiter pattern.
 * @param string $string The input string.
 * @return array The array of strings.
 */
function slh_split($pattern, $string)
{
    return preg_split("/$pattern/", $string);
}

/**
 * Replaces the deprecated `get_magic_quotes_gpc` function (deprecated in PHP 5.4.0).
 * 
 * @return bool Always returns false as magic quotes are no longer supported.
 */
function slh_get_magic_quotes_gpc()
{
    return false;
}
/**
 * Replaces the deprecated `mysql_connect` function (deprecated in PHP 5.5.0).
 * 
 * @param string $server The MySQL server address.
 * @param string $username The MySQL username.
 * @param string $password The MySQL password.
 * @return mysqli The MySQLi connection object.
 */
function slh_mysql_connect($server, $username, $password)
{
    $mysqli = new mysqli($server, $username, $password);

    if ($mysqli->connect_error) {
        echo "<br/>Connection failed: " . $mysqli->connect_error;
        echo "<br/>server: " . $server . " username: " . $username . " password: " . $password;
        echo "<br/>StackTrace: <br/>" . get_stack_trace();
        die();
    }

    return $mysqli;
}

/**
 * Replaces the deprecated `mysql_select_db` function (deprecated in PHP 5.5.0).
 * 
 * @param string $dbname The name of the database.
 * @param mysqli $connection The MySQLi connection object.
 * @return bool True on success, false on failure.
 */
function slh_mysql_select_db($dbname, $connection)
{
    return $connection->select_db($dbname);
}

/**
 * Replaces the deprecated `mysql_query` function (deprecated in PHP 5.5.0).
 * 
 * @param string $query The SQL query.
 * @param mysqli $connection The MySQLi connection object.
 * @return mysqli_result|bool The result object or false on failure.
 */
function slh_mysql_query($query, $connection)
{
    $result = $connection->query($query);

    if (!$result) {
        echo "<br/>Query: " . $query;
        echo "<br/>StackTrace: <br/>" . get_stack_trace();
        die();
    }

    return $result;
}

/**
 * Replaces the deprecated `mysql_fetch_array` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @param int $resulttype (optional) Type of array to return. Default is MYSQLI_BOTH.
 * @return array|null The fetched row or null if no more rows.
 */
function slh_mysql_fetch_array($result, $resulttype = MYSQLI_BOTH)
{
    return $result->fetch_array($resulttype);
}

/**
 * Replaces the deprecated `mysql_fetch_assoc` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @return array|null The fetched row or null if no more rows.
 */
function slh_mysql_fetch_assoc($result)
{
    return $result->fetch_assoc();
}

/**
 * Replaces the deprecated `mysql_fetch_row` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @return array|null The fetched row or null if no more rows.
 */
function slh_mysql_fetch_row($result)
{
    return $result->fetch_row();
}

/**
 * Replaces the deprecated `mysql_num_rows` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @return int The number of rows in the result set.
 */
function slh_mysql_num_rows($result)
{
    return $result->num_rows;
}

/**
 * Replaces the deprecated `mysql_fetch_lengths` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @return array|null The lengths of the current row fields or null if no more rows.
 */
function slh_mysql_fetch_lengths($result)
{
    $lengths = [];
    $row = $result->fetch_assoc();
    if ($row) {
        foreach ($row as $value) {
            $lengths[] = strlen($value);
        }
    }
    return $lengths;
}

/**
 * Replaces the deprecated `mysql_real_escape_string` function (deprecated in PHP 5.5.0).
 * 
 * @param string $unescaped_string The string to be escaped.
 * @param mysqli $connection The MySQLi connection object.
 * @return string The escaped string.
 */
function slh_mysql_real_escape_string($unescaped_string, $connection)
{
    return $connection->real_escape_string($unescaped_string);
}

/**
 * Replaces the deprecated `mysql_insert_id` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return int The ID generated by the previous INSERT operation.
 */
function slh_mysql_insert_id($connection)
{
    return $connection->insert_id;
}

/**
 * Replaces the deprecated `mysql_affected_rows` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return int The number of affected rows in the last operation.
 */
function slh_mysql_affected_rows($connection)
{
    return $connection->affected_rows;
}

/**
 * Replaces the deprecated `mysql_close` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return bool True on success, false on failure.
 */
function slh_mysql_close($connection)
{
    return $connection->close();
}
/**
 * Replaces the deprecated `mysql_errno` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return int The error code for the last MySQL operation.
 */
function slh_mysql_errno($connection)
{
    return $connection->errno;
}

/**
 * Replaces the deprecated `mysql_error` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return string The error message for the last MySQL operation.
 */
function slh_mysql_error($connection)
{
    return $connection->error;
}

/**
 * Replaces the deprecated `mysql_list_dbs` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return mysqli_result The result object with the list of databases.
 */
function slh_mysql_list_dbs($connection)
{
    return $connection->query("SHOW DATABASES");
}

/**
 * Replaces the deprecated `mysql_fetch_object` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @return object|null The fetched row as an object or null if no more rows.
 */
function slh_mysql_fetch_object($result)
{
    return $result->fetch_object();
}

/**
 * Replaces the deprecated `mysql_list_tables` function (deprecated in PHP 5.5.0).
 * 
 * @param string $database The name of the database.
 * @param mysqli $connection The MySQLi connection object.
 * @return mysqli_result The result object with the list of tables.
 */
function slh_mysql_list_tables($database, $connection)
{
    $connection->select_db($database);
    return $connection->query("SHOW TABLES");
}

/**
 * Replaces the deprecated `mysql_free_result` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @return void
 */
function slh_mysql_free_result($result)
{
    $result->free();
}

/**
 * Replaces the deprecated `mysql_db_query` function (deprecated in PHP 5.5.0).
 * 
 * @param string $database The name of the database.
 * @param string $query The SQL query.
 * @param mysqli $connection The MySQLi connection object.
 * @return mysqli_result|bool The result object or false on failure.
 */
function slh_mysql_db_query($database, $query, $connection)
{
    $connection->select_db($database);
    return $connection->query($query);
}

/**
 * Replaces the deprecated `mysql_escape_string` function (deprecated in PHP 5.5.0).
 * 
 * @param string $unescaped_string The string to be escaped.
 * @param mysqli $connection The MySQLi connection object.
 * @return string The escaped string.
 */
function slh_mysql_escape_string($unescaped_string, $connection)
{
    return $connection->real_escape_string($unescaped_string);
}

/**
 * Replaces the deprecated `mysql_get_client_version` function (deprecated in PHP 5.5.0).
 * 
 * @return int The MySQL client library version.
 */
function slh_mysql_get_client_version()
{
    return mysqli_get_client_version();
}

/**
 * Replaces the deprecated `mysql_get_server_info` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return string The MySQL server version.
 */
function slh_mysql_get_server_info($connection)
{
    return $connection->server_info;
}

/**
 * Replaces the deprecated `mysql_list_fields` function (deprecated in PHP 5.5.0).
 * 
 * @param string $database The name of the database.
 * @param string $table The name of the table.
 * @param mysqli $connection The MySQLi connection object.
 * @return mysqli_result The result object with the list of fields.
 */
function slh_mysql_list_fields($database, $table, $connection)
{
    $connection->select_db($database);
    return $connection->query("SHOW COLUMNS FROM `$table`");
}

/**
 * Replaces the deprecated `mysql_list_processes` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return mysqli_result The result object with the list of processes.
 */
function slh_mysql_list_processes($connection)
{
    return $connection->query("SHOW PROCESSLIST");
}

/**
 * Replaces the deprecated `mysql_result` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli_result $result The MySQLi result object.
 * @param int $row The row number.
 * @param mixed $field The field name or offset.
 * @return mixed The result value or null if invalid parameters.
 */
function slh_mysql_result($result, $row, $field)
{
    $result->data_seek($row);
    $data = $result->fetch_assoc();
    return $data[$field] ?? null;
}

/**
 * Replaces the deprecated `mysql_stat` function (deprecated in PHP 5.5.0).
 * 
 * @param mysqli $connection The MySQLi connection object.
 * @return string The status information of the MySQL server.
 */
function slh_mysql_stat($connection)
{
    return $connection->stat();
}

/**
 * Retrieves the current stack trace.
 *
 * This function returns an array containing information about the current execution stack.
 * It includes the file, line number, function name, and arguments for each stack frame.
 *
 * @return array An array of stack frames, where each frame is represented as an associative array.
 */
function get_stack_trace()
{

    // Retrieve the stack trace
    $backtrace = debug_backtrace();

    // Format the stack trace for readability
    $formatted_trace = [];
    foreach ($backtrace as $trace) {
        $formatted_trace[] = [
            'file' => isset($trace['file']) ? $trace['file'] : null,
            'line' => isset($trace['line']) ? $trace['line'] : null,
            'function' => isset($trace['function']) ? $trace['function'] : null,
            'class' => isset($trace['class']) ? $trace['class'] : null,
            'type' => isset($trace['type']) ? $trace['type'] : null,
        ];
    }

    $trace = $formatted_trace;
    $where = "";
    $traceCount = 1;
    foreach ($trace as $entry) {
        $where .=  $traceCount++ . ". File: " . ($entry['file'] ?? 'N/A') . " - Line: " . ($entry['line'] ?? 'N/A') . " - Function: " . ($entry['function'] ?? 'N/A') . " - Class: " . ($entry['class'] ?? 'N/A') . " - Type: " . ($entry['type'] ?? 'N/A') . "\n" . "<br/>";
    }

    return $where . "\n" . "<br/>";
}
