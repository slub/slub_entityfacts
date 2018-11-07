plugin.tx_slubentityfacts {
  view {
    # cat=plugin.tx_slubentityfacts/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:slub_entityfacts/Resources/Private/Templates/
    # cat=plugin.tx_slubentityfacts/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:slub_entityfacts/Resources/Private/Partials/
    # cat=plugin.tx_slubentityfacts/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:slub_entityfacts/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_slubentityfacts/200/a; type=int+; label=Default storage PID
    storagePid =
  }
}

# cat=plugin.tx_slubentityfacts/file; type=string; label=Path to template root (FE)
[compatVersion = 8.7.0]
    plugin.tx_slubentityfacts.view.templateRootPath = EXT:slub_entityfacts/Resources/Private/Templates/
[else]
    # backward compatibility TYPO3 version 7.6.x only
    plugin.tx_slubentityfacts.view.templateRootPath = EXT:slub_entityfacts/Resources/Private/Templates76/
[global]
