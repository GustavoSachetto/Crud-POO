
<?php

class Conection 
{
    private string $table;
    private string $join = '';

    private PDO $conection;
    private static string $dbname;
    private static string $dbhost;
    private static string $dbuser;
    private static string $dbpassword;

    public function __construct(string $table) 
    {
        $this->table = $table;
        $this->setConection();
    }

    public static function config(string $dbname, string $dbhost, string $dbuser, string $dbpassword): void
    {
        self::$dbname     = $dbname;
        self::$dbhost     = $dbhost;
        self::$dbuser     = $dbuser;
        self::$dbpassword = $dbpassword;
    }

    public function setConection(): void
    {
        try {
            $this->conection = new PDO("mysql:dbname=".self::$dbname.";host=".self::$dbhost, self::$dbuser, self::$dbpassword);
        } catch (\PDOException $th) {
            echo('<script>console.error("ERROR CONECTION")</script>');
        }
    }

    public function execute(string $query, array $values = []): PDOStatement|false
    {
        try {
            $statement = $this->conection->prepare($query);
            $statement->execute($values);
            return $statement;
        } catch (\Throwable $th) {
            echo('<script>console.error("ERROR EXECUTE")</script>');
            return false;
        }
    }

    public function join(string $foreignTable, string $match, string $joinType = "INNER JOIN"): void
    {
       $this->join .= " {$joinType} {$foreignTable} ON {$match} ";
        
    }

    public function insert(array $values): bool
    {
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        $query = "INSERT INTO ".$this->table."(".implode(",", $fields).") VALUES (".implode(",", $binds).")";
        $result = $this->execute($query, array_values($values));

        return gettype($result) === "object" ? true : false;
    }

    public function select(
        string $where = null, 
        string $order = null,  
        string $limit = null, 
        string $fields = '*'
        ): PDOStatement|false
    {
        isset($where) ? $where = ' WHERE ' . $where . ' ' : $where = '';
        isset($order) ? $order = ' ORDER BY ' . $order . ' ' : $order = '';
        isset($limit) ? $limit = ' LIMIT ' . $limit . ' ' : $limit = '';
        isset($this->join) ? $join =$this->join : $join = '';

        $query = "SELECT {$fields} FROM " . $this->table . $join . $where . $order . $limit;

        return $this->execute($query);
    }

    public function update(string $where, array $values): bool
    {
        isset($where) ? $where = ' WHERE ' . $where . ' ' : $where = '';

        $fields = array_keys($values);
        $query = "UPDATE ".$this->table." SET ".implode("=?,", $fields)."=? ". $where;
        $result = $this->execute($query, array_values($values));

        return gettype($result) === "object" ? true : false;
    }

    public function delete(string $where): bool
    {
        isset($where) ? $where = ' WHERE ' . $where . ' ' : $where = '';

        $query = "DELETE FROM ".$this->table.$where;
        $result = $this->execute($query);

        return gettype($result) === "object" ? true : false;
    }
}

Conection::config(
    $_ENV['DB_NAME'], 
    $_ENV['DB_HOST'], 
    $_ENV['DB_USER'], 
    $_ENV['DB_PASS']
);