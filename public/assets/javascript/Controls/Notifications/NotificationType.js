'use strict';

import { AbstractStatic } from '../../../libraries/jotunheim/Types/AbstractStatic.js';

/**
 * Represents an enumeration of message types.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class NotificationType extends AbstractStatic
{
	/**
	 * Represents the message type `danger`.
	 * @type {String}
	 */
	static get DANGER()
	{
		return 'danger';
	}

	/**
	 * Represents the message type `dark`.
	 * @type {String}
	 */
	static get DARK()
	{
		return 'dark';
	}

	/**
	 * Represents the message type `info`.
	 * @type {String}
	 */
	static get INFO()
	{
		return 'info';
	}

	/**
	 * Represents the message type `light`.
	 * @type {String}
	 */
	static get LIGHT()
	{
		return 'light';
	}

	/**
	 * Represents the message type `primary`.
	 * @type {String}
	 */
	static get PRIMARY()
	{
		return 'primary';
	}

	/**
	 * Represents the message type `secondary`.
	 * @type {String}
	 */
	static get SECONDARY()
	{
		return 'secondary';
	}

	/**
	 * Represents the message type `success`.
	 * @type {String}
	 */
	static get SUCCESS()
	{
		return 'success';
	}

	/**
	 * Represents the message type `warning`.
	 * @type {String}
	 */
	static get WARNING()
	{
		return 'warning';
	}
}
