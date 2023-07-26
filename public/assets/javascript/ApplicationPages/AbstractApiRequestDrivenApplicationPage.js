'use strict';

import { AbstractApplicationPage } from '../../libraries/jotunheim/ApplicationPages/AbstractApplicationPage.js';
import { ApiUriBuilder } from '../Net/ApiUriBuilder.js';
import { ApiRequestManager } from '../Net/Http/ApiRequestManager.js';

/**
 * Represents the base class of any application page providing an API request manager.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class AbstractApiRequestDrivenApplicationPage extends AbstractApplicationPage
{
	/**
	 * Stores the request manager.
	 * @type {ApiRequestManager}
	 */
	__requestManager = new ApiRequestManager(
		new ApiUriBuilder()
	);
}
