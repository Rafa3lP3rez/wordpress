var spbtblNM={};!function(t){spbtblNM.func={updateRows:function(){dndi=0,dndj=-1,t("#spbtbl > thead  > tr > th").each(function(){t(this).find(".text_input").attr("name","colValues["+dndi+"]["+dndj+"]"),dndj++}),dndj=-1,t("#spbtbl > tbody  > tr").each(function(){t(this).find("td").each(function(){t(this).find(".text_input").attr("name","rowValues["+dndi+"]["+dndj+"]"),dndj++}),dndj=-1,dndi++})}}}(jQuery),jQuery(document).ready(function(t){function e(){t(".spbtbl_removeRow").off(),t(".spbtbl_removeRow").click(function(){var e=t(this).closest("tr");n("Remove Row","Are you sure you want to remove this row?","Remove","Cancel",function(){o("subtract","row"),t(e).remove(),spbtblNM.func.updateRows()})}),t(".spbtbl_removeCol").off(),t(".spbtbl_removeCol").click(function(){var e=t(this);n("Remove Column","Are you sure you want to remove this column?","Remove","Cancel",function(){o("subtract"),l(t(e).data("value"),"remove"),t(e).closest("th").remove(),spbtblNM.func.updateRows()})})}function l(e,l){var o=document.getElementById("spbtbl");if("remove"==l){for(i=1;i<o.rows.length;i++)o.rows[i].deleteCell(e);t(".spbtbl_removeCol").each(function(l,o){t(o).data("value")>e&&(t(o).data("value",l),o.setAttribute("data-value",l))})}else for(i=1;i<o.rows.length;i++)cell=o.rows[i].insertCell(e),cell.innerHTML="<textarea class='text_input' placeholder='"+defaultCellText+"' rows='1' data-min-rows='1' name='rowValues["+(i-1)+"]["+(e-1)+"]'></textarea>"}function o(e,l){var o=parseInt(t("#spbtbl_rowNum").attr("value")),n=parseInt(t("#spbtbl_colNum").attr("value"));"row"==l?"subtract"==e?t("#spbtbl_rowNum").val(o-1):t("#spbtbl_rowNum").val(o+1):"subtract"==e?t("#spbtbl_colNum").val(n-1):t("#spbtbl_colNum").val(n+1)}function n(e,l,o,n,s){var a="<div class='spbtbl_dialog-ovelay'><div class='spbtbl_dialog'><header> <h3> "+e+" </h3> <i class='spbtbl_fa spbtbl_fa-close'></i></header><div class='spbtbl_dialog-msg'> <p> "+l+" </p> </div><footer><div class='spbtbl_controls'> <button class='spbtbl_button spbtbl_button-danger doAction'>"+o+"</button>  <button class='spbtbl_button spbtbl_button-default cancelAction'>"+n+"</button> </div></footer></div></div>";t("#wpcontent").prepend(a),t(".doAction").click(function(){return t(this).parents(".spbtbl_dialog-ovelay").fadeOut(500,function(){t(this).remove()}),s(),!0}),t(".cancelAction, .fa-close").click(function(){return t(this).parents(".spbtbl_dialog-ovelay").fadeOut(500,function(){t(this).remove()}),!1})}t("#spbtbl").tableDnD(),e(),t("#spbtbl_addRow").click(function(){var l=document.getElementById("spbtbl"),n=parseInt(t("#spbtbl_colNum").attr("value")),s=parseInt(t("#spbtbl_rowNum").attr("value")),a=l.insertRow(s);for(a.insertCell(0).outerHTML="<td class='hidden_row'><input class='spbtbl_dragRow' style='cursor: move;' type='button' /><input class='spbtbl_removeRow' type='button' /></td>",i=1;i<n;i++)cell=a.insertCell(i),cell.innerHTML="<textarea class='text_input' placeholder='"+defaultCellText+"' rows='1' data-min-rows='1' name='rowValues["+(s-1)+"]["+(i-1)+"]'></textarea>";o("","row"),e()}),t("#spbtbl_addCol").click(function(){var n=document.getElementById("spbtbl"),s=parseInt(t("#spbtbl_colNum").attr("value"));n.rows[0].insertCell(-1).outerHTML="<th align='left'><input placeholder='"+defaultCellText+"' type='text' name='colValues[0]["+(s-1)+"]' class='text_input' value=''><input class='spbtbl_removeCol' type='button' data-value='"+s+"' /></th>",l(t("#spbtbl_colNum").attr("value"),""),o(),e()}),t("#colorSelect").change(function(){t("#spbtbl").removeClass().addClass("spbtbl-style backend spbtbl-color-"+this.value)}),t("#fontTHinput").change(function(){fontsize_th=this.value,t("#spbtbl > thead  > tr > th").each(function(){t(this).find("textarea").attr("style","font-size:"+fontsize_th+"px !important;")})}),t("#fontTDinput").change(function(){fontsize_td=this.value,t("#spbtbl > tbody  > tr > td").each(function(){t(this).find(".text_input").attr("style","font-size:"+fontsize_td+"px !important;")})}),void 0!==typeof colorScheme&&t("#colorSelect").val(colorScheme),void 0!==typeof tableStyle&&t("#styleSelect").val(tableStyle),void 0!==typeof fontsize_td&&(t("#fontTDinput").val(fontsize_td),t("#spbtbl > tbody  > tr > td").each(function(){t(this).find(".text_input").attr("style","font-size:"+fontsize_td+"px !important;")})),void 0!==typeof fontsize_th&&(t("#fontTHinput").val(fontsize_th),t("#spbtbl > thead  > tr > th").each(function(){t(this).find("textarea").attr("style","font-size:"+fontsize_th+"px !important;")})),void 0!==typeof floatmode&&t("#floatmodeSelect").val(floatmode),void 0!==typeof fullwidth&&t("#fullwidthSelect").val(fullwidth),void 0!==typeof disableschema&&t("#disableschemaSelect").val(disableschema),t(".spbtbl_btn.delete_btn").click(function(e){e.preventDefault();var l=t(this).attr("href");n("Delete Table","Are you sure you want to delete this table?","Delete","Cancel",function(){window.location.href=l})}),t(".spbtbl_shortcode").click(function(){this.setSelectionRange(0,this.value.length)}),t(".spbtbl_success").fadeOut(15e3,function(){t(this).remove()}),t("#spbtbl").on("focus.text_input","textarea.text_input",function(){var t=this.value;this.value="",this.baseScrollHeight=this.scrollHeight,this.value=t}),t("#spbtbl").on("input.text_input","textarea.text_input",function(){var t,e=0|this.getAttribute("data-min-rows");this.rows=e,t=Math.ceil((this.scrollHeight-this.baseScrollHeight)/16),this.rows=e+t})});