<?php
namespace Pluswerk\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Patrick Lobacher <patrick@lobacher.de>
 */
class BlogTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Pluswerk\Simpleblog\Domain\Model\Blog
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Pluswerk\Simpleblog\Domain\Model\Blog();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPostsReturnsInitialValueForPost()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPosts()
        );
    }

    /**
     * @test
     */
    public function setPostsForObjectStorageContainingPostSetsPosts()
    {
        $post = new \Pluswerk\Simpleblog\Domain\Model\Post();
        $objectStorageHoldingExactlyOnePosts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePosts->attach($post);
        $this->subject->setPosts($objectStorageHoldingExactlyOnePosts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePosts,
            'posts',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPostToObjectStorageHoldingPosts()
    {
        $post = new \Pluswerk\Simpleblog\Domain\Model\Post();
        $postsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $postsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($post));
        $this->inject($this->subject, 'posts', $postsObjectStorageMock);

        $this->subject->addPost($post);
    }

    /**
     * @test
     */
    public function removePostFromObjectStorageHoldingPosts()
    {
        $post = new \Pluswerk\Simpleblog\Domain\Model\Post();
        $postsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $postsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($post));
        $this->inject($this->subject, 'posts', $postsObjectStorageMock);

        $this->subject->removePost($post);
    }
}
