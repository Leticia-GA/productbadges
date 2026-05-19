<div class="panel">
    <h3>{l s='Product Badges' mod='productbadges'}</h3>

    {if $badges|count}

        {foreach from=$badges item=badge}

            <div class="checkbox">
                <label>

                    <input type="checkbox"
                           name="productbadges[]"
                           value="{$badge.id_badge|intval}"

                   {if isset($assigned[$badge.id_badge|intval])}
                       checked="checked"
                   {/if}
                    >

                    <span style="
                        background: {$badge.bg_color|escape:'html':'UTF-8'};
                        color: {$badge.text_color|escape:'html':'UTF-8'};
                        padding: 3px 8px;
                        border-radius: 4px;
                        display:inline-block;
                    ">
                        {$badge.text|escape:'html':'UTF-8'}
                    </span>

                </label>
            </div>

        {/foreach}

    {else}

        <p>{l s='No badges available.' mod='productbadges'}</p>

    {/if}
</div>