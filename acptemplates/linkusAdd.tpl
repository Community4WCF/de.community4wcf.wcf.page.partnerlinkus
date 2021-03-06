{include file='header'}
<script type="text/javascript" src="{@RELATIVE_WCF_DIR}js/Suggestion.class.js"></script>

<div class="mainHeadline">
	<img src="{@RELATIVE_WCF_DIR}icon/linkus{@$action|ucfirst}L.png" alt="" />
	<div class="headlineContainer">
		<h2>{lang}wcf.acp.menu.link.content.linkus.{@$action}{/lang}</h2>
		<p>{lang}wcf.acp.menu.link.content.linkus.{@$action}.description{/lang}</p>
	</div>
</div>

{if $errorField}
	<p class="error">{lang}wcf.global.form.error{/lang}</p>
{/if}

{if $success|isset}
	<p class="success">{lang}wcf.acp.partnerlinkus.linkus.{@$action}.success{/lang}</p>	
{/if}

<div class="contentHeader">
	<div class="largeButtons">
		<ul><li><a href="index.php?page=LinkUsList&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/linkusM.png" alt="" title="{lang}wcf.acp.menu.link.content.linkus.show{/lang}" /> <span>{lang}wcf.acp.menu.link.content.linkus.show{/lang}</span></a></li></ul>
	</div>
</div>
<form method="post" action="index.php?form=LinkUs{@$action|ucfirst}">
	<div class="border content">
		<div class="container-1">      
            <fieldset>
				<legend>{lang}wcf.acp.partnerlinkus.linkus.item{/lang}</legend>
					
					<div class="formElement{if $errorField == 'name'} formError{/if}">
						<div class="formFieldLabel">
							<label for="name">{lang}wcf.acp.partnerlinkus.linkus.name{/lang}</label>
						</div>
						<div class="formField">
							<input type="text" class="inputText" id="name" name="name" value="{$name}" />
							{if $errorField == 'name'}
								<p class="innerError">
									{if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
								</p>
							{/if}
						</div>
						<div class="formFieldDesc hidden" id="nameHelpMessage">
							{lang}wcf.acp.partnerlinkus.linkus.name.description{/lang}
						</div>
						<script type="text/javascript">//<![CDATA[
							inlineHelp.register('name');
						//]]></script>
					</div>
					<div class="formElement{if $errorField == 'description'} formError{/if}">
						<div class="formFieldLabel">
							<label for="description">{lang}wcf.acp.partnerlinkus.linkus.description{/lang}</label>
						</div>
						<div class="formField">
							<textarea id="description" name="description" cols="40" rows="10">{$description}</textarea>
							{if $errorField == 'description'}
								<p class="innerError">
									{if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
								</p>
							{/if}
						</div>
						<div class="formFieldDesc hidden" id="descriptionHelpMessage">
							{lang}wcf.acp.partnerlinkus.linkus.description.description{/lang}
						</div>
						<script type="text/javascript">//<![CDATA[
							inlineHelp.register('description');
						//]]></script>
					</div>
					<div class="formElement{if $errorField == 'link'} formError{/if}">
						<div class="formFieldLabel">
							<label for="link">{lang}wcf.acp.partnerlinkus.linkus.link{/lang}</label>
						</div>
						<div class="formField">
							<input type="text" class="inputText" id="link" name="link" value="{$link}" />
							{if $errorField == 'link'}
								<p class="innerError">
									{if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
								</p>
							{/if}
						</div>
						<div class="formFieldDesc hidden" id="linkHelpMessage">
							{lang}wcf.acp.partnerlinkus.linkus.link.description{/lang}
						</div>
						<script type="text/javascript">//<![CDATA[
							inlineHelp.register('link');
						//]]></script>
					</div>
					<div class="formElement{if $errorField == 'image'} formError{/if}">
						<div class="formFieldLabel">
							<label for="image">{lang}wcf.acp.partnerlinkus.linkus.image{/lang}</label>
						</div>
						<div class="formField">
							<input type="text" class="inputText" id="image" name="image" value="{$image}" />
							{if $errorField == 'image'}
								<p class="innerError">
									{if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
								</p>
							{/if}
						</div>
						<div class="formFieldDesc hidden" id="imageHelpMessage">
							{lang}wcf.acp.partnerlinkus.linkus.image.description{/lang}
						</div>
						<script type="text/javascript">//<![CDATA[
							inlineHelp.register('image');
						//]]></script>
					</div>
					<div class="formElement{if $errorField == 'showOrder'} formError{/if}">
						<div class="formFieldLabel">
							<label for="showOrder">{lang}wcf.acp.partnerlinkus.linkus.showOrder{/lang}</label>
						</div>
						<div class="formField">
							<input type="text" class="inputText" id="showOrder" name="showOrder" value="{$showOrder}" />
							{if $errorField == 'showOrder'}
								<p class="innerError">
									{if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
								</p>
							{/if}
						</div>
						<div class="formFieldDesc hidden" id="showOrderHelpMessage">
							{lang}wcf.acp.partnerlinkus.linkus.showOrder.description{/lang}
						</div>
						<script type="text/javascript">//<![CDATA[
							inlineHelp.register('showOrder');
						//]]></script>
					</div>	
			</fieldset>
			
			{if $additionalFields|isset}{@$additionalFields}{/if}
		</div>
	</div>
		
	<div class="formSubmit">
		<input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
		<input type="reset" accesskey="r" value="{lang}wcf.global.button.reset{/lang}" />
		<input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
 		{@SID_INPUT_TAG}
        {if $linkusID|isset}<input type="hidden" name="linkusID" value="{@$linkusID}" />{/if}
 	</div>
</form>

{include file='footer'}