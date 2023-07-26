'use strict';

import { AbstractRoutesConfiguration } from '../../libraries/jotunheim/Configurations/AbstractRoutesConfiguration.js';
import { IndexApplicationPage } from '../ApplicationPages/IndexApplicationPage.js';

/**
 * Represents a routes configuration.
 * @author Christian Ramelow <info@codekandis.net>
 */
export class RoutesConfiguration extends AbstractRoutesConfiguration
{
	/**
	 * @inheritdoc
	 */
	__routes = {
		'/': IndexApplicationPage,
	};
}
