<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNQmERgb\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNQmERgb/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerNQmERgb.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerNQmERgb\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerNQmERgb\App_KernelDevDebugContainer([
    'container.build_hash' => 'NQmERgb',
    'container.build_id' => 'f65a5362',
    'container.build_time' => 1729153796,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNQmERgb');
