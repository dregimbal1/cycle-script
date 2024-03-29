<?php

/**
 * Project:     SmartyPaginate: Pagination for the Smarty Template Engine
 * File:        function.paginate_first.php
 * Author:      Monte Ohrt <monte at newdigitalgroup dot com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://www.phpinsider.com/php/code/SmartyPaginate/
 * @copyright 2001-2005 New Digital Group, Inc.
 * @author Monte Ohrt <monte at newdigitalgroup dot com>
 * @package SmartyPaginate
 * @version 1.6-dev
 */

function smarty_function_paginate_first($params, &$smarty) {

    $_id = 'default';
		$_rewrite = null;
    $_attrs = array();
    
    if (!class_exists('SmartyPaginate')) {
        $smarty->trigger_error("paginate_first: missing SmartyPaginate class");
        return;
    }
    if (!isset($_SESSION['SmartyPaginate'])) {
        $smarty->trigger_error("paginate_first: SmartyPaginate is not initialized, use connect() first");
        return;        
    }

    foreach($params as $_key => $_val) {
        switch($_key) {
            case 'id':
                if (!SmartyPaginate::isConnected($_val)) {
                    $smarty->trigger_error("paginate_first: unknown id '$_val'");
                    return;        
                }
                $_id = $_val;
                break;
						case 'rewrite':
								$_rewrite = $_val;
								break;
						case 'text':
								break;
            default:
                $_attrs[] = $_key . '="' . $_val . '"';
                break;   
        }
    }
    
    if (SmartyPaginate::getTotal($_id) === false) {
        $smarty->trigger_error("paginate_first: total was not set");
        return;        
    }
    
    $_url = SmartyPaginate::getURL($_id);
    
    $_attrs = !empty($_attrs) ? ' ' . implode(' ', $_attrs) : '';    
    
    $_text = isset($params['text']) ? $params['text'] : SmartyPaginate::getFirstText($_id);
    $_url .= (strpos($_url, '?') === false) ? '?' : '&';
    $_url .= SmartyPaginate::getUrlVar($_id) . '=1';
		$_url = isset($_rewrite) ? str_replace("@@@","1",$_rewrite) : $_url;
    
    return '<a href="' . str_replace('&','&amp;', $_url) . '"' . $_attrs . '>' . $_text . '</a>';
}

?>
