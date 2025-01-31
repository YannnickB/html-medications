# jQuery - Element fille

Fill jQuery element with array of values

## How to use

### Include Javascript

	<script src="js/jquery-element-fill.js"></script>

### Javascript

```
fill( values, click );
fillAjax( url, click, success, errorFunc );
```

```
fillList( values, editHref, click );
fillListNoItemTemplate( values, editHref );
fillListAjax( url, editHref, click, success, error );
```

```
fillInputSelect( options );
fillInputsSelect( optionsList );
fillInputsSelectAjax( url, success, error );
```

```
fillReset();
fillEnable();
fillDisable();
```

## Examples

```
<div id="elementToFillId">
	<div class="firstname"></div>
	<div class="lastname"></div>
	<div class="email"></div>
	<img class="image"></img>
	<div>
		<span class="enable_on">Enable</span>
		<span class="enable_off">Not enable</span>
	</div>
	<span fill-key="color" fill-type="backgroundColor" style="height: 1em; width: 1em;"></span>
	<div fill-key="image" fill-type="backgroundImage" style="height: 7em; width: 7em; background-size: cover; background-position: center;"></div>
	<div class="clickable" fill-key="userId" fill-click-action="view">View</div>
</div>
			
<script>
var values = {
	"userId" : 1,
	"lastname" : "Smith",
	"firstname" : "John", 
	"email" : "john.smith@domain.com", 
	"image" : "https://picsum.photos/150/100",
	"color" : "#ff8c00",
	"enable" : true
};

$("#elementToFillId").fill( values, function(action, id){
	console.error("CLICK");
});
</script>
```


Same with AJAX URL instead of values
```
<script>
$("#elementToFillId").fillAjax( URL,
	function( action, id ){
		console.log( "CLICK" );
	},
	function( data ){
		console.log( "SUCCESS" );
	},
	function( jqXHR, textStatus, errorThrown, element, url ){
		console.log( "ERROR" );
	}
);
</script>
```

### Classes

 - clickable : the element will trigger the click function
			

### HTML Attributes

**Main element**

- disabled : disable element on load.

**Elements**

- fill-key : Value key. Can be used if using key in element class is not possible,
- fill-type : Fill type { "backgroundColor", "backgroundImage" },
- fill-click-action : Action for clickable elements


### Lists

#### Default

```
<div id="list">
	<table border="1">
		<thead style="text-align: left;"></thead>
		<tbody></tbody>
		<tfoot style="text-align: left;"></tfoot>
	</table>
</div>

<script>
$("#list").fillListAjax( "list.json", "user.html?userId=[userId]",
	function( id ){
		console.log( "CLICK" );
	},
	function( element, data ){
		console.log( "SUCCESS" );
	},
	function( result, url ){
		console.log( "ERROR" );
	}
);
</script>
```


```
<div id="listWithTemplate" class="list-group" fill-items-template="listWithTemplateRowTemplate"></div>

<!-- TEMPLATES -->
<div style="display: none">
	<!-- ITEM TEMPLATE -->
	<a id="listWithTemplateRowTemplate" class="fillEditLink">
		<div style="display: flex;">
			<div style="flex: 1;">
				<b class="userName"></b>
				<div class="userEmail_on">Email: <span class="userEmail"></span></div>
			</div>
			<div style="display: flex;">
				<div class="clickable" fill-key="userId" fill-click-action="view" title="View">View</div>
			</div>
		</div>
		<br/>
	</a>

</div>

<script>
$("#listWithTemplate").fillListAjax( "list.json", "user.html?userId=[userId]",
	function( action, id ){
		console.log( "CLICK" );
	},
	function( element, data ){
		console.log( "SUCCESS" );
	},
	function( result, url ){
		console.log( "ERROR" );
	}
);
</script>
```


## Dev

### Install

Npm install. Run

```
npm i
```

### Minify

Run node script

```
node node/minify.js
```

If Error: Cannot find module 'yuicompressor', run

```
npm i yuicompressor
```
