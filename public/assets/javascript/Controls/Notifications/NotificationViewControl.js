'use strict';

import { Collection } from '../../../libraries/jotunheim/Collections/Collection.js';
import { DomHelper } from '../../../libraries/jotunheim/Dom/DomHelper.js';
import { Abstract } from '../../../libraries/jotunheim/Types/Abstract.js';

/**
 * Represents a notification view control.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class NotificationViewControl extends Abstract
{
	/**
	 * Represents the control type.
	 * @type {String}
	 */
	static get CONTROL_TYPE()
	{
		return 'NOTIFICATION_VIEW_CONTROL';
	}

	/**
	 * Represents the message control template.
	 * @type {String_ReplacementHandler}
	 */
	static get #MESSAGE_CONTROL_TEMPLATE()
	{
		return String.format`
            <div class="alert alert-${ 0 }"/>
                ${ 1 }
            </div>
        `;
	}

	/**
	 * Stores the notification HTML view.
	 * @type {HTMLElement}
	 */
	#_notificationView;

	/**
	 * Stores the registered notifier controls.
	 * @type {Collection<AbstractControl>}
	 */
	#_notifyingControls = new Collection();

	/**
	 * Constructor method.
	 */
	constructor( notificationView )
	{
		super();

		this.#_notificationView = notificationView;
	}

	/**
	 * Registers a variadic amount of notifying controls to show their messages.
	 * @param {...AbstractControl} notifyingControls The notifying controls.
	 */
	register( ...notifyingControls )
	{
		notifyingControls.forEach(
			( fetchedNotifierControl ) =>
			{
				fetchedNotifierControl.notifyingEvent( this.#notifierControl_notifying );
			}
		);

		this.#_notifyingControls.add( ...notifyingControls );
	}

	/**
	 * Shows all messages.
	 * @param {Collection<Notification>} messages The messages to show.
	 */
	#showMessages( messages )
	{
		this.#_notificationView.empty();

		messages.forEach(
			( fetchedMessage ) =>
			{
				const messageControl = DomHelper.createElementFromString(
					NotificationViewControl.#MESSAGE_CONTROL_TEMPLATE( fetchedMessage.type, fetchedMessage.message )
				);

				DomHelper.appendChildren( this.#_notificationView, messageControl );
			}
		);
	}

	/**
	 * Handles the notifying event of the notification control.
	 * @param {NotifyingEvent} event
	 * @param {NotifyingEventArguments} event.detail.eventArguments
	 */
	#notifierControl_notifying = ( event ) =>
	{
		this.#showMessages( event.detail.eventArguments.notifications );
	};

	/**
	 * Appends the control.
	 */
	append()
	{
	}
}
