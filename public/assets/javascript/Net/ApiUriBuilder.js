'use strict';

import { AbstractUriBuilder } from '../../libraries/jotunheim/Net/AbstractUriBuilder.js';
import { ApiUriMappings } from './ApiUriMappings.js';

/**
 * Represents the API URI builder of the application.
 */
export class ApiUriBuilder extends AbstractUriBuilder
{
	/**
	 * Constructor method.
	 */
	constructor()
	{
		super(
			new ApiUriMappings()
		);
	}
}
