$(function(){
    MGListApplication.init();
})

var MGListApplication = null;
if ( !MGListApplication ) {
	MGListApplication = function () {
		return {
			init : function () {
				$('#checkAll').bind('click', function(event) { MGListApplication.onCheckAll(); return false; });
				$('#checkNone').bind('click', function(event) { MGListApplication.onCheckNone(); return false; });
				$('#lnkOnDeleteChecked').bind('click', function(event) { MGListApplication.onDeleteChecked(); return false; });								
			},
			showInfo : function (message) {
                document.getElementById("infoPanelContent").innerHTML = message;
                popup_window.target('infoPanel'); popup_window.title("Information");
                popup_window.width(350); popup_window.height(80);
                popup_window.open();
			},
            /* check if at least one item is choosed  */
            isAnyItemChecked : function() {
                if ( 0 != $('.item-checkbox:checked').size() ) return true;
                else return false;
            },
            /* check if one ite m is choosed only*/
            isOneItemChecked : function() {
                if ( 1 == $('.item-checkbox:checked').size() ) return true;
                else return false;
            },
            getCheckedAsString : function() {
                var strOut = [];
                $('.item-checkbox:checked').each(function(){
                    strOut[strOut.length] = $(this).val();
                })
                return strOut.join(',');
            },
            onDeleteChecked : function () {
            	if ( MGListApplication.isAnyItemChecked() ) {
                    popup_window.target('confirmDeletePanel');
                    popup_window.width(350); popup_window.height(80);
                    popup_window.open();
                    
                    $('#btnConfirmDeleteFormSubmit').unbind().bind('click', function() {
                    	$.post(cfgMGListApplication.urlOnDeleteChecked, 
                    		{ajax_mode: 'delete', groups: MGListApplication.getCheckedAsString()},
                    		function (data) {
                    			xajax.processResponse(data);
                    	},'xml');
                    })
            	} else { MGListApplication.showInfo('You must choose at least one item'); return; }
            },
            /* choose all items */
			onCheckAll : function () {
                $('.item-checkbox').each(function(){
                    $(this).attr('checked', true);
                })
			},
            /* deselect all items */
			onCheckNone : function () {
                $('.item-checkbox').each(function(){
                    $(this).attr('checked', false);
                })
			}
		}
	}();
};