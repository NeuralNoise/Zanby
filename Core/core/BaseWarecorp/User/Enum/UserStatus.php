<?php
/**
*   Zanby Enterprise Group Family System
*
*    Copyright (C) 2005-2011 Zanby LLC. (http://www.zanby.com)
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*    To contact Zanby LLC, send email to info@zanby.com.  Our mailing
*    address is:
*
*            Zanby LLC
*            3611 Farmington Road
*            Minnetonka, MN 55305
*
* @category   Zanby
* @package    Zanby
* @copyright  Copyright (c) 2005-2011 Zanby LLC. (http://www.zanby.com)
* @license    http://zanby.com/license/     GPL License
* @version    <this will be auto generated>
*/

/**
 * Warecorp FRAMEWORK
 * @package Warecorp_Group_Enum
 * @copyright Copyright (c) 2007
 */
class BaseWarecorp_User_Enum_UserStatus
{
    const USER_STATUS_ACTIVE        = 'active';
    const USER_STATUS_PENDING       = 'pending';
    const USER_STATUS_BLOCKED       = 'blocked';
    const USER_STATUS_DELETED       = 'deleted';
    
    /**
     * check is value in enum
     * @param mixed $value
     * @return boolean
     * @author Artem Sukharev
     */
    public static function isIn($value)
    {
        if ( 
            $value != self::USER_STATUS_ACTIVE && 
            $value != self::USER_STATUS_PENDING && 
            $value != self::USER_STATUS_BLOCKED &&
            $value != self::USER_STATUS_DELETED 
        ) {
            return false;
        }
        return true;
    }
    
    public static function getAllStatuses($isAssoc = false)
    {
    	if (!$isAssoc)
    		return array(self::USER_STATUS_ACTIVE, self::USER_STATUS_BLOCKED, self::USER_STATUS_DELETED, self::USER_STATUS_PENDING);
    	else 
    		return array(self::USER_STATUS_ACTIVE => self::USER_STATUS_ACTIVE, self::USER_STATUS_BLOCKED => self::USER_STATUS_BLOCKED, self::USER_STATUS_DELETED => self::USER_STATUS_DELETED, self::USER_STATUS_PENDING => self::USER_STATUS_PENDING);
    }
    
    public static function getAllActiveStatuses($isAssoc = false)
    {
        if (!$isAssoc)
            return array(self::USER_STATUS_ACTIVE, self::USER_STATUS_BLOCKED, self::USER_STATUS_PENDING);
        else 
            return array(self::USER_STATUS_ACTIVE => self::USER_STATUS_ACTIVE, self::USER_STATUS_BLOCKED => self::USER_STATUS_BLOCKED, self::USER_STATUS_PENDING => self::USER_STATUS_PENDING);
    }
    
}
