{include file='header'}
<script type="text/javascript" src="{@RELATIVE_WCF_DIR}js/MultiPagesLinks.class.js"></script>

<div class="mainHeadline">
	<img src="{@RELATIVE_WCF_DIR}icon/partnerListL.png" alt="" />
	<div class="headlineContainer">
		<h2>{lang}wcf.acp.menu.link.content.partner.show{/lang}</h2>
		<p>{lang}wcf.acp.menu.link.content.partner.show.description{/lang}</p>
	</div>
</div>

{if $deletedpartnerID}
	<p class="success">{lang}wcf.acp.partnerlinkus.partner.delete.success{/lang}</p>	
{/if}

<div class="contentHeader">
	{pages print=true assign=pagesLinks link="index.php?page=PartnerList&pageNo=%d&sortField=$sortField&sortOrder=$sortOrder&packageID="|concat:PACKAGE_ID:SID_ARG_2ND_NOT_ENCODED}
	
	{if $this->user->getPermission('admin.content.partner.partneradd')}
		<div class="largeButtons">
			<ul><li><a href="index.php?form=PartnerAdd&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/partnerAddM.png" alt="" title="{lang}wcf.acp.menu.link.content.partner.add{/lang}" /> <span>{lang}wcf.acp.menu.link.content.partner.add{/lang}</span></a></li></ul>
		</div>
	{/if}
</div>

{if $partneritem|count}
	<div class="border titleBarPanel">
		<div class="containerHead"><h3>{lang}wcf.acp.partnerlinkus.partner.count{/lang}</h3></div>
	</div>
	<div class="border borderMarginRemove">
		<table class="tableList">
			<thead>
				<tr class="tableHead">
					<th class="columnpartnerID{if $sortField == 'partnerID'} active{/if}" colspan="2"><div><a href="index.php?page=PartnerList&amp;pageNo={@$pageNo}&amp;sortField=partnerID&amp;sortOrder={if $sortField == 'partnerID' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.partner.partnerID{/lang}{if $sortField == 'partnerID'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
					<th class="columnpartnershowOrder{if $sortField == 'showOrder'} active{/if}"><div><a href="index.php?page=PartnerList&amp;pageNo={@$pageNo}&amp;sortField=showOrder&amp;sortOrder={if $sortField == 'showOrder' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.partner.showOrder{/lang}{if $sortField == 'title'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
					<th class="columnpartnername{if $sortField == 'name'} active{/if}"><div><a href="index.php?page=PartnerList&amp;pageNo={@$pageNo}&amp;sortField=name&amp;sortOrder={if $sortField == 'name' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.partner.name{/lang}{if $sortField == 'name'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
					<th class="columnpartnerpubDate{if $sortField == 'pubDate'} active{/if}"><div><a href="index.php?page=PartnerList&amp;pageNo={@$pageNo}&amp;sortField=pubDate&amp;sortOrder={if $sortField == 'pubDate' && $sortOrder == 'ASC'}DESC{else}ASC{/if}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{lang}wcf.acp.partnerlinkus.partner.pubDate{/lang}{if $sortField == 'sourceName'} <img src="{@RELATIVE_WCF_DIR}icon/sort{@$sortOrder}S.png" alt="" />{/if}</a></div></th>
						
					{if $additionalColumns|isset}{@$additionalColumns}{/if}
				</tr>
			</thead>
			<tbody>
			{foreach from=$partneritem item=item}
				<tr class="{cycle values="container-1,container-2"}">
					<td class="columnIcon">
						{if $this->user->getPermission('admin.content.partner.partneredit')}
							{if !$item.disabled}
								<a href="index.php?action=PartnerDisable&amp;partnerID={@$item.partnerID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/enabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.disable{/lang}" /></a>
							{else}
								<a href="index.php?action=PartnerEnable&amp;partnerID={@$item.partnerID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/disabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.enable{/lang}" /></a>
							{/if}
							
							<a href="index.php?form=PartnerEdit&amp;partnerID={@$item.partnerID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/editS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.edit{/lang}" /></a>
						{else}
							{if !$item.disabled}
								<img src="{@RELATIVE_WCF_DIR}icon/enabledDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.disable{/lang}" />
							{else}
								<img src="{@RELATIVE_WCF_DIR}icon/disabledDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.enable{/lang}" />
							{/if}
							
							<img src="{@RELATIVE_WCF_DIR}icon/editDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.edit{/lang}" />
						{/if}
						{if $this->user->getPermission('admin.content.partner.partnerdelete')}
							<a onclick="return confirm('{lang}wcf.acp.partnerlinkus.partner.delete.sure{/lang}')" href="index.php?action=PartnerDelete&amp;partnerID={@$item.partnerID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/deleteS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.delete{/lang}" /></a>
						{else}
							<img src="{@RELATIVE_WCF_DIR}icon/deleteDisabledS.png" alt="" title="{lang}wcf.acp.partnerlinkus.partner.delete{/lang}" />
						{/if}
						
						{if $item.additionalButtons|isset}{@$item.additionalButtons}{/if}
					</td>
					<td class="columnpartnerID columnID">{@$item.partnerID}</td>
					<td class="columnpartnershowOrder columnText">{@$item.showOrder}</td>
					<td class="columnpartnername columnText">
						{if $this->user->getPermission('admin.content.partner.partneredit')}
							<a href="index.php?form=PartnerEdit&amp;partnerID={@$item.partnerID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}">{$item.name}</a>
						{else}
							{$item.name}
						{/if}
					</td>
					<td class="columnpartnerpubDate columnText">{@$item.pubDate|time}</td>
					
					{if $item.additionalColumns|isset}{@$item.additionalColumns}{/if}
				</tr>
			{/foreach}
			</tbody>
		</table>
	</div>

	<div class="contentFooter">
		{@$pagesLinks}
		
	{if $this->user->getPermission('admin.content.partner.partneradd')}
		<div class="largeButtons">
			<ul><li><a href="index.php?form=PartnerAdd&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/partnerAddM.png" alt="" title="{lang}wcf.acp.menu.link.content.partner.add{/lang}" /> <span>{lang}wcf.acp.menu.link.content.partner.add{/lang}</span></a></li></ul>
		</div>
	{/if}
	</div>
{/if}
{if 'PARTNERLINKUS_BRANDINGFREE'|defined == false}
	<div> 
		<div>
			<div style="text-align: center;">{lang}wcf.global.page.partnerlinkus.partner.copyright{/lang}</div>
		</div>
	</div>
{/if}

{include file='footer'}