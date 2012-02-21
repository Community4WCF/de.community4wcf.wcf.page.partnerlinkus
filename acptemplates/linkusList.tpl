{include file='header'}
<script type="text/javascript" src="{@RELATIVE_WCF_DIR}js/MultiPagesLinks.class.js"></script>

<div class="mainHeadline">
	<img src="{@RELATIVE_WCF_DIR}icon/linkusListL.png" alt="" />
	<div class="headlineContainer">
		<h2>{lang}wcf.acp.menu.link.content.linkus.show{/lang}</h2>
		<p>{lang}wcf.acp.menu.link.content.linkus.show.description{/lang}</p>
	</div>
</div>

{if $deletedlinkusID}
	<p class="success">{lang}wcf.acp.partnerlinkus.linkus.delete.success{/lang}</p>	
{/if}

<div class="contentHeader">
	{pages print=true assign=pagesLinks link="index.php?page=LinkUsList&pageNo=%d&sortField=$sortField&sortOrder=$sortOrder&packageID="|concat:PACKAGE_ID:SID_ARG_2ND_NOT_ENCODED}
	
	{if $this->user->getPermission('admin.content.linkus.linkusadd')}
		<div class="largeButtons">
			<ul><li><a href="index.php?form=LinkUsAdd&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/linkusAddM.png" alt="" title="{lang}wcf.acp.menu.link.content.linkus.add{/lang}" /> <span>{lang}wcf.acp.menu.link.content.linkus.add{/lang}</span></a></li></ul>
		</div>
	{/if}
</div>

{if $linkusitem|count}
	<div class="border titleBarPanel">
		<div class="containerHead"><h3>{lang}wcf.acp.partnerlinkus.linkus.count{/lang}</h3></div>
	</div>
	<div class="border borderMarginRemove">
		<table class="tableList">
			<thead>
				<tr class="tableHead">
					<th class="columnlinkusID{if $sortField == 'linkusID'} active{/if}" colspan="2"><div><a href="index.php?page=LinkUsList&amp;pageNo={@$pageNo}&amp;sortField=linkusID&amp;sortOrder={if $sortField == 'linkusID' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.linkus.linkusID{/lang}{if $sortField == 'linkusID'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
					<th class="columnlinkusshowOrder{if $sortField == 'showOrder'} active{/if}"><div><a href="index.php?page=LinkUsList&amp;pageNo={@$pageNo}&amp;sortField=showOrder&amp;sortOrder={if $sortField == 'showOrder' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.linkus.showOrder{/lang}{if $sortField == 'showOrder'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
					<th class="columnlinkusname{if $sortField == 'name'} active{/if}"><div><a href="index.php?page=LinkUsList&amp;pageNo={@$pageNo}&amp;sortField=name&amp;sortOrder={if $sortField == 'name' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.linkus.name{/lang}{if $sortField == 'name'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
					<th class="columnlinkuspubDate{if $sortField == 'pubDate'} active{/if}"><div><a href="index.php?page=LinkUsList&amp;pageNo={@$pageNo}&amp;sortField=pubDate&amp;sortOrder={if $sortField == 'pubDate' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.linkus.pubDate{/lang}{if $sortField == 'sourceName'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
						
					{if $additionalColumns|isset}{@$additionalColumns}{/if}
				</tr>
			</thead>
			<tbody>
			{foreach from=$linkusitem item=item}
				<tr class="{cycle values="container-1,container-2"}">
					<td class="columnIcon">
						{if $this->user->getPermission('admin.content.linkus.linkusedit')}
							{if !$item.disabled}
								<a href="index.php?action=LinkUsDisable&amp;linkusID={@$item.linkusID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/enabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.disable{/lang}" /></a>
							{else}
								<a href="index.php?action=LinkUsEnable&amp;linkusID={@$item.linkusID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/disabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.enable{/lang}" /></a>
							{/if}
							
							<a href="index.php?form=LinkUsEdit&amp;linkusID={@$item.linkusID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/editS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.edit{/lang}" /></a>
						{else}
							{if !$item.disabled}
								<img src="{@RELATIVE_WCF_DIR}icon/enabledDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.disable{/lang}" />
							{else}
								<img src="{@RELATIVE_WCF_DIR}icon/disabledDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.enable{/lang}" />
							{/if}
							
							<img src="{@RELATIVE_WCF_DIR}icon/editDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.edit{/lang}" />
						{/if}
						{if $this->user->getPermission('admin.content.linkus.linkusdelete')}
							<a onclick="return confirm('{lang}wcf.acp.partnerlinkus.linkus.delete.sure{/lang}')" href="index.php?action=LinkUsDelete&amp;linkusID={@$item.linkusID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/deleteS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.delete{/lang}" /></a>
						{else}
							<img src="{@RELATIVE_WCF_DIR}icon/deleteDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.linkus.delete{/lang}" />
						{/if}
						
						{if $item.additionalButtons|isset}{@$item.additionalButtons}{/if}
					</td>
					<td class="columnlinkusID columnID">{@$item.linkusID}</td>
					<td class="columnlinkusshowOrder columnText">{@$item.showOrder}</td>
					<td class="columnlinkusname columnText">
						{if $this->user->getPermission('admin.content.linkus.linkusedit')}
							<a href="index.php?form=LinkUsEdit&amp;linkusID={@$item.linkusID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{$item.name}</a>
						{else}
							{$item.name}
						{/if}
					</td>
					<td class="columnlinkuspubDate columnText">{@$item.pubDate|time}</td>
					
					{if $item.additionalColumns|isset}{@$item.additionalColumns}{/if}
				</tr>
			{/foreach}
			</tbody>
		</table>
	</div>

	<div class="contentFooter">
		{@$pagesLinks}
		
	{if $this->user->getPermission('admin.content.linkus.linkusadd')}
		<div class="largeButtons">
			<ul><li><a href="index.php?form=LinkUsAdd&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/linkusAddM.png" alt="" title="{lang}wcf.acp.menu.link.content.linkus.add{/lang}" /> <span>{lang}wcf.acp.menu.link.content.linkus.add{/lang}</span></a></li></ul>
		</div>
	{/if}
	</div>
{/if}
{if 'PARTNERLINKUS_BRANDINGFREE'|defined == false}
	<div> 
		<div>
			<div style="text-align: center;">{lang}wcf.global.page.partnerlinkus.linkus.copyright{/lang}</div>
		</div>
	</div>
{/if}

{include file='footer'}