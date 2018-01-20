<section class="section">
	<header class="sectionHeader">
		<h2 class="sectionTitle">{lang}wcf.conversation.nosupport.title{/lang}</h2>
	</header>

	<div class="info">{lang}wcf.conversation.nosupport.text{/lang}</div>

	<label>
		<input type="checkbox" value="1" name="noSupportViaConversation" id="noSupportViaConversation"{if $noSupportViaConversation} checked{/if} />
		{lang}wcf.conversation.nosupport.label{/lang}
	</label>

	{if $errorField == 'noSupportViaConversation'}
		<small class="innerError">{lang}wcf.global.form.error.empty{/lang}</small>
	{/if}
</section>
