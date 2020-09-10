<?php

use MyCLabs\Enum\Enum;

/**
 * UserPermission Enum
 * @method static self PERMISSION_RESTRICT()
 * @method static self PERMISSION_VIEW()
 * @method static self PERMISSION_EDIT()
 */
class UserPermission extends Enum
{
    public const PERMISSION_RESTRICT = 1;
    public const PERMISSION_VIEW = 2;
    public const PERMISSION_EDIT = 3;
}
