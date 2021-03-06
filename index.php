<?php
 	array_shift($argv);
	$cmdline_args = implode($argv, ' ');

	$url_ogl = "https://raw.githubusercontent.com/KhronosGroup/OpenGL-Registry/master/xml/gl.xml";
	$url_glx = "https://raw.githubusercontent.com/KhronosGroup/OpenGL-Registry/master/xml/glx.xml";
	$url_wgl = "https://raw.githubusercontent.com/KhronosGroup/OpenGL-Registry/master/xml/wgl.xml";

	require_once 'template.php';
	require_once 'registry.php';
	require_once 'typedef.php';

	$build_dir =  "./build/src";
	system("rm -rf ${build_dir}");

	$registry = new Registry($url_ogl);

	$G_typedefs = generate_types_table();
	$common_template = new Template("./templates/common");
	$feature_template = new Template("./templates/feature");
	$extension_template = new Template("./templates/extension");
	$tests_template	= new Template("./templates/tests");
	$makefiles_template	= new Template("./templates/makefiles");

	$common_template->instantiate($build_dir, (array)$registry, compact('G_typedefs', 'registry'));
	$tests_template->instantiate($build_dir, (array)$registry, compact('G_typedefs', 'registry'));
	foreach ($registry->features as $feature)
		$feature_template->instantiate ($build_dir, (array)$registry, compact('G_typedefs', 'registry', 'feature'), $feature);

	$libfiles = array_merge($common_template->files_produced(), $feature_template->files_produced());
	$testfiles = $tests_template->files_produced();

	$makefiles_template->instantiate($build_dir, compact ('libfiles', 'testfiles'));

	mkdir($build_dir . '/cmake');
	chdir($build_dir . '/cmake');

	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		system('cmake ../ -G "Visual Studio 15 2017 Win64" '.$cmdline_args.' && MSBuild ALL_BUILD.vcxproj && MSBuild INSTALL.vcxproj');
		chdir('../install/bin/x64/');
		system('glue_tests.exe');
	} else {
    system('cmake ../ && make && make install');
		chdir('../install/bin/x64/');
		system('./glue_tests');
	}
?>