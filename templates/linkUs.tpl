{include file='documentHeader'}

<head>
	<title>{lang}wcf.partnerlinkus.linkus.title{/lang} - {PAGE_TITLE|language}</title>
	
	{include file='headInclude'}
	
	<link rel="canonical" href="{link controller='PartnerLinkUs'}{/link}" />
</head>

<body id="tpl{$templateName|ucfirst}">

{include file='header'}

<header class="boxHeadline">
	<h1>{lang}wcf.partnerlinkus.linkus.title{/lang}</h1>
	<p>{lang}wcf.partnerlinkus.linkus.description{/lang}</p>
</header>

{include file='userNotice'}

<div class="contentNavigation">
	{hascontent}
		<nav>
			<ul>
				{content}
					{event name='contentNavigationButtonsTop'}
				{/content}
			</ul>
		</nav>
	{/hascontent}
</div>


	<div class="container marginTop">
				<fieldset>
					No Content!
				</fieldset>
	</div>


<div class="contentNavigation">
	{hascontent}
		<nav>
			<ul>
				{content}
					{event name='contentNavigationButtonsBottom'}
				{/content}
			</ul>
		</nav>
	{/hascontent}
</div>

{include file='footer'}

</body>
</html>