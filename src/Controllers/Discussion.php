<?php
namespace Controllers;

use \BusinessLogic\AuthenticationManager;
use DataLayer\DataLayerFactory;

class Discussion extends Controller {
    const PARAM_PAGE = 'pnr';

    const ITEMS_PER_PAGE = 1;
    const SHOWN_ADJACENT_PAGES = 5;

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

}