var jsonList = null;
$(document).ready(function () {
	// Load JSON file
	$.getJSON("info.json", function(json) { jsonLoaded(json); });
	
	//
	$("#searchTextInput").on('input',function(e){
		filterListAuto();
	});
	
	//
	$("#searchIsNaturalProduct").change(function() {
		filterListAuto();
	});
	
	//
	$("#searchIsVegetable").change(function() {
		filterListAuto();
	});
});


/* */
function jsonLoaded( json ){
	//console.log("jsonLoaded");
	
	jsonList = json; 
	
	for ( let key in jsonList) {
		
		//
		var item = jsonList[key];
		
		// Append tags. For search.
		if ( item["tags"] ) jsonList[key]["tagsString"] = item["tags"].join(" ");
		
		// Append posologies texts. For search.
		var itemPosologies = item.posologies;
		item["posologiesString"] = "";
		for ( let key2 in itemPosologies) {
			var itemPosologie = itemPosologies[key2];
			item["posologiesString"] += itemPosologie["label"] + " " + itemPosologie["description"];
		}
		
		//
		if ( item.label ){

			var itemTemplate = $("#itemTemplate").html();
			itemTemplate = itemTemplate.replace("{ID}", "item"+key)
			$("#list").append( itemTemplate );
			
			var itemElement = $("#item"+key);
			itemElement.find("a").attr( "href", "info/img/"+ ( item.logo ? item.logo : "default.png") );
			
			// Logo
			var logoUrl = item.logo.startsWith("http") ? item.logo : "info/img/"+ ( item.logo ? item.logo : "default.png");
			itemElement.find("img").attr( "src", logoUrl );
			
			// Label
			itemElement.find(".itemLabel").html(item.label);
			
			// Brand
			itemElement.find(".itemBrandContainer").css( "display", item.brand ? "" : "none");
			itemElement.find(".itemBrand").html(item.brand);
			
			// Descriptions
			itemElement.find(".itemDescriptionsLayout").css( "display", item.descriptionShort || item.descriptionLong ? "" : "none");
			itemElement.find(".itemDescShort").html(item.descriptionShort);
			itemElement.find(".itemDescLong").html(item.descriptionLong);
			
			// Benefits
			itemElement.find(".itemBenefitsLayout").css( "display", item.benefits ? "" : "none");
			itemElement.find(".benefits").html(item.benefits);
			
			// Nutritional value
			itemElement.find(".itemNutritionalValueLayout").css( "display", item.nutritional_value ? "" : "none");
			itemElement.find(".nutritionalValue").html(item.nutritional_value);
			
			// Warning
			itemElement.find(".itemDescWarningLayout").css( "display", item.warning ? "" : "none");
			itemElement.find(".itemDescWarningValue").html(item.warning ? item.warning : "");
			
			// Ingredients
			itemElement.find(".itemDescIngredientsLayout").css( "display", item.ingredients ? "" : "none");
			itemElement.find(".itemDescIngredientsValue").html(item.ingredients ? item.ingredients : "");
			
			//
			itemElement.find(".isNaturalProduct").css("display", item.isNaturalProduct ? "" : "none");
			itemElement.find(".isVegetable").css("display", item.isVegetable ? "" : "none");
			
			// Posologies
			var itemPosologies = item.posologies;
			itemElement.find(".itemPosologiesLayout").css( "display", ( itemPosologies && itemPosologies.length > 0 ) ? "" : "none");
			for ( let key2 in itemPosologies) {
				itemElement.find(".posologies").append(
					$("<list-group/>")
						.addClass("list-group-item")
						.append(
							$("<b/>").html(itemPosologies[key2]["label"])
						)
						.append(
							$("<div/>").html(itemPosologies[key2]["description"])
						)
				);
			}
			
			itemTags = item.tags;
			for ( let key2 in itemTags) {
				itemElement.find(".tags").append(
					$("<span/>").addClass("badge bg-secondary ml-1").html(itemTags[key2])
				);
			}
			
			itemPhotos = item.photos;
			for ( let key2 in itemPhotos) {
				var photoUrl = "info/img/"+ itemPhotos[key2]["url"];
				itemElement.find(".photos").append(
					$("<a/>").append(
						$("<img/>").addClass("rounded mx-1").css("height", "5rem").attr( "src", photoUrl )
					)
					.attr("target", "_blank" )
					.attr("href", photoUrl )
				);
			}
		}
	}
	console.log(jsonList);
	
	//
	filterListAuto();
}

/* */
function filterListAuto(){
	filterList( $("#searchTextInput").val(), $("#searchIsNaturalProduct").val(), $("#searchIsVegetable").val() );
}

/* */
function filterList( text, isNaturalProduct, isVegetable ){
	for ( let key in jsonList) {
		var found = false;
		var item = jsonList[key];
		if ( text == null ) found = true;
		else if ( itemSearchMatch( item, text ) ){
			 found = true;			
		}
		
		if ( found ) {
			if ( isNaturalProduct == 1 && !item.isNaturalProduct ) found = false;
			else if ( isNaturalProduct == 0 && item.isNaturalProduct ) found = false;
		}
		
		if ( found ) {
			if ( isVegetable == 1 && !item.isVegetable ) found = false;
			else if ( isVegetable == 0 && item.isVegetable ) found = false;
		}
		
		$("#list").children().eq(key).css( "display", found ? "" : "none")
	}
}

/* */
function itemSearchMatch( item, searchText ){
	if ( item == null ) return false
	else if ( searchMatch( item.label+" "+item.descriptionShort+" "+item.descriptionLong+" "+item.warning+" "+item.nutritional_value+" "+item.ingredients+" "+item.tagsString+" "+item.posologiesString, searchText ) ) return true
}

/* */
function searchMatch( text, searchText ){
	if ( text ){
		var textClean = text.toLowerCase().trim()
		var allFound = true
		var searchWords = searchText.toLowerCase().split(" ");
		for ( key in searchWords){
			var word = searchWords[key];
			if ( !textClean.includes( word ) ) allFound = false;
		}
		return allFound;
	}
	else return false;
}












