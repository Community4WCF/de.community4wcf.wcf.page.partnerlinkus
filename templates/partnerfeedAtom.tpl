<?xml version="1.0" encoding="{@CHARSET}"?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<title>{lang}wcf.partnerlinkus.partner.feed.title{/lang}</title>
	<id>{@PAGE_URL}/index.php?page=Partner</id>
	<updated>{@'c'|gmdate:TIME_NOW}</updated>
	<link href="{@PAGE_URL}" />
	{if 'PARTNERLINKUS_BRANDINGFREE'|defined == false}<generator url="http://www.community4wcf.de/">{lang}wcf.global.page.partnerlinkus.partner.feed.copyright{/lang}</generator>{else}<generator url="{@PAGE_URL}/index.php?page=Partner">{lang}{PAGE_TITLE}{/lang}</generator>{/if}
	<subtitle>{lang}wcf.partnerlinkus.partner.feed.description{/lang}</subtitle>
	
	{foreach from=$partneritem item=$item}
		<entry>
			<title>{lang}{@$item.name}{/lang}</title>
			<id>{@$item.link}</id>
			<updated>{@'c'|gmdate:$item.pubDate}</updated>
			<author>
				<name>{lang}{PAGE_TITLE}{/lang}</name>
			</author>
			<content type="html"><![CDATA[<a href="{@$item.link}"><img src="{@$item.image}"  alt="{lang}{@$item.name}{/lang}" title="{lang}{@$item.name}{/lang}" /></a><br />{@$item.description}]]></content>
			<link href="{@$item.link}" />
		</entry>
	{/foreach}
</feed>