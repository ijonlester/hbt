$(document).ready(function() {
    $.datepicker.setDefaults({
        showOn: "focus",
        dateFormat: "yy-mm-dd",
    });
	
	var autocompleteDefaults = {
    	minLength: 0,
        source: function(req, responseFn) {
            var cats = Array();
            var currentCat = '';
            for (x=0; x<categories.length; x++) {
                var cat = categories[x]['category'];
                if (cat != currentCat) {
                    var reg = new RegExp(req.term, 'gi');
                    if (cat.match(reg) != null) {
                        cats.push(cat);
                    }
                    currentCat = cat;
                }
            }
            cats.sort();
            responseFn(cats);   
        },
        select: function(event, ui) {
            var type = $(this).parents('tr').find('input.autocomplete.type');
            $(type).val('');
        },
    };
	
	var typecompleteDefaults = {
    	minLength: 0,
        source: categories,
        select: function(event, ui) {
            var cat = $(this).parents('tr').find('input.autocomplete.category');
            if ($(cat).val() == '') {
                $(cat).val(ui.item.category);
            }
        },
    };
    
    $('.datepicker').datepicker();
	
	$('#entry-form').dialog({
		autoOpen: false,
		width: 700,
		height: 350,
		modal: true,
		buttons: {
			Save: function() {
				$.ajax({
					url: '/web/app.php/create',
					type: 'POST',
					data: $('div.entry-form form').serialize(),
					dataType: 'json',
				}).done(function(data, status, xhr) {
					location.reload(true);
				}).error(function(xhr, status) {
					$('body > div.error').html(xhr.responseText);
				});
			return false;
			},
			Cancel: function() {
                $(this).find('.new-entry-row-remove').parents('tr').remove();
                $(this).find('input[type=text]').val('');
				$(this).dialog('close');
			}
		}
	});
	
	$('.new-entry-row-add').click(function() {
		var targetSrc = $(this).parents('tr');
		var targetTr = $(targetSrc).clone(false);
        $(targetTr).find('input[type=text]').val('');		
		$('#entry-form form table').append(targetTr);
		$(targetTr).find('.datepicker').removeClass('hasDatepicker').attr('id', '').datepicker();
		$(targetTr).find('.category').autocomplete(autocompleteDefaults).focus(function() {
            $(this).autocomplete('search');
        });
		$(targetTr).find('.type').typecomplete(typecompleteDefaults).focus(function() {
            $(this).typecomplete('search');
        });
		$(targetTr).find('.new-entry-row-add').replaceWith(buildEntryRowButton('add'));
		$(targetSrc).find('.new-entry-row-add').replaceWith(buildEntryRowButton('remove'));
	});
    
    $('.entry-form-cancel').click(function() {
        $(this).parents('form').find('input[type=text]').val('');
        return false;
    });
    
    /** Build a custom autocomplete widget to get the dropdown we want **/
    $.widget("custom.typecomplete", $.ui.autocomplete, {
        _renderMenu: function( ul, items ) {
            var that = this;
            var currentCategory = function(that) {
                var form = $(that.element).parents('tr');
                return $(form).find('input.autocomplete.category').val();
            };
            currentCategory = currentCategory(that);
            if (currentCategory == '') {
                $.each( items, function(index, item) {
                    if (item.category != currentCategory) {
                        ul.append("<li class='ui-autocomplete-category'>"+item.category+"</li>");
                        currentCategory = item.category;
                    }
                    that._renderItemData(ul, item);
                });
            } else {
                ul.append("<li class='ui-autocomplete-category'>"+currentCategory+"</li>");
                $.each( items, function(index, item) {
                    if (String(item.category).toLowerCase() == String(currentCategory).toLowerCase()) {
                        that._renderItemData(ul, item);
                    }
                });
            }
        }
    });
    
    $('.autocomplete.category').autocomplete(autocompleteDefaults).focus(function() {
        $(this).autocomplete('search');
    });
    $('.autocomplete.type').typecomplete(typecompleteDefaults).focus(function() {
        $(this).typecomplete('search');
    });
    
    /** Add Entry click event handler **/
    $('#add-entry-button').click(function() {		
		$('#entry-form').dialog("open");
    });
    
    $('.entry-row').hover(function() {
        $(this).find('.entry-row-delete').show();
    }, function() {
        $(this).find('.entry-row-delete').hide();
    });
    
    $('.entry-row-delete').click(function() {
        var id = $(this).attr('entryId');
        if (confirm('Are you sure you want to delete this entry?')) {
            $.ajax({
                url: '/web/app.php/delete/'+id,
                type: 'GET',
                dataType: 'json',
                obj: this,
            }).done(function(data, status, xhr) {
                if (data == true) {
                    location.reload(true);
                }
            }).error(function(xhr, status) {
                $('body > div.error').html(xhr.responseText);
            });
        }
    });
    
    $('#entry-filter').change(function() {
        var filter = $(this).val();
        if (filter == "custom") {
            $('#entry-filter-custom').css('display', 'inline-block');
            $('#entry-filter-custom-start').focus();
        } else {
            $('#entry-filter-custom').css('display', 'none');
            location.assign('/web/app.php/'+filter);
        }
    });
    
    $('#entry-filter-custom-button').click(function() {
        var start = $('#entry-filter-custom-start').val();
        var end = $('#entry-filter-custom-end').val();
        var loc = '/web/app.php/';
        start = (start == '' && end != '') ? end : start;
        if (end == '') {
            loc += start;
        } else {
            loc += start+'/'+end;
        }
        location.assign(loc);
    });
    
    $('#main-inner-body-togglereport').click(function() {
        if ($('#main-inner-body-chart-block').is(':visible')) {
            $('#main-inner-body-chart-block').hide();
        } else {
            $('#main-inner-body-chart-block').show();
            if ($('#main-inner-body-chart').html() == '') {
                initializeChart();
            }
        }
	});

	function buildEntryRowButton(type) {
		var img = $('<img>').attr({'width':22, 'height':22});
		switch (type) {
			case 'add':
				$(img).attr({'src':'/web/bundles/llhbt/images/icon-add-entry.png', 'alt':'Add Row'}).addClass('new-entry-row-add').click(function() {
					var targetSrc = $(this).parents('tr');
					var targetTr = $(targetSrc).clone(false);	
                    $(targetTr).find('input[type=text]').val('');	
					$('#entry-form form table').append(targetTr);
					$(targetTr).find('.datepicker').removeClass('hasDatepicker').attr('id', '').datepicker();
					$(targetTr).find('.category').autocomplete(autocompleteDefaults).focus(function() {
                        $(this).autocomplete('search');
                    });
					$(targetTr).find('.type').typecomplete(typecompleteDefaults).focus(function() {
                        $(this).typecomplete('search');
                    });
					$(targetTr).find('.new-entry-row-add').replaceWith(buildEntryRowButton('add'));
					$(targetSrc).find('.new-entry-row-add').replaceWith(buildEntryRowButton('remove'));
				});
				break;
			case 'remove':
				$(img).attr({'src':'/web/bundles/llhbt/images/icon-remove-entry.png', 'alt':'Remove Row'}).addClass('new-entry-row-remove').click(function() {
					$(this).parents('tr').remove();
				});
				break;
		}
		return img;
	}
});