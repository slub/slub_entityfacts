plugin.tx_slubentityfacts {
  view {
    templateRootPaths.1 = {$plugin.tx_slubentityfacts.view.templateRootPath}
    partialRootPaths.1 = {$plugin.tx_slubentityfacts.view.partialRootPath}
    layoutRootPaths.1 = {$plugin.tx_slubentityfacts.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_slubentityfacts.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

[compatVersion = 8.7.0]
[else]
plugin.tx_slubentityfacts.view.templateRootPaths.1 = EXT:slub_entityfacts/Resources/Private/Templates76/
[global]

page {
    includeCSS {
        slubentityfacts = EXT:slub_entityfacts/Resources/Public/Css/SlubEntityfacts.css
    }
}
