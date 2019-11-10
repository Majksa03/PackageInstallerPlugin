<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MajFrame\Composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

/**
 * Description of PackageInstaller
 *
 * @author Majksa
 */
class PackageInstaller extends LibraryInstaller
{
    const PREFIX = "majframe/package-";
    const TYPE = "majframe-package";

    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, strlen(self::PREFIX));
        if (self::PREFIX !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install package, MajFrame packages should always '
                .'start with '.self::PREFIX
            );
        }
        return 'packages/'.substr($package->getPrettyName(),
                strlen(self::PREFIX));
    }

    public function supports($packageType)
    {
        return self::TYPE === $packageType;
    }
}