'use strict';

import { AbstractStatic } from '../../../libraries/jotunheim/Types/AbstractStatic.js';

/**
 * Represents the property names of the abstract entity.
 */
export class AbstractEntityPropertyNames extends AbstractStatic
{
	/**
	 * Represents the property `id`.
	 * @type {String}
	 */
	static get ID()
	{
		return 'id';
	}

	/**
	 * Represents the property `createdAt`.
	 * @type {String}
	 */
	static get CREATED_AT()
	{
		return 'createdAt';
	}
}
