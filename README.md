# Medications

## HTML/JSON

In `info.json`

### Item Syntax

	{
		"label"            : "Medication label",
		"brand"            : "Brand name",
		"descriptionShort" : "Short description",
		"descriptionLong"  : "Long description",
		"benefits"         : "Benefits",
		"nutritional_value": "Nutritional value",
		"ingredients"      : "Ingredients",
		"posologie"        : "Posologie",
		"warning"          : "Warning",		
		"isNaturalProduct" : true,
		"isVegetable"      : true,
		"posologies"       : [ LIST OF POSOLOGIES ],
		"logo"             : "logo url",
		"website"          : "website url",
		"photos"           : [ LIST OF PHOTOS ],
		"tags"             : [ "TAG1", "TAG2", "TAG3" ]
	}


### Item Photo Syntax

	{
		"url"            : ""
	}


### Item Posologies Syntax

	{
		"label"            : "Label",
		"description"      : "Description"
	}


## PHP

### Installation

#### Composer packages

Run 

```
composer install
```


#### Node packages

Run 

```
npm i
```

#### config.php

Copy the `configTemplate.php` to `config.php` and change values

