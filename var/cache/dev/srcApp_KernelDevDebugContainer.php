<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container0efO8cc\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container0efO8cc/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container0efO8cc.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container0efO8cc\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \Container0efO8cc\srcApp_KernelDevDebugContainer([
    'container.build_hash' => '0efO8cc',
    'container.build_id' => '7d51e6be',
    'container.build_time' => 1573589393,
], __DIR__.\DIRECTORY_SEPARATOR.'Container0efO8cc');
