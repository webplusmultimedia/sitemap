<?php

namespace SamDark\Sitemap\Enums;

enum Frequency: string
{
	case ALWAYS = 'always';
	case HOURLY = 'hourly';
	case DAILY = 'daily';
	case WEEKLY = 'weekly';
	case MONTHLY = 'monthly';
	case YEARLY = 'yearly';
	case NEVER = 'never';
	
	/** @return array<self> */
	public static function all(): array
	{
		return [
			self::ALWAYS,
			self::HOURLY,
			self::DAILY,
			self::WEEKLY,
			self::MONTHLY,
			self::YEARLY,
			self::NEVER,
		];
	}
}
