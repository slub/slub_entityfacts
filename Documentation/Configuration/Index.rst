.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration Reference
=======================

The following documentation was tested with TYPO3 7.6.x - 9.5.x. The extension has no further dependecies.

You can install the extension automatically via the TYPO3 extension manager, via
composer or semiautomatically via GitHub. The automatic way is straight forward
so in the following the GitHub process is explained. At first checkout the repository:

    git clone https://github.com/slub/slub_entityfacts

The extension key is "slub_entityfacts". Thus the following directory must keep
the SLUB_EntityFacts in your document root:

    typo3conf/ext/slub_entityfacts/

TypoScript Template
-------------------

Please include the static TypoScript Template "SLUB DNB Entity Facts" to your page.
This will include a default CSS file and will configure to use the proper fluid template.
