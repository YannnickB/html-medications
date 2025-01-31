<?php

/** */
class globalSmarty{

	/** */
	protected $smarty = null;

	/** */
	protected $rootFolder = null;

	/** */
	protected $defaultTemplatesFolder = null;

	/** */
	protected $cacheFolder = null;

	/** */
	protected $themesFolderPath = null;

	/** */
	protected $themeFolderName = null;

	/** */
	protected $leftDelimiter = "<{";

	/** */
	protected $rightDelimiter = "}>";

	/** */
	function __construct( $rootFolder, $defaultTemplatesFolder, $cacheFolder, $themesFolderPath = null, $themeFolderName = null ){
		//echo "<br/><br/><br/><br/><br/>" . __FILE__ . __LINE__ . " | " . __FUNCTION__ . "() themesFolderPath: $themesFolderPath, themeFolderName: $themeFolderName<br/>";
		$this->rootFolder = $rootFolder;
		$this->defaultTemplatesFolder = $defaultTemplatesFolder;
		$this->cacheFolder = $cacheFolder;
		$this->themesFolderPath = $themesFolderPath;
		$this->themeFolderName = $themeFolderName;
		$this->init();
	}

	/** */
	public function init(){
		//echo "initSmarty<br/>";
		if ( is_dir( $this->defaultTemplatesFolder ) ){
			
			$this->smarty = new Smarty\Smarty();	

			$this->smarty->setTemplateDir('');
			
			//echo "initSmarty() securePath: " . $privateConfig["securePath"] . "<br/>";
			$this->smarty->setCompileDir( $this->cacheFolder . "/templates_c" );
			$this->smarty->setCacheDir(   $this->cacheFolder . "/cache"       );
			$this->smarty->setConfigDir(  $this->cacheFolder . "/configs"     );
	
			$this->smarty->setLeftDelimiter("<{");
			$this->smarty->setRightDelimiter("}>");
			
			return $this->smarty;
		}
		return null;
	}

	/** */
	public function assign( $key, $value ){
		$this->smarty->assign( $key, $value ); 
	}

	/** */
	public function fetch( $templateRelativePath, $themeFolderName = null ){
		//echo "<br/><br/><br/><br/><br/>" . __FILE__ . __LINE__ . " | " . __FUNCTION__ . "() templateRelativePath: $templateRelativePath<br/>";
		
		if ( !$themeFolderName ) $themeFolderName = $this->themeFolderName;
		
		$themeTemplatePath = $this->themesFolderPath . "/$themeFolderName/$templateRelativePath";
		//echo __FILE__ . __LINE__ . " | " . __FUNCTION__ . "() themeTemplatePath: $themeTemplatePath<br/>";
		
		if ( is_file( $themeTemplatePath ) )
			$templatePath = $themeTemplatePath;
		else $templatePath = $this->defaultTemplatesFolder . "/" . $templateRelativePath;
		
		//echo __FILE__ . __LINE__ . " | " . __FUNCTION__ . "() templatePath: $templatePath<br/>";
		return $this->smarty->fetch( $templatePath ); 
	}

	/** */
	public function getCacheFolder(){ return $this->cacheFolder; }

}

