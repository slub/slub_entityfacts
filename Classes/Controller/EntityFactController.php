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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        //$entityFacts = $this->entityFactRepository->findAll();
        //$this->view->assign('entityFacts', $entityFacts);
        
        //Get the nine chars long entity facts id from Flexform that the user wants to call
        $search = $this->settings['entityfacts']['personality'];    
        
        //Get the selected entity type from Flexform
        $selection = $this->settings['entityfacts']['selection'];       
        
        $arguments = $this->request->getArguments();
        //print_r($arguments);
        
        if ($arguments['search']){
            $search = $arguments['search'];
        } 
        
		$apiAnswer = file_get_contents('http://hub.culturegraph.org/entityfacts/'.$search);
		$apiAnswerDecode = json_decode ($apiAnswer, true);
		
		//Workaround to get rid of the'@'
		$apiAnswerDecode['context'] = $apiAnswerDecode['@context'];       
		$apiAnswerDecode['id'] = $apiAnswerDecode['@id'];
		$apiAnswerDecode['type'] = $apiAnswerDecode['@type'];
		
		//write the user sorted selection given by Flexform into helper array
        $multiSelectArray1 = explode(",",($this->settings['entityfacts'][$selection.'facts'])); 
        
        //write the user sorted selection given by Flexform into another helper array (special customer request to select specific entities from sameAs)
        $multiSelectArray2 = explode(",",($this->settings['entityfacts']['sameAsSelected']));       
        
        $sameAsArray = [];
        
        //Fill new array with original infos to have an easier use in Fluid
        foreach ($multiSelectArray1 as $item) {                         
            $viewArray[$item] = $apiAnswerDecode[$item];
        }
        
        
        
        foreach ($multiSelectArray2 as $item) {  
            foreach ($apiAnswerDecode['sameAs'] as $sameAs) {
            
                if ($sameAs['collection']['abbr'] == $item) {
                    $sameAsArray[ $sameAs['collection']['abbr'] ] = $sameAs;
                }
            }
            
        }
        
		//print_r($apiAnswerDecode['sameAs']);
		
		
		$this->view->assign('sameAsArray', $sameAsArray);
		$this->view->assign('viewArray', $viewArray);
		//$this->view->assign('multiSelectArray', $multiSelectArray);
        $this->view->assign('apiAnswerDecode', $apiAnswerDecode);
    }

    /**
     * action show
     *
     * @param \Slub\SlubEntityfacts\Domain\Model\EntityFact $entityFact
     * @return void
     */
    public function showAction(\Slub\SlubEntityfacts\Domain\Model\EntityFact $entityFact)
    {
        $this->view->assign('entityFact', $entityFact);
    }
}
