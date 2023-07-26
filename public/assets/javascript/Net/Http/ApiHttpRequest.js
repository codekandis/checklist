'use strict';

import { MimeType } from '../../../libraries/jotunheim/Io/MimeType.js';
import { ContentTypeHttpRequestHeader } from '../../../libraries/jotunheim/Net/Http/Headers/RequestHeaders/ContentTypeHttpRequestHeader.js';
import { CharSet } from '../../../libraries/jotunheim/Text/CharSet.js';
import { AbstractHttpRequest } from './AbstractHttpRequest.js';

/**
 * Represents an API HTTP request.
 */
export class ApiHttpRequest extends AbstractHttpRequest
{
	/**
	 * Constructor method.
	 * @param {URL} uri The URI of the request.
	 */
	constructor( uri )
	{
		super( uri );

		this.#initialize();
	}

	/**
	 * Initializes the request.
	 */
	#initialize()
	{
		this.#addCommonRequestHeaders();
	}

	/**
	 * Adds the common request headers.
	 */
	#addCommonRequestHeaders()
	{
		this.headers.add(
			new ContentTypeHttpRequestHeader(
				MimeType.with_charset( MimeType.APPLICATION_JSON, CharSet.UTF_8 )
			)
		);
	}
}
