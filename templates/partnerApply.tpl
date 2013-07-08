{include file='documentHeader'}

<head>
	<title>{lang}wcf.simplePage.menu{/lang} - {PAGE_TITLE|language}</title>
	
	{include file='headInclude'}
	
	<link rel="canonical" href="{link controller='PartnerLinkUs'}{/link}" />
</head>

<body id="tpl{$templateName|ucfirst}">

{include file='header'}

<header class="boxHeadline">
	<h1>{lang}wcf.simplePage.menu{/lang}</h1>
	<p>{SIMPLE_PAGE_DESCRIPTION|language}</p>
</header>

{include file='userNotice'}

<div class="container containerPadding marginTop">
	<fieldset>
		{@$simplepage}
	
		{event name='additionalContents'}
	</fieldset>
</div>

{include file='footer'}

</body>
</html>
