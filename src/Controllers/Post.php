<?php
namespace Controllers;

use DataLayer\DataLayerFactory;

class Post extends Controller {
    const PARAM_POST_ID = 'pid';
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