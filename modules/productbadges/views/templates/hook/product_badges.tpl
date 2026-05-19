{if $badges}

<div class="product-badges">

    {foreach from=$badges item=badge}

        <span class="product-badge"
              style="
                background: {$badge.bg_color|escape:'html':'UTF-8'};
                color: {$badge.text_color|escape:'html':'UTF-8'};
              ">
            Badge #{$badge.id_badge|intval}
        </span>

    {/foreach}

</div>

{/if}