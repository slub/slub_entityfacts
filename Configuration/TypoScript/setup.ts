
plugin.tx_slubentityfacts_entityfactslisting {
  view {
    templateRootPaths.0 = EXT:slub_entityfacts/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_slubentityfacts_entityfactslisting.view.templateRootPath}
    partialRootPaths.0 = EXT:slub_entityfacts/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_slubentityfacts_entityfactslisting.view.partialRootPath}
    layoutRootPaths.0 = EXT:slub_entityfacts/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_slubentityfacts_entityfactslisting.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_slubentityfacts_entityfactslisting.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_slubentityfacts._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-slub-entityfacts table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-slub-entityfacts table th {
        font-weight:bold;
    }

    .tx-slub-entityfacts table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
