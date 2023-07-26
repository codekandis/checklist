'use strict';

import { Collection } from '../../../libraries/jotunheim/Collections/Collection.js';
import { EventArguments } from '../../../libraries/jotunheim/Types/EventArguments.js';

/**
 * Represents the event arguments of any notifying event.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class NotifyingEventArguments extends EventArguments
{
	/**
	 * Stores the notifications.
	 * @type {Collection<Notification>}
	 */
	#_notifications;

	/**
	 * Constructor method.
	 * @param {Collection<Notification>} notifications The notifications.
	 */
	constructor( notifications )
	{
		super();

		this.#_notifications = notifications;
	}

	/**
	 * Static constructor method.
	 * @param {Notification} notification The notification.
	 * @returns {NotifyingEventArguments}
	 * @constructor
	 */
	static with_singleNotification( notification )
	{
		return new this(
			new Collection( notification )
		);
	}

	/**
	 * Gets the notifications.
	 * @returns {Collection<Notification>} The notifications.
	 */
	get notifications()
	{
		return this.#_notifications;
	}
}
