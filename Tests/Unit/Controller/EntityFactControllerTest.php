<?php
namespace Slub\SlubEntityfacts\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Sebastian Semsker <sebastian.semsker@slub-dresden.de>
 */
class EntityFactControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Slub\SlubEntityfacts\Controller\EntityFactController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Slub\SlubEntityfacts\Controller\EntityFactController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllEntityFactsFromRepositoryAndAssignsThemToView()
    {

        $allEntityFacts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $entityFactRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $entityFactRepository->expects(self::once())->method('findAll')->will(self::returnValue($allEntityFacts));
        $this->inject($this->subject, 'entityFactRepository', $entityFactRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('entityFacts', $allEntityFacts);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenEntityFactToView()
    {
        $entityFact = new \Slub\SlubEntityfacts\Domain\Model\EntityFact();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('entityFact', $entityFact);

        $this->subject->showAction($entityFact);
    }
}
