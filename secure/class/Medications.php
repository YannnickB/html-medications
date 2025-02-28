<?php

/**
 * 
 */
class Medications extends PdoObjectRecordAbstract  {

	/** Table name */
	protected string $tableName = "Medications";
	/** Primary key column name */
	protected ?string $primaryKeyColumnName = "MedicationId";
	/** Insertable column name */
	protected ?array $insertableColumnsName = [
		"MedicationLabel", "MedicationDescriptionShort", "MedicationDescription", "MedicationLogoRelativePath", "MedicationIsNaturalProduct", "MedicationIsVegetable", "MedicationBenefits", "MedicationIngredients", "MedicationWarning", "MedicationAdministeringMethod"
	];
	/** Updatable column name */
	protected ?array $updatableColumnsName = [ 
		"MedicationLabel", "MedicationDescriptionShort", "MedicationDescription", "MedicationLogoRelativePath", "MedicationIsNaturalProduct", "MedicationIsVegetable", "MedicationBenefits", "MedicationIngredients", "MedicationWarning", "MedicationAdministeringMethod"
	];


	/**
	 * Constructor
	 *
	 * @param PDO $pdo PDO connection	
	 */
	function __construct( PDO $pdo, $primaryKeys = null ) {
		//echo __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "( primaryKeys ) primaryKeys=<pre>"; print_r( $primaryKeys ); echo "</pre><br>";		
		parent::__construct( $pdo, $primaryKeys );
	}
	
	
	


	/**
	 * Fetch all records
	 * @param array $filters Array of values, indexed by column name
	 */
	public function fetchAll( ?array $filters = [], ?string $sortOrder = null ) {
		global $config;
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

				foreach ( $rows as $key => &$row){
					$row["LogoUrl"] = $config["rootUrl"] . "/info/img/" . $row["MedicationLogoRelativePath"];
					$row["MedicationIsNaturalProduct"] = (int)($row["MedicationIsNaturalProduct"]);
					$row["MedicationIsVegetable"] = (int)($row["MedicationIsVegetable"]);
				}

				return $rows;
			}
			else{
				trigger_error("Error" . $this->pdo->errorInfo()[2], E_USER_WARNING);
			}
		}
		return null;
	}

	

	/**
	 * Fetch all records
	 * @param array $filters Array of values, indexed by column name
	 */
	public function findAll( ?array $filters = [], ?string $sortOrder = null ) {
		global $config;
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
					
					if ( in_array( $key, ["MedicationIsNaturalProduct"] ) ){
						if ( is_array( $filter ) ){
							if ( array_key_exists( "type", $filter ) ){
								$sql .= " $wand $key LIKE '" . addslashes($filter["value"]) . "' ";
							}
							else{
								$sql .= " $wand $key IN ('" . implode( "', '", $filter ) . "')";
							}
						}
						else{
							if ( $filter === null ){
								$sql .= " $wand $key IS NULL ";
							}
							else if ( is_string( $filter ) ){
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
					else if ( $key == "q" ){
						$sql .= " $wand(";
						$sql .= " 	LOWER( MedicationLabel ) LIKE '%" . addslashes(strtolower( $filter ) ) . "%'";
						$sql .= " 	OR ";
						$sql .= " 	LOWER( MedicationDescriptionShort ) LIKE '%" . addslashes(strtolower( $filter ) ) . "%'";
						$sql .= " )";
						$wand = " AND ";
					}
				}
			}
			
			// Order by
			if ( $sortOrder ) $sql .= "ORDER BY $sortOrder";

			//echo "<br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . "() sql: $sql<br>";
			$query = $this->pdo->query($sql);
			if ( $query ){
				$rows = $query->fetchAll(PDO::FETCH_ASSOC);

				foreach ( $rows as $key => &$row){
					$row["LogoUrl"] = $config["rootUrl"] . "/info/img/" . $row["MedicationLogoRelativePath"];
					$row["MedicationIsNaturalProduct"] = (int)($row["MedicationIsNaturalProduct"]);
					$row["MedicationIsVegetable"] = (int)($row["MedicationIsVegetable"]);
				}

				return $rows;
			}
			else{
				trigger_error("Error" . $this->pdo->errorInfo()[2], E_USER_WARNING);
			}
		}
		return null;
	}

	


	/**
	 * Fetch record by ID
	 */
	function fetch():?array {
		global $config;
		$data = parent::fetch();
		$data["LogoUrl"] = $config["rootUrl"] . "/info/img/" . $data["MedicationLogoRelativePath"];
		return $data;
	}
}

