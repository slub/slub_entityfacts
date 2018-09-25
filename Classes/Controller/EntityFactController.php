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
        $search = $this->settings['entityfacts']['personality'];
        
        $arguments = $this->request->getArguments();
        //print_r($arguments);
        
        if ($arguments['search']){
            $search = $arguments['search'];
        } 
        
		$apiAnswer = file_get_contents('http://hub.culturegraph.org/entityfacts/'.$search);
		$apiAnswerDecode = json_decode ($apiAnswer, true);
		
		$apiAnswerDecode['context'] = $apiAnswerDecode['@context'];
		$apiAnswerDecode['id'] = $apiAnswerDecode['@id'];
		$apiAnswerDecode['type'] = $apiAnswerDecode['@type'];
		
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
