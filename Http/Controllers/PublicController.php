<?php

namespace Modules\Search\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Page\Entities\Page;
use Modules\Page\Repositories\PageRepository;

class PublicController extends BasePublicController
{
  /**
   * @var PageRepository
   */
  private $page;

  public function __construct(PageRepository $page)
  {
    parent::__construct();
    $this->page = $page;
  }

  /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $query = $request->get('s');

        $pages = collect();

        if($query) {
          $pages = $this->page->search($query);
        }

        $this->seo()->setTitle('ARAMA '.$query);

        return view('search::index', compact('pages', 'query'));
    }
}
