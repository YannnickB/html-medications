<?php

//
global $languagesHandlerAllowedUpdateFields;
$languagesHandlerAllowedUpdateFields = ["language_name", "language_code", "language_country_code", "language_charset", "language_ltr"];

/** */
class languagesHandler{
		
	/** INSERT */
	static function insert( $vars ) {
		global $globalPdo, $languagesHandlerAllowedUpdateFields;
		//echo "languagesHandler::insert() vars: <pre>"; print_r( $vars ); echo "</pre>";
	
		$query = " INSERT 	languages
		";
		
		$query .= " SET ";
		$cpt = 0;
		foreach ( $vars as $key => $var ){
			if ( in_array( $key, $languagesHandlerAllowedUpdateFields ) ){
				$query .= ( $cpt > 0 ? ", " : "" ) . " $key = '". addslashes( $var ) ."'";
				$cpt++;
			}
		}
		
		//echo "languagesHandler::insert() query: ".nl2br($query) ."<br/><br/><br/>";
		$stm = $globalPdo->prepare($query);
		if ( $stm->execute() ){
			$result = [0, 0, null];
			$result["id"] = $globalPdo->lastInsertId(); 
			return $result;
		}
		else return $stm->errorInfo();		
	}
		
	/** UPDATE */
	static function update( $language_id, $vars ) {
		global $globalPdo, $languagesHandlerAllowedUpdateFields;
		//echo "languagesHandler::update() vars: <pre>"; print_r( $vars ); echo "</pre>";

		if ( $language_id ){
				
			$query = " UPDATE 	languages ";
			$query .= " SET ";
			$cpt = 0;
			foreach ( $vars as $key => $var ){
				if ( in_array( $key, $languagesHandlerAllowedUpdateFields ) ){
					$query .= ( $cpt > 0 ? ", " : "" ) . " $key = '". addslashes( $var ) ."'";
					$cpt++;
				}
			}
			$query .= " WHERE language_id = :language_id";
			//echo "languagesHandler::update() query: ".nl2br($query) ."<br/><br/><br/>";
			$stm = $globalPdo->prepare($query);
			$stm->bindValue(":language_id", $language_id, PDO::PARAM_INT);
			if ( $stm->execute() ) return [0,0,null];
			else return $stm->errorInfo();
		}
		return false;
	}
	
		
	/** DELETE */
	static function delete( $language_id ) {
		global $globalPdo;
		//echo "languagesHandler::delete() language_id: $language_id<br/>";
		if ( $language_id ){
			$query = " DELETE FROM languages WHERE language_id = :language_id";
			$stm = $globalPdo->prepare($query);
			$stm->bindValue(":language_id", $language_id, PDO::PARAM_INT);
			if ( $stm->execute() ) return [0,0,null];
			else return $stm->errorInfo();
		}
		return false;
	}
	

	/** */
	static function getLanguages(){
		global $globalLanguages;
		//echo __FILE__ . " line " . __LINE__ . " | " . __FUNCTION__ . " globalLanguages=<pre>"; print_r($globalLanguages); echo "</pre>";
		return $globalLanguages;
	}
	
	/** */
	static function getLanguage( $language_id ) {
		global $globalPdo;
		
		$row = null;
		
		$query = "
			SELECT 	L.*
			FROM 	languages L
			WHERE 	language_id = :language_id
		";
		$stm = $globalPdo->prepare($query);
		$stm->bindValue(":language_id", $language_id, PDO::PARAM_INT);
		if ( $stm->execute() ){
			$row = $stm->fetch(PDO::FETCH_ASSOC);
		}
		else echo $stm->errorInfo()[2] . "<br/>";
		
		return $row;
	}

	/** */
	static function getOptions( $selectedValues ){
		//echo __FILE__ . " line " . __LINE__ . " getLanguages()<br/>";
		global $globalPdo;

		if ( !$globalPdo ) return array();

		$languages = languagesHandler::getLanguages();
		$options = array();
		foreach ( $languages as $key => $language ){
			$options[] = array( "label" => $language["language_name"], "value" => $language["language_code"], "selected" => in_array( $language["language_code"], $selectedValues ) );
		}
		return $options;
	}
}

?>

