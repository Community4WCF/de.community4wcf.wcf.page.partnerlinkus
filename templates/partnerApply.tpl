{include file='documentHeader'}

<head>
	<title>{lang}wcf.partnerlinkus.partner.title{/lang} - {PAGE_TITLE|language}</title>
	
	{include file='headInclude'}
	
	<link rel="canonical" href="{link controller='PartnerLinkUs'}{/link}" />
</head>

<body id="tpl{$templateName|ucfirst}">

{include file='header'}

<header class="boxHeadline">
	<h1>{lang}wcf.partnerlinkus.partnerapply.title{/lang}</h1>
	<p>{lang}wcf.partnerlinkus.partnerapply.description{/lang}</p>
</header>

{include file='userNotice'}

<div class="container containerPadding marginTop">
	<fieldset>
		{@$partnerapply}
	
		{event name='additionalContents'}
	</fieldset>
</div>

{include file='footer'}

</body>
</html>
