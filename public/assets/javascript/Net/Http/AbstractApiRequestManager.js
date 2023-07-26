'use strict';

import { Collection } from '../../../libraries/jotunheim/Collections/Collection.js';
import { Abstract } from '../../../libraries/jotunheim/Types/Abstract.js';

/**
 * Represents the base class of any API request manager.
 */
export class AbstractApiRequestManager extends Abstract
{
	/**
	 * Stores the URI builder used to build the API URIs.
	 * @type {ApiUriBuilder}
	 */
	__uriBuilder;

	/**
	 * Constructor method.
	 * @param {ApiUriBuilder} uriBuilder The URI builder used to build the API URIs.
	 */
	constructor( uriBuilder )
	{
		super();

		this.__uriBuilder = uriBuilder;
	}

	/**
	 * Creates the JSON stringified payload of the request.
	 * @param {Object} data The data to create the JSON stringified payload from.
	 * @returns {String} The JSON stringified payload of the request.
	 */
	_createRequestPayload( data )
	{
		return JSON.stringify( data );
	}

	/**
	 * Creates the JSON response.
	 * @param {String} payload The payload to create the JSON response from.
	 * @returns {Object} The JSON response.
	 */
	_createJsonResponse( payload )
	{
		return JSON.parse( payload );
	}

	/**
	 * Creates a collection of error messages from a variadic amount of error messages.
	 * @param {...String} errorMessages The error messages to create the collection from. If an error message is null it will be ignored.
	 * @returns {?Collection<String>} The collection of error messages.
	 */
	_createErrorMessages( ...errorMessages )
	{
		return new Collection(
			...errorMessages.findAllBy(
				( fetchedErrorMessage ) =>
				{
					return null !== fetchedErrorMessage;
				}
			)
		);
	}
}
