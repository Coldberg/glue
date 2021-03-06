<?php require_once 'cpphelper.php' ?>
#ifndef LVL2_<?= $name ?>_<?= strtoupper($profile) ?>_HPP
#define LVL2_<?= $name ?>_<?= strtoupper($profile) ?>_HPP

#include "../../lvl1/<?= $api ?>/<?= $version ?>.<?= $profile ?>.hpp"
#include "../../math.hpp"
#include "../../utility.hpp"

namespace glue::lvl2
{
	inline namespace <?= CppHelper::the_namespace($feature) ?> 
	{
		struct api: glue::lvl1::<?= CppHelper::the_namespace($feature) ?>::api
		{
			api(const api&) = default;
			api& operator = (const api&) = default;
			api() = default;
<?php
	//$this->instantiate_fragment('uniform_api', compact('protos'), ['what'=>'decl']);
?>
		public:
		};
	}
}

#endif