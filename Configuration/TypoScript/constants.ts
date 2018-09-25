
plugin.tx_slubentityfacts_entityfactslisting {
  view {
    # cat=plugin.tx_slubentityfacts_entityfactslisting/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:slub_entityfacts/Resources/Private/Templates/
    # cat=plugin.tx_slubentityfacts_entityfactslisting/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:slub_entityfacts/Resources/Private/Partials/
    # cat=plugin.tx_slubentityfacts_entityfactslisting/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:slub_entityfacts/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_slubentityfacts_entityfactslisting//a; type=string; label=Default storage PID
    storagePid =
  }
}
