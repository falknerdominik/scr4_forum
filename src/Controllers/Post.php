<?php
namespace Controllers;

use BusinessLogic\AuthenticationManager;
use DataLayer\DataLayerFactory;

class Post extends Controller {
    const PARAM_POST_ID = 'pid';
    const PARAM_DISCUSSION_ID = 'did';
    const PARAM_TEXT = 'text';
    const PARAM_SEARCH_TERM = 'term';

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

    public function POST_CREATE() {
        $errors = array();
        if(!AuthenticationManager::isAuthenticated()) {
            $errors[] = 'Please log in.';
        }

        if(!$this->hasParam(self::PARAM_DISCUSSION_ID) && !ctype_digit($this->getParam(self::PARAM_DISCUSSION_ID))) {
            $errors[] = 'No Discussion found.';
        }

        if(!$this->hasParam(self::PARAM_TEXT) || (strlen($this->getParam(self::PARAM_TEXT)) < 20)) {
            $errors[] = 'Please enter atleast 20 Characters';
        }

        if(sizeof($errors) === 0) {
            $id = DataLayerFactory::getDiscussionDataLayer()->createPost(
                $this->getParam(self::PARAM_DISCUSSION_ID),
                AuthenticationManager::getAuthenticatedUser()->getId(),
                $this->getParam(self::PARAM_TEXT)
            );

            if($id === 0) {
                $errors[] = "Couldn't create post";
            } else {
                return $this->redirect('Detail', 'Discussion', array(
                    'did' => $this->getParam(self::PARAM_DISCUSSION_ID),
                    'anchor' => "post_" . $id
                ));
            }
        }

        return $this->GET_Detail($errors);
    }

    public function GET_Detail($errors = null) {
        $discussionDataLayer = DataLayerFactory::getDiscussionDataLayer();
        $discussion = $discussionDataLayer->getDiscussionById($this->getParam(self::PARAM_DISCUSSION_ID));

        // check if we got a discussion
        if($discussion === null) {
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
            'term' => '',
            'errors' => isset($errors) ? $errors : null
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