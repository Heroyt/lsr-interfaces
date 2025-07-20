<?php
declare(strict_types=1);

namespace Lsr\Dto;

use Lsr\Enums\NoticeType;
use Psr\Http\Message\UriInterface;

class Notice
{

	public function __construct(
		public string                   $message,
		public NoticeType               $type = NoticeType::INFO,
		public ?string                  $detail = null,
		public null|string|UriInterface $uri = null,
	) {
	}

}