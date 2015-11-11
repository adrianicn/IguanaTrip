/*
 * SimpleModal Basic Modal Dialog
 * http://simplemodal.com
 *
 * Copyright (c) 2013 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 */


function callModal($id_usuario_servicio){

var $id='.cls_'+$id_usuario_servicio;
		$($id).modal();

		return false;
	
}