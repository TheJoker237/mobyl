<?php 
    
    /**
    * 
    */
    class BaseModel {

        private static function init(){
            self::$className = get_called_class();

            $foo = new self::$className();

            if(isset($foo::$sqlQuery) && strlen($foo::$sqlQuery)>0){
                self::$query = $foo::$sqlQuery;
            }

            if(isset($foo::$tableName) && strlen($foo::$tableName)>0){
                self::$tableName = $foo::$tableName;
            }
            else{
                self::$tableName = strtolower(self::$className);
            }
        }
        public static function get($id){
            self::q();
            self::init();
            global $BD;
            if(isset(self::$query) && strlen(self::$query)>0)
                $query = self::$query;
            else
                $query = "SELECT * FROM ".self::$tableName." WHERE 1 ";

            $sql = $BD->prepare($query." AND ".self::getPrimaryKeyField()." = ?");
            $sql->execute(array($id));
            if($sql->rowCount()==0)
                return null;
            else
                return self::makeObjectSingle($sql->fetch());
        }

        public static function loadQuery($query, $params=array()){
            self::init();
            global $BD;

            $listevent = $BD->prepare($query);
            $listevent->execute($params);
            return self::makeObject($listevent);
        }

        public static function getPrimaryKeyField(){
            global $BD;
            $sql = $BD->query('show columns from '.self::$tableName.' where `Key` = "PRI"');
            $res = $sql->fetch();
            return $res['Field'];
        }
        public static function makeObject($tab){
            self::init();
            $result = array();
            while ($res = $tab->fetch()) {
                $foo = new self::$className();
                foreach($res as $key => $value) {
                  $foo->{$key} = $value;
                }
                $result[] = $foo;
            }
            return $result;
        }

        public static function makeObjectSingle($res){
            self::init();
            $foo = new self::$className();
            foreach($res as $key => $value) {
              $foo->{$key} = $value;
            }
            return $foo;
        }
        private static $query = "";
        private static $className;
        private static $tableName;
        private static $sqlQuery;
        private static $suiteQuery="";
        private static $orderBy="";
        private static $limit="";
        private static $offset="";
        private static $queryParams = array();
        public static function all(){
            self::init();
            self::$queryParams = array();
            self::$suiteQuery = "";
            return new static();
        }
        public static function where(){
            self::init();
            $array = func_get_args();
            if(count($array)>0){
                self::$suiteQuery .= " AND ".$array[0];
                if(count($array)>1){
                    self::$queryParams = array_merge(self::$queryParams, array_slice($array, 1));
                }
            }
            return new static();
        }

        public static function query(){
            self::$queryParams = array();
            self::$suiteQuery = "";
            return new static();
        }
        public static function q(){
            self::$queryParams = array();
            self::$suiteQuery = "";
            self::$orderBy = "";
            self::$sqlQuery= "";
            self::$tableName= "";
            self::$query= "";
            return new static();
        }
        public static function orderBy($order){
            self::init();
            if(strlen($order)>0){
                self::$orderBy .= ", ".$order;
            }
            return new static();
        }
        public static function limit($limit){
            self::init();
            if(strlen($limit)>0){
                self::$limit = "LIMIT ".$limit;
            }
            return new static();
        }

        public static function offset($offset){
            self::init();
            if(strlen($offset)>0){
                self::$offset = "OFFSET ".$offset;
            }
            return new static();
        }
        public static function filter($array){
            self::init();
            if(count($array)>0){
                foreach($array as $key => $value) {
                    self::$suiteQuery .= " AND ".self::$tableName.".".$key." = ?";
                    array_push(self::$queryParams, $value);
                }
            }
            return new static();
        }

        public static function insert($array){
            self::q();
            self::init();
            global $BD;
            $query = array();
            $params = array();
            $values = array();

            if(count($array)>0){
                foreach($array as $key => $value) {
                    $query[] = $key;
                    $params[] = $value;
                    $values[] = "?";
                }
                $sql = $BD->prepare("INSERT INTO ".self::$tableName." (".implode(",", $query).") VALUES (".implode(",", $values).")");
                $sql->execute($params);
                return self::get($BD->lastInsertId());
            }
            return new static();
        }
        public static function delete(){
            self::q();
            self::init();
            global $BD;
            $array = func_get_args();
            if(count($array)==1){
                $sql = $BD->prepare("DELETE FROM ".self::$tableName." WHERE ".self::getPrimaryKeyField()+" = ?");
                $sql->execute(array($array[0]));
            }
            else if(count($array)>1){
                $sql = $BD->prepare("DELETE FROM ".self::$tableName." WHERE ".$array[0]."");
                $sql->execute(array_slice($array, 1));
            }
        }
        public static function execute(){
            self::init();
            global $BD;
            if(strlen(self::$orderBy)>0){
                $order = "ORDER BY ".substr(self::$orderBy, 1);
            }
            else
                $order = "";

            if(strlen(self::$limit)>0){
                $limit = self::$limit;
            }
            else
                $limit = "";

            if(strlen(self::$offset)>0){
                $offset = self::$offset;
            }
            else
                $offset = "";

            if(isset(self::$query) && strlen(self::$query)>0)
                $query = self::$query;
            else
                $query = "SELECT * FROM ".self::$tableName." WHERE 1";

            $array = func_get_args();

            if(count($array)>0 && $array[0]==true){
                echo $query." ".self::$suiteQuery." ".$order." ".$limit." ".$offset;
            }

            $listevent = $BD->prepare($query." ".self::$suiteQuery." ".$order." ".$limit." ".$offset);
            $listevent->execute(self::$queryParams);
            return self::makeObject($listevent);
        }
        public static function count(){
            global $BD;
            self::init();
            $listevent = $BD->prepare("SELECT COUNT(*) as n from ".self::$tableName." WHERE 1 ".self::$suiteQuery);
            $listevent->execute(self::$queryParams);
            $res = $listevent->fetch();
            return $res['n'];
        }

        public static function avg($columnName){
            global $BD;
            self::init();
            $listevent = $BD->prepare("SELECT COALESCE(AVG(COALESCE(".$columnName.", 0)),0) as n from ".self::$tableName." WHERE 1 ".self::$suiteQuery);
            $listevent->execute(self::$queryParams);
            $res = $listevent->fetch();
            return $res['n'];
        }

        public function createProperty($name, $value){
            $this->{$name} = $value;
        }
    }
?>