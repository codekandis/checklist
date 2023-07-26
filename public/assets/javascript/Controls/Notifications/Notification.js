'use strict';

import { Abstract } from '../../../libraries/jotunheim/Types/Abstract.js';

/**
 * Represents a notification.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class Notification extends Abstract
{
	/**
	 * Stores the type of the notification.
	 * @type {String}
	 */
	type;

	/**
	 * Stores the message.
	 * @type {String}
	 */
	message;

	/**
	 * Constructor method.
	 * @param {String} type The type of the notification.
	 * @param {String} message The message.
	 */
	constructor( type, message )
	{
		super();

		this.type    = type;
		this.message = message;
	}

	/**
	 * Gets the type of the notification.
	 * @returns {String} The type of the notification.
	 */
	get type()
	{
		return this.type;
	}

	/**
	 * Gets the message.
	 * @returns {String} The message.
	 */
	get message()
	{
		return this.message;
	}
}
