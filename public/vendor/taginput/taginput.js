var elementsArray = [];
$.fn.tagInput = function(options) {

	return this.each(function() {
	
		var settings = $.extend( {}, { labelClass: "label label-success" }, options );
		
		var tagInput = $(this);
		var hiddenInput = $(this).children('input[type=hidden][name='+settings.hiddenInput+']');
		var textInput = $(this).children('input[type=text]');
		var datalist = $(this).children('datalist').attr('id');
		var addNew = settings.addNew;
		var hiddenIdInput = null;
		if(settings.hiddenIdInput != ''){
			hiddenIdInput = tagInput.children('input[type=hidden][name='+settings.hiddenIdInput+']');
		}
		
		cleanUpHiddenField();
		
		var defaultValues = hiddenInput.val().split(',');
		if (hiddenInput.val()!="") {
			for(i=0; i<defaultValues.length; i++) {
				addLabel(defaultValues[i]);
			}
		}
		textInput.keydown(function(event) {
			var str = $(this).val();
			if(event.keyCode == 8) { //Backspace
				if(str.length == 0) {
					closeLabel(-1);
				}
			} else if( event.keyCode == 13 ) { //Enter
				// makeBadge();
				event.preventDefault();
				return false;
			}
		});
		
		textInput.keyup(function(event) {
			var str = $(this).val();
			if( event.keyCode == 27 ) { //Escape
				textInput.val("");
				textInput.blur();
			} else if( event.keyCode == 13 ) { //Enter
				// makeBadge();
				event.preventDefault();
				return false;
			}
			if (str.indexOf(",") >= 0) {
				makeBadge();
			}
		});
		
		textInput.change(function() {
			makeBadge();
		});
		
		function makeBadge() {

			str = textInput.val();
			if(!($('#'+datalist).find('option[value="'+str+'"]').length > 0) && addNew == false){
				return false;
			}
			if(/\S/.test(str)) {
				str = str.replace(',','');
				str = str.trim();
				var hiddenInputArray = hiddenInput.val().split(',');
				var add = true;
				for(var i=0;i<hiddenInputArray.length;i++){
					if(str.toLowerCase() == hiddenInputArray[i].toLowerCase()){
						add = false;		
					}
				}
				if(add){
					textInput.val("");
					addLabel(str);
					var result = hiddenInput;
					result.val(result.val()+','+str);
				}
				cleanUpHiddenField();
			}
		}
		
		function closeLabel(id) {
			if(id>0) {
				label = tagInput.children('span.tagLabel[data-badge='+id+']');
			} else {
				label = tagInput.children('span.tagLabel').last();
			}
			if(elementsArray[label.text().slice(0,-2)] == null){
				$('#'+datalist).append('<option value="'+label.text().slice(0,-2)+'">');
			}else{
				$('#'+datalist).append('<option value="'+label.text().slice(0,-2)+'" data-id="'+ elementsArray[label.text().slice(0,-2)]+'">');
				var element = elementsArray[label.text().slice(0,-2)];
				delete elementsArray[label.text().slice(0,-2)];
				if(hiddenIdInput != null){
					var hiddenInputIdValueArray = hiddenIdInput.val().split(',');
					var hiddenInputIdValue = "";
					for(var i=0;i<hiddenInputIdValueArray.length;i++){
						if(element != hiddenInputIdValueArray[i]){
							if(hiddenInputIdValue == ""){
								hiddenInputIdValue = hiddenInputIdValueArray[i];
							}else{
								hiddenInputIdValue = hiddenInputIdValue + "," + hiddenInputIdValueArray[i];
							}
						}
					}
					hiddenIdInput.val(hiddenInputIdValue);
				}
			}
			hiddenInput.val(hiddenInput.val().replace((label.text().slice(0,-2)),''));
			cleanUpHiddenField();
			label.remove();
		}
		
		function addLabel(str) {
			if(tagInput.children('span.tagLabel').length > 0) {
				// badge = textInput.prev();
				badge = tagInput.children('span.tagLabel').last();
				var id = badge.data('badge') + 1;
				label = $( '<span class="'+settings.labelClass+' tagLabel" data-badge="'+id+'">'+str+' <a href="javascript:void(0);" data-badge="'+id+'" aria-label="close" class="closelabel delete"></a></span> ' ).insertAfter(badge);
			} else {
				label = $( '<span class="'+settings.labelClass+' tagLabel" data-badge="1">'+str+' <a href="javascript:void(0);" data-badge="1" aria-label="close" class="closelabel delete"></a></span> ' ).insertAfter(textInput);
				// label = $( '<span class="'+settings.labelClass+' tagLabel" data-badge="1">'+str+' <a href="javascript:void(0);" data-badge="1" aria-label="close" class="closelabel">&times;</a></span> ' ).insertBefore(textInput);
			}
			label.children('.closelabel').click(function() {
				closeLabel($(this).data('badge'));
			});
		}
		
		function cleanUpHiddenField() {
			s = hiddenInput.val();
			hs = s.replace(/^( *, *)+|(, *(?=,|$))+/g, '');
			hiddenInput.val(hs);
			var elementExists = false;
			$('#'+datalist+' option').each(function(){
				if(hiddenInput.val().indexOf($(this).val()) >= 0){
					if(hiddenIdInput != null){
						if(!($(this).data('id') == null)){
							elementsArray[$(this).val()] = $(this).data('id');
							elementExists = true;
							var hiddenInputIdValue = hiddenIdInput.val();
							if(hiddenIdInput.val() == ""){
								hiddenIdInput.val($(this).data('id'));
							}else{
								hiddenIdInput.val(hiddenInputIdValue+","+$(this).data('id'));
							}
						}
					}
					$(this).remove();
				}
			});
		}
	});
};