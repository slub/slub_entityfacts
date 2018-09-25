<?php
namespace Slub\SlubEntityfacts\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Sebastian Semsker <sebastian.semsker@slub-dresden.de>
 */
class EntityFactTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Slub\SlubEntityfacts\Domain\Model\EntityFact
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Slub\SlubEntityfacts\Domain\Model\EntityFact();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
