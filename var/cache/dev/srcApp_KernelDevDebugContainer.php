<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerT0NYsbt\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerT0NYsbt/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerT0NYsbt.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerT0NYsbt\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerT0NYsbt\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'T0NYsbt',
    'container.build_id' => 'd5f8ab8b',
    'container.build_time' => 1576356846,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerT0NYsbt');
