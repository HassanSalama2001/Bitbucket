<?php

class Database
{
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'scandiweb';
    private $conn = false;

    //connect function to connect to the database and return an error if the connection was interrupted
    public function connect()
    {
        global $myconn;
        if (!$this->conn) {
            $myconn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
            if ($myconn) {
                $seldb = mysqli_select_db($myconn, $this->db_name);
                if ($seldb) {
                    $myconn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
                    $this->conn = true;
                    return $myconn;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return $myconn;
        }
    }

    //this function if i called it, it will just checks if the connection is opened it will close it, if the connection was already closed nothing will happen
    public function disconnect()
    {
        if ($this->conn) {
            if (mysqli_close($this->conn)) {
                $this->conn = false;
                return true;
            } else {
                return false;
            }
        }
    }

    //this function checks if a table exists sp that I can use it in CRUD operations
    private function tableExists($table)
    {
        $tablesInDb = mysqli_query($this->connect(), 'SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');
        if ($tablesInDb) {
            if (mysqli_num_rows($tablesInDb) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    private $result = array(); //this is an array to store the results from select in it
    //this function is used when we need to show all or some of the values in a table 
    public function select($table, $rows = '*', $where = null, $order = null)
    {
        $q = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($order != null)
            $q .= ' ORDER BY ' . $order;
        if ($this->tableExists($table)) {
            $query = mysqli_query($this->connect(), $q);
            if ($query) {
                $numResults = mysqli_num_rows($query);
                for ($i = 0; $i < $numResults; $i++) {
                    $r = mysqli_fetch_array($query);
                    $key = array_keys($r);
                    for ($x = 0; $x < count($key); $x++) {
                        // Sanitizes keys so only alphavalues are allowed 
                        if (!is_int($key[$x])) {
                            if (mysqli_num_rows($query) > 1)
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            else if (mysqli_num_rows($query) < 1)
                                $this->result = null;
                            else
                                $this->result[$key[$x]] = $r[$key[$x]];
                        }
                    }
                }
                return $this->result;
            } else {
                return false;
            }
        } else
            return false;
    }

    //this function is used when inserting a new values in tables
    public function insert($table, $values, $column = null)
    {
        if ($this->tableExists($table)) {
            $insert = 'INSERT INTO ' . $table;
            //this part to make sure of the column syntax is correct
            if ($column != null) {
                $insert .= ' (';
                for ($i = 0; $i < count($column); $i++){
                    if($i == count($column)-1){
                        $insert .= "`". $column[$i] . "`";
                    }
                    else{
                        //this to add ',' after each column name except the last one
                        $insert .= "`". $column[$i] . "`,";
                    }
                }
                $insert .= ')';
            }
            for ($i = 0; $i < count($values); $i++) {
                if (is_string($values[$i]))
                    $values[$i] = '"' . $values[$i] . '"';
            }
            $values = implode(',', $values);
            $insert .= ' VALUES (' . $values . ')';
            $ins = mysqli_query($this->connect(), $insert);
            if ($ins) {
                return true;
            } else {
                return false;
            }
        }
    }

    //this function is used when deleting rows from tables
    public function delete($table, $column = null , $value = null)
    {
        if ($this->tableExists($table)) {
            if ($column == null) {
                $delete = 'DELETE ' . $table;
            } else {
                $delete = "DELETE FROM " . $table . " WHERE `" . $column . "` = '" . $value . "'";
            }
            $del = mysqli_query($this->connect(), $delete);
            if ($del) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //this function is used when updating values in tables (but we will not use it in this test assessment)
    public function update($table, $rows, $where) // $rows['Name', 'age', 'id'] ----------> $where['Ahmed', 25, 20106885]
    {
        if ($this->tableExists($table)) {
            // Parse the where values 
            // even values (including 0) contain the where rows 
            // odd values contain the clauses for the row 
            for ($i = 0; $i < count($where); $i++) {
                if ($i % 2 != 0) {
                    if (is_string($where[$i])) {
                        if (($i + 1) != null)
                            $where[$i] = '"' . $where[$i] . '" AND '; //$where['"Ahmed" AND', '"25" AND', '"20106885"']
                        else
                            $where[$i] = '"' . $where[$i] . '"';
                    }
                }
            }
            $where = implode('=', $where); //$where['= "Ahmed" AND', '= "25" AND', '= "20106885"']
            $update = 'UPDATE ' . $table . ' SET ';
            $keys = array_keys($rows);
            for ($i = 0; $i < count($rows); $i++) {
                if (is_string($rows[$keys[$i]])) {
                    $update .= $keys[$i] . '="' . $rows[$keys[$i]] . '"';
                } else {
                    $update .= $keys[$i] . '=' . $rows[$keys[$i]];
                }
                // Parse to add commas 
                if ($i != count($rows) - 1) {
                    $update .= ',';
                }
            }
            $update .= ' WHERE ' . $where;
            $query = mysqli_query($this->connect(), $update);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
