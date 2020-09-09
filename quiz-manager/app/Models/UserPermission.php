<?php

use  \MyCLabs\Enum\Enum;

/**
 * UserPermission Enum
 * @method static self PERMISSION_LOWEST()
 * @method static self PERMISSION_MIDDLE()
 * @method static self PERMISSION_HIGHEST()
 */
class UserPermission extends Enum
{
    public const PERMISSION_RESTRICTED = 1;
    public const PERMISSION_VIEW = 2;
    public const PERMISSION_EDIT = 3;

}
