{include file='documentHeader'}

<head>
	<title>{lang}wcf.partnerlinkus.partner.title{/lang} - {PAGE_TITLE|language}</title>
	
	{include file='headInclude'}
	
	<link rel="canonical" href="{link controller='PartnerLinkUs'}{/link}" />
</head>

<body id="tpl{$templateName|ucfirst}">

{include file='header'}

<header class="boxHeadline">
	<h1>{lang}wcf.partnerlinkus.partner.title{/lang}</h1>
	<p>{lang}wcf.partnerlinkus.partner.description{/lang}</p>
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


	<div class="container containerPadding marginTop">
				<fieldset>
						<legend>WoltLab GmbH</legend>
					<div style="text-align: center;">
						<a href="https://community4wcf.de" class="externalURL" rel="nofollow"><img src="https://image.community4wcf.eu/partner/woltlab.gif"  alt="WoltLab GmbH" title="WoltLab GmbH" /></a>
							<div class="partnerlinkusdescription">WoltLab GmbH ist das Unternehmen, dass das Burning Board (kurz: WBB) und das Community Framework (kurz: WCF) und viele weitere Produkte entwickelt und verkauft.</div>
					</div>
										
					<footer class="messageOptions">
						<nav>
							<ul class="smallButtons buttonGroup">
								<li><a href="https://community4wcf.de" title="&quot;WoltLab GmbH&quot; besuchen" class="button externalURL" rel="nofollow"><span class="icon icon16 icon-globe"></span> <span>Partner besuchen</span></a></li>
								<li class="toTopLink"><a href="#top" class="button"><span class="icon icon16 icon-arrow-up"></span> <span class="invisible">{lang}wcf.global.scrollUp{/lang}</span></a></li>
							</ul>
						</nav>
					</footer>
				</fieldset>
				
				<fieldset>
						<legend>Community4WCF (C4W)</legend>
					<div style="text-align: center;">
						<a href="https://community4wcf.de" class="externalURL" style="" rel="nofollow"><img src="https://image.community4wcf.eu/partner/Community4WCFv2.jpg"  alt="Community4WCF (C4W)" title="Community4WCF (C4W)" /></a>
							<div class="partnerlinkusdescription">Die Community rund um das "WoltLab Community Framework" (WCF), dessen Endanwendungen (z.B. WBB) , Plugins und Support!</div>
					</div>
										
					<footer class="messageOptions">
						<nav>
							<ul class="smallButtons buttonGroup">
								<li><a href="https://community4wcf.de" title="&quot;Community4WCF (C4W)&quot; besuchen" class="button externalURL" rel="nofollow" style=""><span class="icon icon16 icon-globe"></span> <span>Partner besuchen</span></a></li>
								<li class="toTopLink"><a href="#top" class="button"><span class="icon icon16 icon-arrow-up"></span> <span class="invisible">{lang}wcf.global.scrollUp{/lang}</span></a></li>
							</ul>
						</nav>
					</footer>
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