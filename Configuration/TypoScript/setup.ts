plugin.tx_slubentityfacts {
  view {
    templateRootPaths.0 = EXT:slub_entityfacts/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_slubentityfacts.view.templateRootPath}
    partialRootPaths.0 = EXT:slub_entityfacts/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_slubentityfacts.view.partialRootPath}
    layoutRootPaths.0 = EXT:slub_entityfacts/Resources/Private/Layouts/
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

page {
    includeCSS {
        slubentityfacts = EXT:slub_entityfacts/Resources/Public/Css/SlubEntityfacts.css
    }
}
