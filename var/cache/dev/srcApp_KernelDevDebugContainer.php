<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXCInC5x\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXCInC5x/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXCInC5x.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXCInC5x\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerXCInC5x\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'XCInC5x',
    'container.build_id' => 'b16829ef',
    'container.build_time' => 1575891375,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXCInC5x');
