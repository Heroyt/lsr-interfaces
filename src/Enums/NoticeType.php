<?php
declare(strict_types=1);

namespace Lsr\Enums;

enum NoticeType: string
{

	case ERROR   = 'error';
	case WARNING = 'warning';
	case INFO    = 'info';
	case SUCCESS = 'success';

}
