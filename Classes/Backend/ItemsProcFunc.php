<?php
namespace Slub\SlubEntityfacts\Backend;

/***
 * This file is part of the "slubentityfacts" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * 
 *  (c) 2021 Tobias Kreße <Tobias.Kresse@slub-dresden.de>, SLUB Dresden
 * 
 ***/

class  ItemsProcFunc
{
  /**
  * populating the option for links
  *
  * @param array &$config configuration array
  */
  public function user_sameAsSelected(array &$config)
  {
    $search = $config['row']['settings.entityfacts.personality'];

    //api commmunication and decoding
    $apiAnswer = file_get_contents('http://hub.culturegraph.org/entityfacts/'.$search);
    $apiAnswerDecode = json_decode ($apiAnswer, true);

    
    //constructing the wanted array
    foreach ($apiAnswerDecode["sameAs"] as $item) 
    {
      $newItems[] = 
      [$item['collection']['name'],$item['collection']['abbr']];
    }
    $config['items'] = $newItems;
  }
}