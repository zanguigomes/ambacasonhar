<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Organism;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use App\Models\Document;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Manager;
use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{

    //Home
    public function index()
    {

        if (!$mainHeading = Post::where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->first())
            return redirect()->back();

        elseif (!$secondaryEntry = Post::where('active', 1)
            ->where('slug', '!=', $mainHeading->slug)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->first())
            return redirect()->back();

        elseif (!$thirdEntry = Post::where('active', 1)
            ->where('slug', '!=', $mainHeading->slug)
            ->where('slug', '!=', $secondaryEntry->slug)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->first())
            return redirect()->back();

        elseif (!$sliders  = Slider::where('active', 1)
            ->get())
            return redirect()->back();

        elseif (!$categories  = Category::where('active', 1)->get())
            return redirect()->back();

        elseif (!$fourthEntry   = Post::where('active', 1)
            ->where('slug', '!=', $mainHeading->slug)
            ->where('slug', '!=', $secondaryEntry->slug)
            ->where('slug', '!=', $thirdEntry->slug)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->first())
            return redirect()->back();

        elseif (!$fifthEntry = Post::where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->where('slug', '!=', $mainHeading->slug)
            ->where('slug', '!=', $secondaryEntry->slug)
            ->where('slug', '!=', $thirdEntry->slug)
            ->where('slug', '!=', $fourthEntry->slug)
            ->where('active', 1)
            ->orderBy('published_at', 'desc')
            ->first())

            return redirect()->back();

        elseif (!$sixth  = Post::where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->where('slug', '!=', $mainHeading->slug)
            ->where('slug', '!=', $secondaryEntry->slug)
            ->where('slug', '!=', $thirdEntry->slug)
            ->where('slug', '!=', $fourthEntry->slug)
            ->where('slug', '!=', $fifthEntry->slug)
            ->orderBy('published_at', 'desc')
            ->first())

            return redirect()->back();

        elseif (!$blog   = Post::where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->where('slug', '!=', $mainHeading->slug)
            ->where('slug', '!=', $secondaryEntry->slug)
            ->where('slug', '!=', $thirdEntry->slug)
            ->where('slug', '!=', $fourthEntry->slug)
            ->where('slug', '!=', $fifthEntry->slug)
            ->where('slug', '!=', $sixth->slug)
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get())

            return redirect()->back();

        elseif (!$moreNews = Post::where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->offset(5)
            ->limit(12)
            ->orderBy('published_at', 'desc')
            ->get())

            return redirect()->back();

        elseif (!$projects   = Project::where('active', true)
            ->limit(2)
            ->get())

            return redirect()->back();

        elseif (!$documents   = Document::where('active', 1)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get())

            return redirect()->back();

        elseif (!$lastGalery  = Gallery::where('active', 1)->orderBy('id', 'desc')->first())
            return redirect()->back();

        elseif (!$afterLastGalery  = Gallery::where('active', 1)->where('slug', '!=', $lastGalery->slug)->orderBy('id', 'desc')->first())
            return redirect()->back();

        elseif (!$galleryList  = Gallery::where('active', 1)->where('slug', '!=', $lastGalery->slug)->where('slug', '!=', $afterLastGalery->slug)->orderBy('id', 'desc')->limit(3)->get())

            return redirect()->back();

        else

            return view(
                'site-pages.home',
                compact(
                    'mainHeading',
                    'secondaryEntry',
                    'thirdEntry',
                    'sliders',
                    'categories',
                    'fourthEntry',
                    'fifthEntry',
                    'sixth',
                    'blog',
                    'moreNews',
                    'projects',
                    'documents',
                    'lastGalery',
                    'afterLastGalery',
                    'galleryList'
                )
            );
    }

    public function page(Request $request)
    {
        $url    = explode('/', $request->getPathInfo());

        $categories     = Category::all()->where('active', 1)->random(10);

        switch ($url) {

            case ($url[1] == 'sobre-ambaca'):

                if (!$page  = Page::where('key', $url[2])->where('active', 1)->first())
                    return redirect()->back();

                elseif (!$lastNews   = Post::whereDate('published_at', '<=', Carbon::now())
                    ->where('active', 1)
                    ->limit(5)
                    ->orderBy('published_at', 'desc')
                    ->get())

                    return redirect()->back();

                else

                    $pagesList     = Page::where('active', 1)
                        ->where('key', '!=', $url[2])
                        ->where('key', '!=', 'comuna-bindo')
                        ->where('key', '!=', 'comuna-luinga')
                        ->where('key', '!=', 'comuna-tango')
                        ->where('key', '!=', 'comuna-maua')
                        ->get()
                        ->random(8);

                return view('site-pages.page', compact('page', 'pagesList', 'lastNews'));
                break;

            case ($url[1] == 'blog'):

                if (!$blogHeading   = Post::where('active', 1)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->orderBy('published_at', 'desc')
                    ->first())

                    return redirect()->back();

                elseif (!$blogSecondaryEntry = Post::where('active', 1)
                    ->where('slug', '!=', $blogHeading->slug)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->orderBy('published_at', 'desc')
                    ->first())
                    return redirect()->back();

                elseif (!$blogThirdEntry = Post::where('active', 1)
                    ->where('slug', '!=', $blogHeading->slug)
                    ->where('slug', '!=', $blogSecondaryEntry->slug)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->orderBy('published_at', 'desc')
                    ->first())
                    return redirect()->back();

                elseif (!$blog   = Post::where('active', 1)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->where('slug', '!=', $blogHeading->slug)
                    ->where('slug', '!=', $blogSecondaryEntry->slug)
                    ->where('slug', '!=', $blogThirdEntry->slug)
                    ->orderBy('published_at', 'desc')
                    ->paginate(20))
                    return redirect()->back();

                else

                    $totalBlog = Post::where('active', 1)
                        ->whereDate('published_at', '<=', Carbon::now())
                        ->get();

                return view('site-pages.blog', compact(
                    'blogHeading',
                    'blogSecondaryEntry',
                    'blogThirdEntry',
                    'blog',
                    'categories',
                    'totalBlog'
                ));

                break;

            case ($url[1] == 'busca'):

                $search  = $request->get('s');

                if (!$pages     = Page::where('active', true)
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('head_line', 'like', '%' . $search . '%')
                            ->orWhere('content', 'like', '%' . $search . '%');
                    })->get())
                    return redirect()->back();

                elseif (!$posts   = Post::where('active', true)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('head_line', 'like', '%' . $search . '%')
                            ->orWhere('content', 'like', '%' . $search . '%');
                    })->get())
                    return redirect()->back();

                elseif (!$projects  = Project::where('active', true)
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('head_line', 'like', '%' . $search . '%')
                            ->orWhere('content', 'like', '%' . $search . '%');
                    })->get())
                    return redirect()->back();

                elseif (!$organisms  = Organism::where('active', true)
                    ->where('type', '!=', 'serviço')
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('head_line', 'like', '%' . $search . '%')
                            ->orWhere('content', 'like', '%' . $search . '%');
                    })->get())
                    return redirect()->back();

                elseif (!$services  = Organism::where('active', true)
                    ->where('type', 'serviço')
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('head_line', 'like', '%' . $search . '%')
                            ->orWhere('content', 'like', '%' . $search . '%');
                    })->get())
                    return redirect()->back();
                else

                    $result = count($pages) + count($posts) + count($projects);


                if ($search == '')

                    return redirect()->back();

                elseif ($search == 0)

                    return back()->with("error", "Ocorreu um erro inesperado: ");

                else

                    return view('site-pages.search', compact('pages', 'search', 'posts', 'projects', 'organisms', 'services', 'result'));
                break;

            case ($url[1] == 'projectos'):

                if (!$projHeadings   = Project::where('active', 1)
                    ->limit(2)
                    ->orderBy('created_at', 'desc')
                    ->get())
                    return redirect()->back();

                elseif (!$blog   = Post::where('active', 1)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->orderBy('published_at', 'desc')
                    ->paginate(18))
                    return redirect()->back();

                else

                    return view('site-pages.projects', compact('projHeadings', 'blog'));

                break;

            case ($url[1] == 'projecto'):

                if (!$single = Project::where('active', true)
                    ->where('slug', $url[2])
                    ->first())
                    return redirect()->back();

                elseif (!$categories     = Category::all()
                    ->where('active', 1))
                    return redirect()->back();

                elseif (!$pagesList = Page::where('active', 1)
                    ->where('key', '!=', $url[2])
                    ->get()
                    ->random(8))

                    return redirect()->back();

                else

                    return view('site-pages.project', compact('single', 'categories', 'pagesList'));

                break;

            case ($url[1] == 'entidades'):

                if (!$entities   = Organism::where('active', 1)
                    ->where('type', '!=', 'Serviço')
                    ->orderBy('id', 'asc')
                    ->paginate(20))

                    return redirect()->back();

                else

                    $pagesList     = Page::where('active', 1)
                        ->where('key', '!=', 'comuna-bindo')
                        ->where('key', '!=', 'comuna-luinga')
                        ->where('key', '!=', 'comuna-tango')
                        ->where('key', '!=', 'comuna-maua')
                        ->get()
                        ->random(8);

                return view('site-pages.entities', compact('entities', 'pagesList'));

                break;

            case ($url[1] == 'entidade'):

                if (!$single   = Organism::where('active', 1)
                    ->where('slug', $url[2])
                    ->where('type', '!=', 'Serviço')
                    ->first())
                    return redirect()->back();

                elseif (!$pagesList = Page::where('active', 1)
                    ->where('key', '!=', $url[2])
                    ->get()
                    ->random(8))
                    return redirect()->back();
                else

                    return view('site-pages.entity', compact('single', 'pagesList'));

                break;

            case ($url[1] == 'servicos'):

                if (!$services   = Organism::where('active', 1)
                    ->where('type', 'Serviço')
                    ->orderBy('id', 'asc')
                    ->paginate(20))
                    return redirect()->back();
                else

                    return view('site-pages.services', compact('services'));

                break;

            case ($url[1] == 'servico'):

                if (!$single   = Organism::where('active', 1)
                    ->where('slug', $url[2])
                    ->where('type', 'Serviço')
                    ->first())
                    return redirect()->back();

                elseif (!$pagesList = Page::where('active', 1)
                    ->where('key', '!=', $url[2])
                    ->get()
                    ->random(8))
                    return redirect()->back();
                else

                    return view('site-pages.service', compact('single', 'pagesList'));

                break;

            case ($url[1] == 'documentos'):

                if (!$documents     = Document::where('active', 1)->get())
                    return redirect()->back();

                else
                    return view('site-pages.documents', compact('documents'));

                break;

            case ($url[1] == 'banco-de-imagens'):

                if (!$lastGalery  = Gallery::where('active', 1)
                    ->orderBy('id', 'desc')
                    ->first())
                    return redirect()->back();

                elseif (!$afterLastGalery  = Gallery::where('active', 1)
                    ->where('slug', '!=', $lastGalery->slug)
                    ->orderBy('id', 'desc')
                    ->first())
                    return redirect()->back();

                elseif (!$galleryList  = Gallery::where('active', 1)
                    ->where('slug', '!=', $lastGalery->slug)
                    ->where('slug', '!=', $afterLastGalery->slug)
                    ->orderBy('id', 'desc')
                    ->limit(4)
                    ->get())

                    return redirect()->back();

                else

                    return view('site-pages.photo-galleries', compact('lastGalery', 'afterLastGalery', 'galleryList'));

                break;

            case ($url[1] == 'galeria'):

                if (!$gallery     = Gallery::where('slug', $url[2])->where('active', 1)->first())
                    return redirect()->back();
                else
                    return view('site-pages.gallery', compact('gallery'));

                break;

            case ($url[1] == 'galeria-de-administradores'):

                if (!$currentManager   = Manager::where('active', 1)
                    ->orderBy('id', 'desc')
                    ->first())

                    return redirect()->back();

                elseif (!$exManagers   = Manager::where('active', 1)
                    ->where('slug', '!=', $currentManager->slug)
                    ->orderBy('created_at', 'desc')
                    ->paginate(16))

                    return redirect()->back();

                else

                    $pagesList     = Page::where('active', 1)
                        ->where('key', '!=', 'comuna-bindo')
                        ->where('key', '!=', 'comuna-luinga')
                        ->where('key', '!=', 'comuna-tango')
                        ->where('key', '!=', 'comuna-maua')
                        ->get()
                        ->random(8);

                return view('site-pages.managers-gallery', compact('currentManager', 'exManagers', 'pagesList'));

                break;

            case ($url[1] == 'mapa-do-site'):

                if (!$pages = Page::where('active', 1)
                    ->get())
                    return redirect()->back();

                elseif (!$blog   = Post::where('active', 1)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->orderBy('published_at', 'desc')
                    ->get())
                    return redirect()->back();

                elseif (!$documents     = Document::where('active', 1)->get())
                    return redirect()->back();

                else

                    return view('site-pages.site-map', compact('pages', 'documents', 'blog'));

                break;

            case ($url[1] == 'perguntas-frequentes'):

                if (!$faq = Faq::where('active', 1)
                    ->get())
                    return redirect()->back();

                /* elseif (!$blog   = Post::where('active', 1)
                    ->whereDate('published_at', '<=', Carbon::now())
                    ->orderBy('published_at', 'desc')
                    ->get())
                    return redirect()->back();

                elseif (!$documents     = Document::where('active', 1)->get())
                    return redirect()->back(); */

                else

                    return view('site-pages.faq', compact('faq'));

                break;

            default:
                return view('site-pages.home');
        }
    }

    public function post(Request $request)
    {
        $url    = explode('/', $request->getPathInfo());

        //dd($url[2]);

        if (!$page     = Post::where('slug', $url[2])
            ->where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->first())
            return redirect()->back();

        if (!$lastNews   = Post::where('slug', '!=', $page->slug)
            ->whereDate('published_at', '<=', Carbon::now())
            ->where('active', 1)
            ->limit(5)
            ->orderBy('published_at', 'desc')
            ->get())
            return redirect()->back();

        else

            $nextPost = Post::query()
                ->where('active', true)
                ->where('published_at', '<=', Carbon::now())
                ->where('published_at', '<', $page->published_at)
                ->orderBy('published_at', 'desc')
                ->limit(1)
                ->first();

        $prevPost = Post::query()
            ->where('active', true)
            ->where('published_at', '<=', Carbon::now())
            ->where('published_at', '>', $page->published_at)
            ->orderBy('published_at', 'asc')
            ->limit(1)
            ->first();

        return view('site-pages.page', compact('page', 'lastNews', 'nextPost', 'prevPost'));
    }

    public function category($cat)
    {
        if (!$category       = Category::where('slug', $cat)->where('active', 1)->first())

            return redirect()->back();

        elseif (!$catPosts   = Post::where('category_id', $category->id)->where('active', 1)->paginate(10))

            return redirect()->back();

        elseif (!$catHeading   = Post::where('category_id', $category->id)->where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->first())

            return redirect()->back();

        elseif (!$catSecondaryEntry = Post::where('category_id', $category->id)->where('active', 1)
            ->where('slug', '!=', $catHeading->slug)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->first())
            return redirect()->back();

        elseif (!$catThirdEntry = Post::where('category_id', $category->id)->where('active', 1)
            ->where('slug', '!=', $catHeading->slug)
            ->where('slug', '!=', $catSecondaryEntry->slug)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->first())
            return redirect()->back();

        elseif (!$catBlog   = Post::where('category_id', $category->id)->where('active', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->where('slug', '!=', $catHeading->slug)
            ->where('slug', '!=', $catSecondaryEntry->slug)
            ->where('slug', '!=', $catThirdEntry->slug)
            ->orderBy('published_at', 'desc')
            ->paginate(20))

            return redirect()->back();

        else

            $totalCatPosts = count($catPosts);


        return view('site-pages.category', compact('category', 'catPosts', 'totalCatPosts','catHeading','catSecondaryEntry','catThirdEntry','catBlog'));
    }
}
