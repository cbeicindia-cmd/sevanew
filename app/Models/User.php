<?php

namespace App\Models;

class User
{
    public const ROLE_SUPER_ADMIN = 'super_admin';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_AGENT = 'agent';
    public const ROLE_CITIZEN = 'citizen';

    public int $id;
    public string $name;
    public string $email;
    public string $role;
}
