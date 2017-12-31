<?php
namespace Pluswerk\Simpleblog\Domain\Model;

/***
 *
 * This file is part of the "Simple Blog Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Patrick Lobacher <patrick@lobacher.de>, +Pluswerk AG
 *
 ***/

/**
 * Comment
 */
class Comment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Comment text
     *
     * @var string
     * @validate NotEmpty
     */
    protected $comment = '';

    /**
     * Comment date
     *
     * @var \DateTime
     */
    protected $commentdate = null;

    /**
     * Returns the comment
     *
     * @return string $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the comment
     *
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Returns the commentdate
     *
     * @return \DateTime $commentdate
     */
    public function getCommentdate()
    {
        return $this->commentdate;
    }

    /**
     * Sets the commentdate
     *
     * @param \DateTime $commentdate
     * @return void
     */
    public function setCommentdate(\DateTime $commentdate)
    {
        $this->commentdate = $commentdate;
    }
}
