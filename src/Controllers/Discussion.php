<?php
namespace Controllers;

use BusinessLogic\AuthenticationManager;
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
           'discussions' => DataLayerFactory::getDiscussionDataLayer()->getDiscussionPage($currentPage, self::ITEMS_PER_PAGE),
           'currentPage' => $currentPage,
           'paginationArray' => DataLayerFactory::getDiscussionDataLayer()->getPaginationArray(self::ITEMS_PER_PAGE, $currentPage, self::SHOWN_ADJACENT_PAGES)
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

        $newid = DataLayerFactory::getDiscussionDataLayer()->createDiscussion($this->getParam(self::PARAM_DISCUSSION_NAME), time(), $user->getId());

        // check if we got an error from the db
        if($newid === null) {
            // log error .....
            $this->redirect('Index', 'Discussion');
        }

        // everything went fine send user to discussion:
        $this->redirect('Detail', 'Post', array('did' => $newid));
    }

    public function POST_Delete() {
        $discussionDataLayer = DataLayerFactory::getDiscussionDataLayer();
        $discussion = $discussionDataLayer->getDiscussionById($this->getParam(self::PARAM_DISCUSSION_ID));

        $errors = array();

        // error discussion not found -> redirect to
        if($discussion === null) {
            $errors[] = 'Discussion not found.';
        }


        if( sizeof($errors) === 0
            && AuthenticationManager::isAuthenticated()
            && $discussion->getCreator()->getId() !== AuthenticationManager::getAuthenticatedUser()->getId())
        {
            $errors[] = 'Not authorized.';
        }

        // everything is fine
        if(sizeof($errors) === 0 && $discussionDataLayer->deleteDiscussion($discussion->getId())) {
            return $this->redirect('Index', 'Discussion');
        } else {
            $errors[] = "Couldn't delete discussion";
        }

        return $this->renderView('discussion', array(
            'discussions' => DataLayerFactory::getDiscussionDataLayer()->getDiscussionPage(1, self::ITEMS_PER_PAGE),
            'currentPage' => 1,
            'paginationArray' => DataLayerFactory::getDiscussionDataLayer()->getPaginationArray(self::ITEMS_PER_PAGE, 1, self::SHOWN_ADJACENT_PAGES),
            'errors' => $errors
        ));
    }
}