			assign(target.<?= CppHelper::camel_skip_prefix($_proto['name']) ?>, lfn, impl::str_by_index(<?= $registry->lookup_string($_proto['name']) ?>));
