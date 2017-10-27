<?php

namespace Contributte\Plugins;

use Composer\Installer\PackageEvent;

class Processor
{

	//TODO jméno souboru?
	const CONFIG_FILE = 'nette-plugin.neon';

	//TODO cesta?
	const PATH = 'app/config/plugins';

	public static function process(PackageEvent $event)
	{
		$package = $event->getComposer()->getPackage();
		$installationManager = $event->getComposer()->getInstallationManager();

		$fileName = $installationManager->getInstallPath($package). '/' . self::CONFIG_FILE;

		$event->getIO()->write($fileName);
		if (file_exists($fileName) && !is_dir($fileName)) {
			$event->getIO()->write('Exists!');
		}

		//TODO zjistit jestli má package v rootu soubor self::configFile - idealně před exportem (gitattributes)
		//TODO pokud soubor nexistuje return; - dočasně možná nějaky alternativní mapper - např. přes componette
		//TODO pokud soubor existuje, zahají se process

		//Soubor plugins.neon
		//TODO pokud neexistuje soubor 'plugins' vytvoří se nový, pokud v něm nějaký plugin přebývá,
		//TODO vypíše se warning, pokud nějaký plugin chybí, doplní se

		//Konfigurace pluginu
		//TODO validace souboru
		//TODO pokud je konfigurace jedna použije se
		//TODO pokud je konfigurací víc, ask dialog kterou použít
		//TODO pokud je vyplněna defaultní, použije se do našeptávání

		//Nápady
		//TODO pokud to půjde, napsat plugin aby se nemusely uvádět scripty
		//TODO více plugin složek - např dev x produkce
		//TODO použít při procesu neonizer
	}

}
