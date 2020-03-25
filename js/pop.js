
import { createPopper } from '@popperjs/core';
const lancar = document.querySelector('#lancar');
const tooltip = document.querySelector('#tooltip_lancar');
createPopper(popcorn, tooltip, {
	placement: 'bottom',
});