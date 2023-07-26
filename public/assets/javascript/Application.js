'use strict';

import { ApplicationPageDispatcher } from '../libraries/jotunheim/ApplicationPages/ApplicationPageDispatcher.js';
import { DebugMode } from '../libraries/jotunheim/Debugging/DebugMode.js';
import { DomDocument } from '../libraries/jotunheim/Dom/DomDocument.js';
import { Jotunheim } from '../libraries/jotunheim/Jotunheim.js';
import { RoutesConfiguration } from './Configurations/RoutesConfiguration.js';

/**
 * Represents the bootstrap script of the application.
 */

DomDocument.load(
	( event ) =>
	{
		DebugMode.enable();

		( new Jotunheim() )
			.load();

		( new ApplicationPageDispatcher(
			new RoutesConfiguration()
		) )
			.dispatch();
	}
);
