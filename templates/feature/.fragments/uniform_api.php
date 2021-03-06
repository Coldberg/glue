<?php
	$G_unform_defs =
	[
		['type' => 'float32_t'		 , 'count' => false, 'suffix' => '1f',  'pass' => 'value'],
		['type' => 'std::int32_t'	 , 'count' => false, 'suffix' => '1i',  'pass' => 'value'],
		['type' => 'std::uint32_t' , 'count' => false, 'suffix' => '1ui', 'pass' => 'value'],
		['type' => 'const vec2&'	 , 'count' => false, 'suffix' => '2f',  'pass' => 'value.x, value.y'],
		['type' => 'const ivec2&'  , 'count' => false, 'suffix' => '2i',  'pass' => 'value.x, value.y'],
		['type' => 'const uvec2&'  , 'count' => false, 'suffix' => '2ui', 'pass' => 'value.x, value.y'],
		['type' => 'const vec3&'	 , 'count' => false, 'suffix' => '3f',  'pass' => 'value.x, value.y, value.z'],
		['type' => 'const ivec3&'  , 'count' => false, 'suffix' => '3i',  'pass' => 'value.x, value.y, value.z'],
		['type' => 'const uvec3&'  , 'count' => false, 'suffix' => '3ui', 'pass' => 'value.x, value.y, value.z'],
		['type' => 'const vec4&'	 , 'count' => false, 'suffix' => '4f',  'pass' => 'value.x, value.y, value.z, value.w'],
		['type' => 'const ivec4&'  , 'count' => false, 'suffix' => '4i',  'pass' => 'value.x, value.y, value.z, value.w'],
		['type' => 'const uvec4&'  , 'count' => false, 'suffix' => '4ui', 'pass' => 'value.x, value.y, value.z, value.w'],

		['type' => 'const float32_t*',     'count' => true, 'suffix' => '1fv',  'pass' => 'value'],
		['type' => 'const std::int32_t*',  'count' => true, 'suffix' => '1iv',  'pass' => 'value'],
		['type' => 'const std::uint32_t*', 'count' => true, 'suffix' => '1uiv', 'pass' => 'value'],

		['type' => 'const vec2*',  'suffix' => '2fv',  'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const vec3*',  'suffix' => '3fv',  'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const vec4*',  'suffix' => '4fv',  'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const ivec2*', 'suffix' => '2iv',  'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const ivec3*', 'suffix' => '3iv',  'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const ivec4*', 'suffix' => '4iv',  'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const uvec2*', 'suffix' => '2uiv', 'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const uvec3*', 'suffix' => '3uiv', 'count' => true, 'pass' => 'value_ptr(*value)'],
		['type' => 'const uvec4*', 'suffix' => '4uiv', 'count' => true, 'pass' => 'value_ptr(*value)']
	];

