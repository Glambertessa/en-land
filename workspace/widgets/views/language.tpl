<label>Choose the language:</label>
<select>
        {foreach from=$languages item=language}
        <option>{$language->name}</option>
        {/foreach}
</select>