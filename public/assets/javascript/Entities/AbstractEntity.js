'use strict';

import { AbstractBindable } from '../../libraries/jotunheim/Types/DataBindings/AbstractBindable.js';
import { AbstractEntityPropertyNames } from './Enumerations/AbstractEntityPropertyNames.js';

/**
 * Represents the base class of any entity.
 */
export class AbstractEntity extends AbstractBindable
{
	/**
	 * Stores the ID.
	 * @type {?String}
	 */
	#_id = null;

	/**
	 * Stores the timestamp of the creation.
	 * @type {?Date}
	 */
	#_createdAt = null;

	/**
	 * Gets the ID.
	 * @returns {?String} The ID.
	 */
	get id()
	{
		return this.#_id;
	}

	/**
	 * Sets the ID.
	 * @param {?String} value The ID.
	 */
	set id( value )
	{
		this._dispatchPropertyChangedEvent( AbstractEntityPropertyNames.ID );
		this.#_id = value;
		this._dispatchPropertyChangingEvent( AbstractEntityPropertyNames.ID );
	}

	/**
	 * Gets the timestamp of the creation.
	 * @returns {?Date} The timestamp of the creation.
	 */
	get createdAt()
	{
		return this.#_createdAt;
	}

	/**
	 * Sets the timestamp of the creation.
	 * @param {?Date} value The timestamp of the creation.
	 */
	set createdAt( value )
	{
		this._dispatchPropertyChangedEvent( AbstractEntityPropertyNames.CREATED_AT );
		this.#_createdAt = value;
		this._dispatchPropertyChangingEvent( AbstractEntityPropertyNames.CREATED_AT );
	}

	/**
	 * Static constructor method.
	 * Creates the entity from JSON serialized data.
	 * @param {Object} data The JSON serialized data to create to entity from.
	 * @returns {AbstractEntity}
	 * @constructor
	 */
	static fromJSON( data )
	{
		const entity = new this();

		entity.id        = false === data.hasOwnProperty( AbstractEntityPropertyNames.ID )
			? null
			: data.id;
		entity.createdAt = false === data.hasOwnProperty( AbstractEntityPropertyNames.CREATED_AT )
			? null
			: Date.fromJSON( data.createdAt );

		return entity;
	}

	/**
	 * Gets the JSON representation of the entity.
	 * @returns {Object} The JSON representation of the entity.
	 */
	toJSON()
	{
		return {
			id:        this.#_id,
			createdAt: this.#_createdAt
		};
	}
}
