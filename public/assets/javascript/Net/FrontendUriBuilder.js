'use strict';

import { AbstractUriBuilder } from '../../libraries/jotunheim/Net/AbstractUriBuilder.js';
import { FrontendUriMappings } from './FrontendUriMappings.js';

/**
 * Represents the frontend URI builder of the application.
 */
export class FrontendUriBuilder extends AbstractUriBuilder
{
	/**
	 * Constructor method.
	 */
	constructor()
	{
		super(
			new FrontendUriMappings()
		);
	}
}
