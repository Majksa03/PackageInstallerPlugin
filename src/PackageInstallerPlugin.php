<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MajFrame\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Description of PackageInstallerPlugin
 *
 * @author Majksa
 */
class PackageInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new PackageInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}