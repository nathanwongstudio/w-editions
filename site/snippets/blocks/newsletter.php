<form
	action="https://buttondown.com/api/emails/embed-subscribe/weditions"
	method="post"
	class="embeddable-buttondown-form"
	id="buttondown">
	<div class="email">
		<input type="hidden" name="tag" value="website" />
		<fieldset title="newsletter form">
			<legend class="newsletter-header"><?= $block->label()->isNotEmpty() ? $block->label() : 'Newsletter' ?></legend>
			<div class="field name-input">
				<label for="full_name"><?= ($block->namePlaceholder()->isNotEmpty()) ? $block->namePlaceholder() : 'Full Name' ?></label>
				<input type="text" name="metadata__full_name" id="full_name" placeholder="<?= ($block->namePlaceholder()->isNotEmpty()) ? $block->namePlaceholder() : 'Full Name' ?>"/>
			</div>
			<div class="field email-input">
				<label for="bd-email"><?= ($block->emailPlaceholder()->isNotEmpty()) ? $block->emailPlaceholder() : 'Email' ?></label>
				<input type="email" name="email" id="bd-email" placeholder="<?= ($block->emailPlaceholder()->isNotEmpty()) ? $block->emailPlaceholder() : 'Email' ?>"/>
			</div>
			<div class="field submit">
				<button class="go" type="submit" value="Sign Up">Sign up</button>
			</div>
		</fieldset>
		<div class="bd-error"></div>
	</div>
</form>

<script>
	async function submitNewsletter() {
		const fieldsetElement = formElement.querySelector("fieldset");

		const formData = new FormData(formElement)

		// Reset state, disable form
		if (formErrorMessageElement) {
			formErrorMessageElement.parentNode.removeChild(formErrorMessageElement);
			formErrorMessageElement = null;
		}

		fieldsetElement.disabled = true;
		emailInput.blur();

		// Try submitting form
		const outcome =
			await
		fetch(formElement.action, {
				method: "POST",
				body: formData
			})
			.then(
				async response => {
						const rawMessage = await response.text();
						let formattedMessage = "";

						if (response.status === 404) {
							// Return custom 404 error message
							// In this situation, Buttondown's response is a complete HTML page.
							formattedMessage = "Server is temporarily unavailable. Please try again later.";
						} else if (rawMessage === "") {
							// Return fallback error message
							formattedMessage = "Unknown server error. Please try again.";
						} else {
							// Return Buttondown error message
							formattedMessage = (rawMessage[0] ?? "").toLowerCase() + rawMessage.slice(1);
							if (![".", "!", "?", "…"].includes(formattedMessage.slice(-1))) {
								formattedMessage += ".";
							}

							formattedMessage = "Failed to submit: " + formattedMessage;
						}

						return {
							success: response.status === 200,
							message: formattedMessage,
							statusCode: response.status
						}
					},
					() => ({
						success: false,
						message: "Error when communicating with server. Please try again.",
						statusCode: null
					})
			);

		// Log outcome -- won't do this.
		// fetch("log-list-subscription-attempt?" + new URLSearchParams({
		// 	emailAddress: emailInput.value,
		// 	responseCode: outcome.statusCode
		// }));

		// Update view
		if (outcome.success) {
			const fieldsetHeight = fieldsetElement.getBoundingClientRect().height;

			// Hide inputs
			fieldsetElement.classList.add('disabled');

			// Show success message
			const formSuccessMessageElement = document.createElement("div");
			formElement.appendChild(formSuccessMessageElement);
			formSuccessMessageElement.className = "message success";
			formSuccessMessageElement.innerText = "Confirmation link sent—check your inbox!";
			formSuccessMessageElement.style.height = fieldsetHeight + "px";
		} else {
			// Show error message
			formErrorMessageElement = document.createElement("div");
			formElement.appendChild(formErrorMessageElement);
			formErrorMessageElement.className = "message error";
			formErrorMessageElement.innerText = outcome.message;

			// Reactivate form
			fieldsetElement.disabled = false;
			emailInput.focus();
		}
	}

	// Init
	const formElement = document.querySelector("form");
	const emailInput = formElement.querySelector("input[type=email]");

	// // Nicer newsletter form submission
	let formErrorMessageElement = null;

	formElement.addEventListener("submit", event => {
		event.preventDefault();
		submitNewsletter();
	});
</script>