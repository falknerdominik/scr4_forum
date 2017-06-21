<?php
namespace Controllers;

use BusinessLogic\AuthenticationManager;
use BusinessLogic\DiscussionManager;
use DataLayer\DataLayerFactory;

class Discussion extends Controller {
    const PARAM_PAGE = 'pnr';
    const PARAM_POST_ID = 'pid';
    const PARAM_SEARCH_TERM = 'term';

    const ITEMS_PER_PAGE = 5;
    const SHOWN_ADJACENT_PAGES = 5;
    const PARAM_DISCUSSION_ID = 'did';
    const PARAM_DISCUSSION_NAME = 'dname';

    public function GET_Index() {
        $currentPage = 1;
        if($this->hasParam(self::PARAM_PAGE)) {
            $currentPage = $this->getParam(self::PARAM_PAGE);
        }

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->renderView('discussion', array(
           'discussions' => DiscussionManager::getDiscussionPage($currentPage, self::ITEMS_PER_PAGE),
           'currentPage' => $currentPage,
           'paginationArray' => DiscussionManager::getPaginationArray(self::ITEMS_PER_PAGE, $currentPage, self::SHOWN_ADJACENT_PAGES)
        ));
    }

    public function POST_Create() {
        // check for param
        if(!$this->hasParam(self::PARAM_DISCUSSION_NAME)) {
            $this->redirect('Index', 'Home');
        }

        // check if logged in
        if(!AuthenticationManager::isAuthenticated()) {
            $this->redirect('Index', 'Home');
        }

        $user = AuthenticationManager::getAuthenticatedUser();

        $newid = DiscussionManager::createDiscussion($this->getParam(self::PARAM_DISCUSSION_NAME), $user->getId());

        // check if we got an error from the db
        if($newid === null) {
            // log error .....
            $this->redirect('Index', 'Discussion');
        }

        // everything went fine send user to discussion:
        $this->redirect('Detail', 'Post', array('did' => $newid));
    }

    public function POST_Delete() {
        $discussion = DiscussionManager::getDiscussionById($this->getParam(self::PARAM_DISCUSSION_ID));

        $errors = array();

        // error discussion not found -> redirect to
        if($discussion === null) {
            $errors[] = 'Discussion not found.';
        }


        if( sizeof($errors) === 0 && !AuthenticationManager::isCurrentlyLoggedIn($discussion->getCreator()->getId())) {
            $errors[] = 'Not authorized.';
        }

        // everything is fine
        if(sizeof($errors) === 0 && DiscussionManager::deleteDiscussion($discussion->getId())) {
            return $this->redirect('Index', 'Discussion');
        } else {
            $errors[] = "Couldn't delete discussion";
        }

        return $this->renderView('discussion', array(
            'discussions' => DiscussionManager::getDiscussionPage(1, self::ITEMS_PER_PAGE),
            'currentPage' => 1,
            'paginationArray' => DiscussionManager::getPaginationArray(self::ITEMS_PER_PAGE, 1, self::SHOWN_ADJACENT_PAGES),
            'errors' => $errors
        ));
    }
}