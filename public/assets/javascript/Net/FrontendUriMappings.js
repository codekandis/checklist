'use strict';

import { AbstractUriMappings } from './AbstractUriMappings.js';

/**
 * Represents the frontend URI mappings of the application.
 */
export class FrontendUriMappings extends AbstractUriMappings
{
	/**
	 * @inheritdoc
	 */
	__baseUri = '/';

	/**
	 * @inheritdoc
	 */
	__relativeUriTemplates = {};
}
