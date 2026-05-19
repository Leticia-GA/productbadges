<div class="product-badges">
    {foreach from=$badges item=badge}
        <span class="product-badge product-badge-{$badge.position|escape:'html':'UTF-8'}"
              style="background: {$badge.bg_color|escape:'html':'UTF-8'}; color: {$badge.text_color|escape:'html':'UTF-8'};">
            {$badge.text|escape:'html':'UTF-8'}
        </span>
    {/foreach}
</div>
