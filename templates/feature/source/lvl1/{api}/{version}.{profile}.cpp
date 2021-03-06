#include <glue/lvl1/<?= $api ?>/<?= $version ?>.<?= $profile ?>.hpp>
#include "../../common/strings.hpp"
#include <cassert>

namespace glue::lvl1
{
	namespace 
	{
		template <typename T, typename P, typename L>
		void assign(T& target, P&& fptr, L name)
		{
			target = (T)fptr(name);
			//assert(target != nullptr);
		}
	}
	inline namespace <?= CppHelper::the_namespace($feature) ?> 
 	{
		void load(api& target, std::function<void*(const char*)> lfn)
		{
<?php 
	foreach($protos as $_proto)
	{
		$this->instantiate_fragment('assign_statement', compact('registry', 'G_typedefs', '_proto'));
	}
?>
		}
 	}
}