'use strict';

import { HttpRequest } from '../../../libraries/jotunheim/Net/Http/HttpRequest.js';
import { HttpRequestMethod } from '../../../libraries/jotunheim/Net/Http/HttpRequestMethod.js';

/**
 * Represents the base class of any HTTP request.
 */
export class AbstractHttpRequest extends HttpRequest
{
	/**
	 * Constructor method.
	 * @param {URL} uri The URI of the request.
	 */
	constructor( uri )
	{
		super( uri );
	}

	/**
	 * Creates an HTTP GET request.
	 * @param {URL} uri The URI of the request.
	 * @returns {AbstractHttpRequest}
	 * @constructor
	 */
	static createGetRequest( uri )
	{
		return new this( uri );
	}

	/**
	 * Creates an HTTP POST request.
	 * @param {URL} uri The URI of the request.
	 * @returns {AbstractHttpRequest}
	 * @constructor
	 */
	static createPostRequest( uri )
	{
		const request  = new this( uri );
		request.method = HttpRequestMethod.POST;

		return request;
	}

	/**
	 * Creates an HTTP PUT request.
	 * @param {URL} uri The URI of the request.
	 * @returns {AbstractHttpRequest}
	 * @constructor
	 */
	static createPutRequest( uri )
	{
		const request  = new this( uri );
		request.method = HttpRequestMethod.PUT;

		return request;
	}

	/**
	 * Creates an HTTP DELETE request.
	 * @param {URL} uri The URI of the request.
	 * @returns {AbstractHttpRequest}
	 * @constructor
	 */
	static createDeleteRequest( uri )
	{
		const request  = new this( uri );
		request.method = HttpRequestMethod.DELETE;

		return request;
	}
}
