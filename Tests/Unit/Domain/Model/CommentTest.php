<?php
namespace Pluswerk\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Patrick Lobacher <patrick@lobacher.de>
 */
class CommentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Pluswerk\Simpleblog\Domain\Model\Comment
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Pluswerk\Simpleblog\Domain\Model\Comment();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCommentReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getComment()
        );
    }

    /**
     * @test
     */
    public function setCommentForStringSetsComment()
    {
        $this->subject->setComment('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'comment',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommentdateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getCommentdate()
        );
    }

    /**
     * @test
     */
    public function setCommentdateForDateTimeSetsCommentdate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setCommentdate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'commentdate',
            $this->subject
        );
    }
}
