'use strict';

import { AbstractUriMappings } from './AbstractUriMappings.js';

/**
 * Represents the API URI mappings of the application.
 */
export class ApiUriMappings extends AbstractUriMappings
{
	/**
	 * @inheritdoc
	 */
	__baseUri = '/api/';

	/**
	 * @inheritdoc
	 */
	__relativeUriTemplates = {};
}
