<div class="form-group">
    <label for="file_{$name}">{$label}</label>
    <input type="text" name="{$name}" id="file_{$id}" class="form-control" value="{$value}">
</div>
<div class="form-group" id="__imgPrev_{$id}">
    {if isset($value) && $isImg}
        <img src="/resources/{$value}" alt="{$name}" style="max-width: 300px; max-height: 300px">
    {/if}
</div>
<div class="form-group">
    <input type="button" class="_select_file {$btnClass}" value="{$btnValue}" data-name="{$id}">
</div>