/**
 * File contact-page.js.
 *
 * Handles the FAQ accordion on the contact page.
 */
( function() {
	document.addEventListener( 'DOMContentLoaded', function() {
		const faqContainer = document.querySelector('.faq-accordion');
		if ( ! faqContainer ) {
			return;
		}

		faqContainer.addEventListener('click', function(event) {
			const button = event.target.closest('.faq-question button');
			if (!button) {
				return;
			}

			const faqItem = button.closest('.faq-item');
			const answer = faqItem.querySelector('.faq-answer');
			const isExpanded = button.getAttribute('aria-expanded') === 'true';

			button.setAttribute('aria-expanded', !isExpanded);
			answer.hidden = isExpanded;

			if (isExpanded) {
				answer.style.maxHeight = null;
			} else {
				answer.style.maxHeight = answer.scrollHeight + 'px';
			}
		});
	});
} )();
