{*popup_item*}
<p class="prText2">{t}Creates a new Venue with the same details.  You must re-name the venue.{/t}</p>
<label for="venue_copy" class="prInnerRight">{t}New Name:{/t}</label>
<input type="text" name="venue_copy" id="venue_copy" value="{$venue->getName()} Copy" class="prLargeFormItem">
<div class="prInnerTop prTCenter">
{if $venue->getType() == 'worldwide'}
    <span class="prIndentLeftSmall">{t var="in_button"}Copy Venue{/t}{linkbutton name=$in_button onclick="xajax_copyVenueDo("|cat:$venue->getId()|cat:",document.getElementById('venue_copy').value, 'worldwide'); return false;"}</span>
{else}
     <span class="prIndentLeftSmall">{t var="in_button_2"}Copy Venue{/t}{linkbutton name=$in_button_2 onclick="xajax_copyVenueDo("|cat:$venue->getId()|cat:",document.getElementById('venue_copy').value, 'simple'); return false;"}</span>
{/if}
 <span class="prIEVerticalAling">{t}or{/t} <a href="#" onclick="popup_window.close(); return false;">{t}Cancel{/t}</a></span>
</div>
{*popup_item*}