<?php
namespace Controllers;

use DataLayer\DataLayerFactory;

class Discussion extends Controller {
    const PARAM_PAGE = 'pnr';
    const PARAM_POST_ID = 'pid';
    const PARAM_SEARCH_TERM = 'term';

    const ITEMS_PER_PAGE = 5;
    const SHOWN_ADJACENT_PAGES = 5;
    const PARAM_DISCUSSION_ID = 'did';

    public function GET_Index() {
        $currentPage = 1;
        if($this->hasParam(self::PARAM_PAGE)) {
            $currentPage = $this->getParam(self::PARAM_PAGE);
        }

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->renderView('discussion', array(
           'discussions' => DataLayerFactory::getDiscussionDataLayer()->getDiscussionPage($currentPage, self::ITEMS_PER_PAGE),
           'currentPage' => $currentPage,
           'paginationArray' => DataLayerFactory::getDiscussionDataLayer()->getPaginationArray(self::ITEMS_PER_PAGE, $currentPage, self::SHOWN_ADJACENT_PAGES)
        ));
    }

    public function POST_Create() {
        echo "Create";
    }

    public function POST_Delete() {
        if(!$this->hasParam(self::PARAM_POST_ID) && !ctype_digit($this->getParam(self::PARAM_POST_ID))) {
            return $this->redirect('Index', 'Home');
        }

        $dataLayer = DataLayerFactory::getDiscussionDataLayer();
        if($dataLayer->hasPost($this->getParam(self::PARAM_POST_ID))) {
            $dataLayer->deletePost($this->getParam(self::PARAM_POST_ID));
            return $this->redirect('Index', 'Discussion');
        }

        return $this->redirect('Index', 'Home');
    }

    public function GET_Detail() {
        $discussionDataLayer = DataLayerFactory::getDiscussionDataLayer();
        $discussion = $discussionDataLayer->getDiscussionById($this->getParam(self::PARAM_DISCUSSION_ID));

        // check if we got a discussion
        if($discussion == null) {
            // error send back to start page
            return $this->renderView('discussion', array(
                'discussions' => DataLayerFactory::getDiscussionDataLayer()->getDiscussionPage(1, self::ITEMS_PER_PAGE),
                'currentPage' => 1,
                'paginationArray' => DataLayerFactory::getDiscussionDataLayer()->getPaginationArray(self::ITEMS_PER_PAGE, 1, self::SHOWN_ADJACENT_PAGES),
                'errors' => array('No discussion found!')
            ));
        }

        $posts = $discussionDataLayer->getPostsForDiscussion($discussion->getId());

        return $this->renderView('posts', array(
            'discussion' => $discussion,
            'posts' => $posts,
            'term' => ''
        ));
    }

    public function GET_Search() {
        $posts = array();

        if($this->hasParam(self::PARAM_SEARCH_TERM) && strlen($this->getParam(self::PARAM_SEARCH_TERM)) > 0) {
            $posts = DataLayerFactory::getDiscussionDataLayer()->getPostsForSearchCriteria($this->getParam(self::PARAM_SEARCH_TERM));
        }

        return $this->renderView('search', array(
            'posts' => $posts,
            'term' => $this->getParam(self::PARAM_SEARCH_TERM)
        ));
    }
}