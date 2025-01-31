<?php

/** WARNING
 * 
 * Limited to tables having a single field primary key, or no primary key at all.
*/

/** */
abstract class PdoObjectRecordAbstract {


	/** PDO Connection */
	protected PDO $pdo;


	/** Table name */
	protected string $tableName = "";

	/** Primary key column name */
	protected ?string $primaryKeyColumnName = null;


	/** Insertable column name */
	protected ?array $insertableColumnsName = null;

	/** Updatable column name */
	protected ?array $updatableColumnsName = null;

	
	/** Primary key value */
	protected ?int $primaryKeyValue = null;


	/**
	 * 
	 * @param PDO $pdo
	 * @param mixed $primaryKeyValue
	 */
	
	function __construct( PDO $pdo, $primaryKeyValue = null ) {
		//echo "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "( primaryKeyValue=$primaryKeyValue )<br>";
		$this->pdo = $pdo;
		$this->primaryKeyValue = $primaryKeyValue;
	}
	

	/**
	 * Insert record
	 */
	function insert( array $values = [] ):array {
		//echo  "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "(tableName=$this->tableName) values=<pre>"; print_r( $values ); echo "</pre><br>";
		//echo __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() tableName=".$this->tableName." values=<pre>"; print_r( $values ); echo "</pre><br>";
		//echo __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() insertableColumnsName=<pre>"; print_r( $this->insertableColumnsName ); echo "</pre><br>";

		if($this->pdo){

			// Remove uninsertable fields
			foreach ( $values as $key => $value ){
				if ( !in_array( $key, $this->insertableColumnsName ) ){
					unset($values[$key]);
				}
			}

			// Start query
			$query = "INSERT INTO {$this->tableName} ";
			
			$query .= " ( ";
				
			// Fields
			if ( $values ){
				$cpt = 0;
				foreach ( $values as $key => $value ){					
					$query .= ( $cpt > 0 ? ", " : "" ) . "$key";
					$cpt++;
				}
			}
				
			$query .= ") values (";
				
			// Values
			if ( $values ){
				$cpt = 0;
				foreach ( $values as $key => $value ){					
					$query .= ( $cpt > 0 ? ", " : "" ) . " :$key";
					$cpt++;
				}
			}
			$query .= ")";

			//echo "<br><br><br><br>" . __FILE__." line ".__LINE__."|".__FUNCTION__. "() query: $query<br>";

			//
			$stm = $this->pdo->prepare($query);

			// Values
			if ( $values ){
				foreach ( $values as $key => $value ){					
					$stm->bindValue(":$key",         $value,         PDO::PARAM_STR);
				}
			}
			//$stm->debugDumpParams();
		
			if ( $stm->execute() ){
				
				$result = [0, 0, null];
				$this->primaryKeyValue = $this->pdo->lastInsertId(); 
				$result["id"] = $this->primaryKeyValue; 
				return $result;
			}
			
			return $stm->errorInfo();
		}
		return [1, 1, __CLASS__ . ".".__FUNCTION__."() PDO is null"];
	}


	

	
 
