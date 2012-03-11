{include file="documentHeader"}
<head>
	<title>{lang}wcf.partnerlinkus.partner.title{/lang} - {lang}{PAGE_TITLE}{/lang}</title>
	{include file='headInclude' sandbox=false}
	<link rel="alternate" type="application/rss+xml" href="index.php?page=PartnerFeed&amp;format=rss2" title="{lang}wcf.partnerlinkus.partner.feed{/lang} (RSS2)" />
	<link rel="alternate" type="application/atom+xml" href="index.php?page=PartnerFeed&amp;format=atom" title="{lang}wcf.partnerlinkus.partner.feed{/lang} (Atom)" />
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
		<img src="{icon}partnerL.png{/icon}" alt="" />
		<div class="headlineContainer">
			<h2>{lang}wcf.partnerlinkus.partner.title{/lang}</h2>
			<p>{lang}wcf.partnerlinkus.partner.description{/lang}</p>
		</div>
	</div>
	
	{if $userMessages|isset}{@$userMessages}{/if}
	
	<div class="tabMenu">
		{if MODULE_LINKUS && $this->user->getPermission('user.managepages.canViewLinkUs') || $additionalTabsStart|isset || $additionalTabs|isset || $additionalTabsEnd|isset}
		<ul>
			{if $additionalTabsStart|isset}{@$additionalTabsStart}{/if}
			{if MODULE_LINKUS && $this->user->getPermission('user.managepages.canViewLinkUs') || $additionalTabsStart|isset || $additionalTabs|isset || $additionalTabsEnd|isset}
				<li class="activeTabMenu"><a href="index.php?page=Partner"><img src="{icon}partnerM.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.partner.title{/lang}</span></a></li>
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
			<h3 class="subHeadline smallFont">{lang}wcf.partnerlinkus.partner.count{/lang}</h3>
			{foreach from=$partneritem item=$item}
				<fieldset>
					{if PARTNER_BUTTON_VISIT}
						<legend>{lang}{@$item.name}{/lang}</legend>
					{else}
						<legend><a href="{@$item.link}" class="externalURL" style="background-image:none;">{lang}{@$item.name}{/lang}</a></legend>
					{/if}
					<div style="text-align: center;">
						<a href="{@$item.link}" class="externalURL" style="background-image:none;"><img src="{@$item.image}"  alt="{lang}{@$item.name}{/lang}" title="{lang}{@$item.name}{/lang}" /></a>
						{if $item.description}
							<div class="partnerlinkusdescription">{lang}{@$item.description}{/lang}</div>
						{/if}
						{if $additionalFields1|isset}{@$additionalFields1}{/if}
					</div>
					{if PARTNER_BUTTON_TOP || PARTNER_BUTTON_VISIT || $additionalsmallButtons|isset}
					<div class="buttonBar">
						<div class="smallButtons">
							<ul>
								{if PARTNER_BUTTON_TOP}
									<li class="last extraButton"><a href="#top" title="{lang}wcf.global.scrollUp{/lang}"><img src="{icon}upS.png{/icon}" alt="{lang}wcf.global.scrollUp{/lang}" /> <span class="hidden">{lang}wcf.global.scrollUp{/lang}</span></a></li>
								{/if}
								{if $additionalsmallButtons|isset}{@$additionalsmallButtons}{/if}
								{if PARTNER_BUTTON_VISIT}
									<li><a href="{@$item.link}" class="externalURL" style="background-image:none;"><img src="{icon}partnerS.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.partner.visit{/lang}</span></a></li>
								{/if}
							</ul>
						</div>
					</div>
					{/if}
				</fieldset>
			{/foreach}
			{if 'PARTNERLINKUS_BRANDINGFREE'|defined == false}
				<div style="text-align: center;">{lang}wcf.global.page.partnerlinkus.partner.copyright{/lang}</div>
			{/if}
		</div>
	</div>
</div>

{include file='footer' sandbox=false}
</body>
</html>