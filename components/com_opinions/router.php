<?php

defined('_JEXEC') or die;

function OpinionsBuildRoute(&$query)
{
	$segments = array();

	if (isset($query['task']))
	{
		$segments[] = $query['task'];
		unset($query['task']);
	}
	if (isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	}

	return $segments;
}

function OpinionsParseRoute($segments)
{
	$vars = array();

	$count = count($segments);

	if ($count)
	{
		$count--;
		$segment = array_shift($segments);
		if (is_numeric($segment))
		{
			$vars['id'] = $segment;
		}
		else
		{
			$vars['task'] = $segment;
		}
	}

	if ($count)
	{
		$segment = array_shift($segments);
		if (is_numeric($segment))
		{
			$vars['id'] = $segment;
		}
	}

	$vars['task'] = 'opinions';
	return $vars;
}
