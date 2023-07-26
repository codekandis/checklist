'use strict';

import { AbstractApiRequestManager } from './AbstractApiRequestManager.js';

/**
 * Represents the API request manager of the application.
 */
export class ApiRequestManager extends AbstractApiRequestManager
{
	/**
	 * Constructor method.
	 * @param {ApiUriBuilder} uriBuilder The URI builder used to build the AJAX URIs.
	 */
	constructor( uriBuilder )
	{
		super( uriBuilder );
	}
}
