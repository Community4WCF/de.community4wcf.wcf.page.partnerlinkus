{include file="documentHeader"}
<head>
	<title>{lang}wcf.partnerlinkus.partnerapply.title{/lang} - {lang}{PAGE_TITLE}{/lang}</title>
	{include file='headInclude' sandbox=false}
	{if $partnerlinkushead|isset}{@$partnerlinkushead}{/if}
	<script type="text/javascript" src="{@RELATIVE_WCF_DIR}js/TabMenu.class.js"></script>
</head>
<body{if $templateName|isset} id="tpl{$templateName|ucfirst}"{/if}>
{include file='header' sandbox=false}

<div id="main">
	<ul class="breadCrumbs">
		<li><a href="index.php?page=Index{@SID_ARG_2ND}"><img src="{icon}indexS.png{/icon}" alt="" /> <span>{lang}{PAGE_TITLE}{/lang}</span></a> &raquo;</li>
	</ul>

	<div class="mainHeadline">
		<img src="{icon}partnerAddL.png{/icon}" alt="" />
		<div class="headlineContainer">
			<h2>{lang}wcf.partnerlinkus.partnerapply.title{/lang}</h2>
			<p>{lang}wcf.partnerlinkus.partnerapply.description{/lang}</p>
		</div>
	</div>
	
	{if $userMessages|isset}{@$userMessages}{/if}
	
	<div class="tabMenu">
		{if MODULE_PARTNER && $this->user->getPermission('user.managepages.canViewPartner') || MODULE_LINKUS && $this->user->getPermission('user.managepages.canViewLinkUs') || $additionalTabsStart|isset || $additionalTabs|isset || $additionalTabsEnd|isset}
		<ul>
			{if $additionalTabsStart|isset}{@$additionalTabsStart}{/if}
			{if MODULE_PARTNER && $this->user->getPermission('user.managepages.canViewPartner')}
				<li><a href="index.php?page=Partner"><img src="{icon}partnerM.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.partner.title{/lang}</span></a></li>
			{/if}
			{if MODULE_PARTNER && $this->user->getPermission('user.managepages.canViewPartner') || MODULE_LINKUS && $this->user->getPermission('user.managepages.canViewLinkUs') || $additionalTabsStart|isset || $additionalTabs|isset || $additionalTabsEnd|isset}
				<li class="activeTabMenu"><a href="index.php?page=PartnerApply"><img src="{icon}partnerAddM.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.partnerapply.title{/lang}</span></a></li>
			{/if}
			{if $additionalTabs|isset}{@$additionalTabs}{/if}
			{if MODULE_LINKUS && $this->user->getPermission('user.managepages.canViewLinkUs')}
				<li><a href="index.php?page=LinkUs"><img src="{icon}linkusM.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.linkus.title{/lang}</span></a></li>
			{/if}
			{if $additionalTabsEnd|isset}{@$additionalTabsEnd}{/if}
		</ul>
		{/if}
	</div>
	<div class="subTabMenu">
		<div class="containerHead">
			{if $additionalsubTabs|isset}<ul>{@$additionalsubTabs}</ul>{/if}
		</div>
	</div>
	
	<div class="border content">
		<div class="container-1">
			<h3 class="subHeadline smallFont">{lang}wcf.partnerlinkus.partnerapply.description{/lang}</h3>
			<fieldset>
				<legend>{lang}{PARTNERAPPLY_TITLE}{/lang}</legend>
				{lang}{@$message}{/lang}
				{if $additionalFields1|isset}{@$additionalFields1}{/if}
				{if PARTNERAPPLY_ENABLE_SUPPORT || $additionalsmallButtons|isset}
					<div class="buttonBar">
						<div class="smallButtons">
							<ul>
								{if $additionalsmallButtons|isset}{@$additionalsmallButtons}{/if}
								{if PARTNERAPPLY_ENABLE_SUPPORT}
									<li><a href="{@PARTNERAPPLY_SUPPORT_LINK}"><img src="{icon}partnerAddS.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.partnerapply.apply{/lang}</span></a></li>
								{/if}
							</ul>
						</div>
					</div>
				{/if}
			</fieldset>
			{if $additionalFields2|isset}{@$additionalFields2}{/if}
			{if 'PARTNERLINKUS_BRANDINGFREE'|defined == false}
				<div style="text-align: center;">{lang}wcf.global.page.partnerlinkus.partner.copyright{/lang}</div>
			{/if}
		</div>
	</div>
</div>

{include file='footer' sandbox=false}
</body>
</html>