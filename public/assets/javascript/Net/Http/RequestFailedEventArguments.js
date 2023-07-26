'use strict';

import { EventArguments } from '../../../libraries/jotunheim/Types/EventArguments.js';

/**
 * Represents the event arguments of any request failed event.
 */
export class RequestFailedEventArguments extends EventArguments
{
	/**
	 * Stores the error messages of the response.
	 * @type {Collection<String>}
	 */
	#_errorMessages;

	/**
	 * Constructor method.
	 * @param {Collection<String>} errorMessages The error messages of the response.
	 */
	constructor( errorMessages )
	{
		super();

		this.#_errorMessages = errorMessages;
	}

	/**
	 * Gets the error messages of the response.
	 * @returns {Collection<String>} The error messages of the response.
	 */
	get errorMessages()
	{
		return this.#_errorMessages;
	}
}
