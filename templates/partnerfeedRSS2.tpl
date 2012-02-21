<?xml version="1.0" encoding="{@CHARSET}"?>
<rss version="2.0">
	<channel>
		<title>{lang}wcf.partnerlinkus.partner.feed.title{/lang}</title>
		<link>{@PAGE_URL}/index.php?page=Partner</link>
		<description>{lang}wcf.partnerlinkus.partner.feed.description{/lang}</description>
		<language></language>
		<copyright>{lang}{PAGE_TITLE}{/lang}</copyright>
		<pubDate>{@'r'|gmdate:TIME_NOW}</pubDate>
		<lastBuildDate>{@'r'|gmdate:TIME_NOW}</lastBuildDate>
		{if 'PARTNERLINKUS_BRANDINGFREE'|defined == false}<generator>{lang}wcf.global.page.partnerlinkus.partner.feed.copyright{/lang}</generator>{else}<generator>{lang}{PAGE_TITLE}{/lang}</generator>{/if}
		<ttl>60</ttl>

		{foreach from=$partneritem item=$item}
				<item>
				<title>{lang}{@$item.name}{/lang}</title>
				<author>{lang}{PAGE_TITLE}{/lang}</author>
				<link>{@$item.link}</link>
				<guid>{@$item.link}</guid>
				<pubDate>{@'r'|gmdate:$item.pubDate}</pubDate>
				<description><![CDATA[<a href="{@$item.link}"><img src="{@$item.image}"  alt="{lang}{@$item.name}{/lang}" title="{lang}{@$item.name}{/lang}" /></a><br />{@$item.description}]]></description>
			</item>
	{/foreach}</channel>            
</rss>