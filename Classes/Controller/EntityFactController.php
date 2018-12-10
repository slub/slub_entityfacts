<?php
namespace Slub\SlubEntityfacts\Controller;

/***
 *
 * This file is part of the "slubentityfacts" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Sebastian Semsker <sebastian.semsker@slub-dresden.de>, SLUB Dresden
 *
 ***/

/**
 * EntityFactController
 */
class EntityFactController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action show
     *
     * @return void
     */
    public function showAction()
    {
        //$entityFacts = $this->entityFactRepository->findAll();

        //Get the nine chars long entity facts id from Flexform that the user wants to call
        $search = $this->settings['entityfacts']['personality'];

        //Get the selected entity type from Flexform
        $selection = $this->settings['entityfacts']['selection'];

        $arguments = $this->request->getArguments();
        //print_r($arguments);

        if ($arguments['search']){
            $search = $arguments['search'];
        }

        //Call the API and write the decoded JSON to the array
        if ($this->settings['ownindex']) {
            $apiAnswer = file_get_contents($this->settings['entityfacts']['index'].$search);
        }
        else {
            $apiAnswer = file_get_contents('http://hub.culturegraph.org/entityfacts/'.$search);
        }

        //Replace @id for easier calling of informations (no value with "@id" expected)
        $apiAnswerClean = str_replace('"@id"', '"atid"', $apiAnswer);

        $apiAnswerDecode = json_decode ($apiAnswerClean, true);


        //Workaround to get rid of the'@'
        $apiAnswerDecode['context'] = $apiAnswerDecode['@context'];
        //$apiAnswerDecode['id'] = $apiAnswerDecode['@id'];
        $apiAnswerDecode['type'] = $apiAnswerDecode['@type'];
var_dump($apiAnswerDecode);


        //write the user sorted selection given by Flexform into helper array
        $multiSelectArray1 = explode(",",($this->settings['entityfacts'][$selection.'facts']));

        if ($this->settings['entityfacts'][$selection.'facts']) {
            //Fill new array with original infos to have an easier use in Fluid
            foreach ($multiSelectArray1 as $item) {
                $viewArray[$item] = $apiAnswerDecode[$item];
            }
        } else {
            // no fact is selected --> show all
            $viewArray = $apiAnswerDecode;
        }

        $viewArray[describedBy] = $apiAnswerDecode[describedBy];

        //write the user sorted selection given by Flexform into another helper array (special customer request to select specific entities from sameAs)
        $multiSelectArray2 = explode(",",($this->settings['entityfacts']['sameAsSelected']));

        $sameAsArray = [];

        //Same function like the first array but with additional customisation
        foreach ($multiSelectArray2 as $item) {
            foreach ($apiAnswerDecode['sameAs'] as $sameAs) {
                if ($sameAs['collection']['abbr'] == $item || empty($this->settings['entityfacts']['sameAsSelected'])) {
                    $sameAsArray[ $sameAs['collection']['abbr'] ] = $sameAs;
                }
            }
        }


        $this->view->assign('sameAsArray', $sameAsArray);
        $this->view->assign('viewArray', $viewArray);
        //$this->view->assign('multiSelectArray', $multiSelectArray);
        $this->view->assign('apiAnswerDecode', $apiAnswerDecode);
        //$this->view->assign('entityFact', $entityFact);
    }
}
