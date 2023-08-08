'use strict';

import { AbstractUriMappings as OriginAbstractUriMappings } from '../../libraries/jotunheim/Net/AbstractUriMappings.js';

/**
 * Represents the API URI mappings of the application.
 */
export class AbstractUriMappings extends OriginAbstractUriMappings
{
	/**
	 * Constructor method.
	 */
	constructor()
	{
		super();

		const currentUri = new URL( document.location.href );
		const protocol   = currentUri.protocol.trimStringsFromEnd( ':' );

		this.__schema  = protocol;
		this.__host    = currentUri.host;
		this.__port    = 'https' === protocol
			? 443
			: 80;
	}
}
