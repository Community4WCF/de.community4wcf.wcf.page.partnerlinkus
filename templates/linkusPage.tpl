{include file="documentHeader"}
<head>
	<title>{lang}wcf.partnerlinkus.linkus.title{/lang} - {lang}{PAGE_TITLE}{/lang}</title>
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
		<img src="{icon}linkusL.png{/icon}" alt="" />
		<div class="headlineContainer">
			<h2>{lang}wcf.partnerlinkus.linkus.title{/lang}</h2>
			<p>{lang}wcf.partnerlinkus.linkus.description{/lang}</p>
		</div>
	</div>
	
	{if $userMessages|isset}{@$userMessages}{/if}
	
	<div class="tabMenu">
		{if MODULE_PARTNER && $this->user->getPermission('user.managepages.canViewPartner') || $additionalTabsStart|isset || $additionalTabs|isset || $additionalTabsEnd|isset}
		<ul>
			{if $additionalTabsStart|isset}{@$additionalTabsStart}{/if}
			{if MODULE_PARTNER && $this->user->getPermission('user.managepages.canViewPartner')}
				<li><a href="index.php?page=Partner"><img src="{icon}partnerM.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.partner.title{/lang}</span></a></li>
			{/if}
			{if $additionalTabs|isset}{@$additionalTabs}{/if}
			{if MODULE_PARTNER && $this->user->getPermission('user.managepages.canViewPartner') || $additionalTabsStart|isset || $additionalTabs|isset || $additionalTabsEnd|isset}
				<li class="activeTabMenu"><a href="index.php?page=LinkUs"><img src="{icon}linkusM.png{/icon}" alt="" /> <span>{lang}wcf.partnerlinkus.linkus.title{/lang}</span></a></li>
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
			<h3 class="subHeadline smallFont">{lang}wcf.partnerlinkus.linkus.count{/lang}</h3>
			{foreach from=$linkusitem item=$item}
				<fieldset>
					<legend>{lang}{@$item.name}{/lang}</legend>
					<div style="text-align: center;">
						<img src="{@$item.image}"  alt="{lang}{@$item.name}{/lang}" title="{lang}{@$item.name}{/lang}" />
						{if $item.description}
							<div class="partnerlinkusdescription">{lang}{@$item.description}{/lang}</div>
						{/if}
						{if $additionalFields1|isset}{@$additionalFields1}{/if}
					</div>

					{if $additionalFields2|isset}{@$additionalFields2}{/if}
					<div class="formElement">
						<div class="formFieldLabel">{lang}wcf.partnerlinkus.linkus.xhtmlcode{/lang}</div>
						<div class="formField">
							<input type="text" class="inputText" onfocus="this.select();" readonly="readonly" value="&lt;a href=&quot;{@$item.link}&quot;&gt;&lt;img src=&quot;{@$item.image}&quot;  alt=&quot;{lang}{@$item.name}{/lang}&quot; title=&quot;{lang}{@$item.name}{/lang}&quot; /&gt;&lt;/a&gt;" />
						</div>
					</div>
					<div class="formElement">
						<div class="formFieldLabel">{lang}wcf.partnerlinkus.linkus.htmlcode{/lang}</div>
						<div class="formField">
							<input type="text" class="inputText" onfocus="this.select();" readonly="readonly" value="&lt;a href=&quot;{@$item.link}&quot;&gt;&lt;img src=&quot;{@$item.image}&quot; alt=&quot;{lang}{@$item.name}{/lang}&quot; /&gt;&lt;/a&gt;" />
						</div>
					</div>
					<div class="formElement">
						<div class="formFieldLabel">{lang}wcf.partnerlinkus.linkus.bbcode{/lang}</div>
						<div class="formField">
							<input type="text" class="inputText" onfocus="this.select();" readonly="readonly" value="[url='{@$item.link}'][img]{@$item.image}[/img][/url]" />
						</div>
					</div>
					{if $additionalFields3|isset}{@$additionalFields3}{/if}
					{if LINKUS_BUTTON_TOP || $additionalsmallButtons|isset}
					<div class="buttonBar">
						<div class="smallButtons">
							<ul>
								{if LINKUS_BUTTON_TOP}
									<li class="last extraButton"><a href="#top" title="{lang}wcf.global.scrollUp{/lang}"><img src="{icon}upS.png{/icon}" alt="{lang}wcf.global.scrollUp{/lang}" /> <span class="hidden">{lang}wcf.global.scrollUp{/lang}</span></a></li>
								{/if}
								{if $additionalsmallButtons|isset}{@$additionalsmallButtons}{/if}
							</ul>
						</div>
					</div>
					{/if}
				</fieldset>
			{/foreach}
			{if 'PARTNERLINKUS_BRANDINGFREE'|defined == false}
				<div style="text-align: center;">{lang}wcf.global.page.partnerlinkus.linkus.copyright{/lang}</div>
			{/if}
		</div>
	</div>
</div>

{include file='footer' sandbox=false}
</body>
</html>