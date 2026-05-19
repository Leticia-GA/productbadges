<div class="panel">
    <h3>Product Badges</h3>

    {foreach from=$badges item=badge}
        <label style="display:block; margin-bottom:5px;">
            <input type="checkbox"
                   name="badges[]"
                   value="{$badge.id_badge}"
                   {if in_array($badge.id_badge, $assigned)}checked{/if}>
            {$badge.bg_color} / {$badge.text_color} ({$badge.position})
        </label>
    {foreachelse}
        <p>No badges available. <a href="{$link->getAdminLink('AdminProductBadges')}">Create one</a>.</p>
    {/foreach}
</div>