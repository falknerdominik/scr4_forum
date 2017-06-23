<?php
namespace BusinessLogic;

use DataLayer\DataLayerFactory;

class DiscussionManager {
    /**
     * @param $page integer page to get
     * @param $nrOfItemsPerPage integer per page
     * @return array of discussions
     */
    public static function getDiscussionPage($page, $nrOfItemsPerPage) {
        return DataLayerFactory::getDiscussionDataLayer()->getDiscussionPage($page, $nrOfItemsPerPage);
    }

    public static function getPaginationArray($nrOfItemsPerPage, $currentPage, $wantedAdjacentPages) {
        // get all items within the range
        $result = range(1, ceil(sizeof(self::getDiscussions()) / $nrOfItemsPerPage));

        if (isset($currentPage, $wantedAdjacentPages) === true)
        {
            if (($adjacents = floor($wantedAdjacentPages / 2) * 2 + 1) >= 1)
            {
                $result = array_slice($result, max(0, min(count($result) - $adjacents, intval($currentPage) - ceil($adjacents / 2))), $adjacents);
            }
        }

        return $result;
    }

    public static function createDiscussion($name, $creatorId) {
        return DataLayerFactory::getDiscussionDataLayer()->createDiscussion($name, date('Y-m-d', time()), $creatorId);
    }

    public static function getDiscussionById($discussionId) {
        return DataLayerFactory::getDiscussionDataLayer()->getDiscussionById($discussionId);
    }

    public static function deleteDiscussion($discussionId) {
        return DataLayerFactory::getDiscussionDataLayer()->deleteDiscussion($discussionId);
    }

    public static function getDiscussions() {
        return DataLayerFactory::getDiscussionDataLayer()->getDiscussions();
    }

}
