<?php
namespace Pluswerk\Simpleblog\Domain\Repository;

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
 * The repository for Blogs
 */
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findSearchWord($search, $words = array('Tick', 'Trick', 'Track'))
    {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalOr(
                $query->logicalAnd(
                    $query->like('title', '%'.$search.'%'),
                    $query->equals('description', '')
                ),
                $query->logicalAnd(
                    $query->equals('title', 'TYPO3'),
                    $query->like('description', '%ist toll%')
                ),
                $query->in('title', $words)
            )
        );
        return $query->execute();
    }

    /**
     * @param string $search
     */
    public function findSearchForm($search)
    {
        $query = $this->createQuery();
        $query->matching(
            $query->like('title','%'.$search.'%')
        );
        $query->setOrderings(array('title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $query->setLimit(5);
        return $query->execute();
    }

}
