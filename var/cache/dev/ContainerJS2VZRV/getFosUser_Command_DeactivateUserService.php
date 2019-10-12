<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'fos_user.command.deactivate_user' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\console\\Command\\Command.php';
include_once $this->targetDirs[3].'\\vendor\\friendsofsymfony\\user-bundle\\Command\\DeactivateUserCommand.php';

$this->privates['fos_user.command.deactivate_user'] = $instance = new \FOS\UserBundle\Command\DeactivateUserCommand(($this->privates['fos_user.util.user_manipulator'] ?? $this->load('getFosUser_Util_UserManipulatorService.php')));

$instance->setName('fos:user:deactivate');

return $instance;
