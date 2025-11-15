<?php

namespace App\Enums;

enum TaskType: string
{
    case Bug = 'bug';
    case Feature = 'feature';
    case Task = 'task';
}