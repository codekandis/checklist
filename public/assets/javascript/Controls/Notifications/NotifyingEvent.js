'use strict';

import { AbstractCustomEvent } from '../../../libraries/jotunheim/Types/AbstractCustomEvent.js';

/**
 * Represents an event if a control is notifiying a collection of notifications.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class NotifyingEvent extends AbstractCustomEvent
{
	/**
	 * @inheritdoc
	 */
	static get EVENT_NAME()
	{
		return 'notifying';
	}

	/**
	 * Constructor method.
	 * @param {Object} sender The object raising this event.
	 * @param {NotifyingEventArguments} eventArguments The arguments of the event.
	 */
	constructor( sender, eventArguments )
	{
		super( NotifyingEvent.EVENT_NAME, sender, eventArguments );
	}
}
