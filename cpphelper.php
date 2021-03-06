<?php

	class CppHelper
	{
		public static function camel_case_split($text)
		{
			$last = null;
			$curr = '';
			$result = [];
			foreach (str_split($text) as $char)
			{
				if (ctype_upper($char)
				 && ctype_lower($last))
				{
					$result[] = $curr;
					$curr = '';
				}
				$curr .= $char;
				$last = $char;
			}
			if (strlen($curr) > 0)
				$result[] = $curr;
			return $result;
		}

		public static function camel_skip_prefix($text)
		{
			$text = CppHelper::camel_case_split($text);
			array_shift($text);
			return implode('', $text);
		}

		public static function build_arguments($_typedefs, $_proto)
		{
			$_output = [];
			foreach($_proto['arguments'] as $_arg)
			{
				$_full_type = CppHelper::rewrite_type($_typedefs, $_arg['full_type']);
				$_output[] = sprintf('%s %s', $_full_type, $_arg['name']);
			}
			return implode($_output, ', ');
		}

		public static function build_argument_types($_typedefs, $_proto)
		{
			$_output = [];
			foreach($_proto['arg_types'] as $_arg)
				$_output[] = CppHelper::rewrite_type($_typedefs, $_arg);
			return implode($_output, ', ');
		}

		public static function rewrite_type($_typedefs, $_full_type)
		{
			$_replace = function ($value) use ($_typedefs)
			{
				if (!isset ($_typedefs[$value[0]])
					||!isset ($_typedefs[$value[0]]['alias']))
					return $value[0];
				return $_typedefs[$value[0]]['alias'];
			};
			return preg_replace_callback('/GL\w+/', $_replace, $_full_type);
		}

		public static function the_namespace($args)
		{
			extract($args, EXTR_OVERWRITE);
			return $profile . '_' . str_replace('.', '_', $version);
		}

	};
