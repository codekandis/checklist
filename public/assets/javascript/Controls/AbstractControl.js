'use strict';

import { Abstract } from '../../libraries/jotunheim/Types/Abstract.js';
import { EventManager } from '../../libraries/jotunheim/Types/EventManager.js';
import { Notification } from './Notifications/Notification.js';
import { NotificationType } from './Notifications/NotificationType.js';
import { NotifyingEvent } from './Notifications/NotifyingEvent.js';
import { NotifyingEventArguments } from './Notifications/NotifyingEventArguments.js';

/**
 * Represents the base class of any control.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class AbstractControl extends Abstract
{
	/**
	 * Gets the notifying event.
	 * @returns {Function} The notifying event.
	 */
	get notifyingEvent()
	{
		return new EventManager( NotifyingEvent, this );
	}

	/**
	 * Notifies with a variadic amount of notifications.
	 * @param {Collection<Notification>} notifications
	 */
	_notifyMultipleNotifications( notifications )
	{
		this.notifyingEvent.dispatch(
			new NotifyingEventArguments( notifications )
		);
	}

	/**
	 * Notifies with a single notification.
	 * @param {Notification} notification
	 */
	_notifySingleNotification( notification )
	{
		this.notifyingEvent.dispatch(
			NotifyingEventArguments.with_singleNotification( notification )
		);
	}

	/**
	 * Notifies about error messages.
	 * @param {Collection<String>} errorMessages The error messages.
	 */
	_notifyErrorMessages( errorMessages )
	{
		this._notifyMultipleNotifications(
			errorMessages.map(
				( fetchedErrorMessage ) =>
				{
					return new Notification( NotificationType.DANGER, fetchedErrorMessage );
				}
			)
		);
	}

	/**
	 * Gets an HTML form field selector specified by its name attribute.
	 * @param {String} name The name of the HTML form field.
	 * @returns {String} The HTML form field selector.
	 */
	_getFormFieldByNameSelector( name )
	{
		return String.format`[name='${ 0 }']`( name );
	}
}
