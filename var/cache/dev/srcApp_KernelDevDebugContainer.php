<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCivhFX0\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCivhFX0/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerCivhFX0.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerCivhFX0\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerCivhFX0\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'CivhFX0',
    'container.build_id' => '5c77112b',
    'container.build_time' => 1571429346,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerCivhFX0');