	/**
	 * Update record
	 * 
	 * @param array $values Array of values, indexed by column name
	 */
	function update( array $values = [] ):array {
		//echo "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() values=<pre>"; print_r( $values ); echo "</pre><br>";
		//echo "PdoStruc.update() $this->pdoStrucArray[tables][$tableName]: <pre>"; print_r( $this->pdoStrucArray["tables"][$tableName] ); echo "</pre><br>";
		if($this->pdo){
			
			// Check values
			if ( !$this->primaryKeyValue ) return [1, 0, __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() Missing primary key value for table '$this->tableName'"];

			
			foreach ( $values as $key => $var ){
				if ( $this->updatableColumnsName ){
					if ( !in_array( $key, $this->updatableColumnsName ) ){
						unset($values[$key]);
					}
				}
			}
			
			$query = "UPDATE " . addslashes( $this->tableName ) ."\nSET ";
			
			// Fields
			$cpt = 0;
			foreach ( $values as $key => $value ){
				$query .= ( $cpt > 0 ? ",\n" : "" ) . "$key = :$key";
				$cpt++;
			}
			
			// PK
			$query .= "\nWHERE " . $this->primaryKeyColumnName . " = :where_" . $this->primaryKeyColumnName;

			//echo "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() query: <pre>$query</pre><br>";

			//$query = $this->pdo->query($query);
			$stm = $this->pdo->prepare($query);			
			
			// Bind values
			foreach ( $values as $key => $value ){

				if ( strlen($value) == 0 ) $value = null;

				$stm->bindValue(":$key", $value, PDO::PARAM_STR);
			}

			// Bind PK
			$stm->bindValue(":where_" . $this->primaryKeyColumnName, $this->primaryKeyValue, PDO::PARAM_INT);
			
			//$stm->debugDumpParams();		
			if ( $stm->execute() ){				
				$result = [0, 0, null];
				$result["id"] = $this->primaryKeyValue; 
				return $result;
			}
			
			return $stm->errorInfo();
		}
		return [0, 0, __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() PDO is null"];
	}


	/**
	 * 
	 * @return array
	 */
	function delete():array {
		$result = [0,0,null];
		if ( $this->primaryKeyValue ){
			$query = "DELETE FROM {$this->tableName} WHERE {$this->primaryKeyColumnName} = :pk";
			//echo "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() query: $query<br>";
			$stm = $this->pdo->prepare($query);
			$stm->bindValue(":pk", $this->primaryKeyValue);
			if ( $stm->execute() ){}
			else {
				$result = $stm->errorInfo();
			}
		}
		else{
			$result = [1,1, __CLASS__.".".__FUNCTION__. "() No primary key"];
		}
		return $result;
	}


	/**
	 * Fetch all records
	 * @param array $filters Array of values, indexed by column name
	 */
	public function fetchAll( ?array $filters = [], ?string $sortOrder = null ) {
		//echo __FILE__." line ".__LINE__." | ".__FUNCTION__. "() filters: <pre>"; print_r( $filters ); echo "</pre><br>";
		if($this->pdo){
			$sql = "
SELECT T.*
FROM ". addslashes($this->tableName)." T
";
			
			// Filters
			if ( $filters  ){
				
				$wand = " WHERE ";
				foreach ( $filters as $key => $filter ){
					
					if ( is_array( $filter ) ){
						if ( array_key_exists( "type", $filter ) ){
							$sql .= " $wand $key LIKE '" . addslashes($filter["value"]) . "' ";
						}
						else{
							$sql .= " $wand $key IN ('" . implode( "', '", $filter ) . "')";
						}
					}
					else{
						if ( is_string( $filter ) ){
							$sql .= " $wand $key = '" . addslashes($filter) . "'";
						}
						else if ( is_integer( $filter ) ){
							$sql .= " $wand $key = " . intval($filter) . "";
						}
						else{
							$sql .= " $wand $key = '" . addslashes($filter) . "'";
						}
					}
					$wand = " AND ";
				}
			}
			
			// Order by
			if ( $sortOrder ) $sql .= "ORDER BY $sortOrder";

			//echo "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() sql: $sql<br>";
			$query = $this->pdo->query($sql);
			if ( $query ){
				$rows = $query->fetchAll(PDO::FETCH_ASSOC);
				return $rows;
			}
			else{
				trigger_error("Error" . $this->pdo->errorInfo()[2], E_USER_WARNING);
			}
		}
		return null;
	}

	
	
	/** */
	function fetchFirst( ?array $filters = [], $sortOrder = null) {
 		//echo "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() filters=<pre>"; print_r( $filters ); echo "</pre><br>";
		$rows = $this->fetchAll($filters, $sortOrder);
		if ( $rows && count($rows) > 0 ){
			$token = $rows[0];
			$this->primaryKeyValue = $token[$this->primaryKeyColumnName];
			return $token;
		}
	}


	/**
	 * Fetch record by ID
	 */
	function fetch():?array {
		if($this->pdo){
			if($this->primaryKeyValue){
				$sql = "
SELECT 	T.*
FROM ". addslashes( $this->tableName ) ." T
WHERE " . addslashes( $this->primaryKeyColumnName ) . " = " . intval($this->primaryKeyValue) . "
";				
				//echo __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() sql=<pre>$sql</pre><br>";

				$query = $this->pdo->query($sql);
				if ($query){
					$record = $query->fetch(PDO::FETCH_ASSOC);
					if ( $record ) return $record;
					//else trigger_error("Error record empty" . $this->pdo->errorInfo()[2], E_USER_WARNING);
				}
				else trigger_error("Error query" . $this->pdo->errorInfo()[2], E_USER_WARNING);
			}
		}
		return null;
	}

	
	/**
	 * @return void Primary key column name
	 */	
	public function getPrimaryKeyColumnName(){
		echo $this->primaryKeyColumnName;
	}
	
	/**
	 * @return void Primary key value
	 */	
	public function getPrimaryKeyValue(){
		echo $this->primaryKeyValue;
	}

	
	
	
	/** */
	function getOptions( $labelColumnName = null, $emptyLine = false, $selectedValues = [] ){
		//echo __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "( labelColumnName=$labelColumnName, emptyLine=$emptyLine, selectedValues=$selectedValues )<br/>";

		if ( $labelColumnName == null ) $labelColumnName = $this->primaryKeyColumnName;
		if ( $selectedValues == null ) $selectedValues = [];

		// $lang, $getChildren, $vars, $level = 0 
		$rows = $this->fetchAll();
		//echo __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() rows=<pre>"; print_r( $rows ); echo "</pre>";
		if ( $emptyLine ) $options[] = [ "label" => "----", "value" => null, "selected" => in_array( null, $selectedValues ) ];

		foreach ( $rows as $key => $row ){
			$options[] = [
				"label" => $row[ $labelColumnName ],
				"value" => $row[ $this->primaryKeyColumnName ],
				"selected" => in_array( $row[ $this->primaryKeyColumnName ], $selectedValues ) 
			];
		}
		return $options;
	}
}
