<?php

namespace App\Http\Controllers;

use App\Models\StaticElement;
use App\Models\Article;
use App\Models\Regency;
use App\Models\PatientStatus;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $about = StaticElement::find(1);
        preg_match('/^([^.!?]*[.!?]+){0,2}/', strip_tags($about->contents), $about);
        $regencies = Regency::whereHas('patients')->withCount('patients')->get();
        $articles = Article::latest()->category(2)->take(3)->get();
        return view('web.index', [
            'about' => $about,
            'articles' => $articles,
            'regencies' => $regencies,
        ]);
    }

    public function about()
    {
        $abouts = StaticElement::get();
        // dd($abouts);
        return view('web.tentang', [
            'profile' => $abouts->find(1),
            'visimisi' => $abouts->find(2),
            'structure' => $abouts->find(3)
        ]);
    }

    public function structur()
    {
        return view('tentang.struktur');
    }

    public function info()
    {
        $infos = Article::oldest()->category(1)->get();
        return view('web.infotbc', ['infos' => $infos]);
    }

    public function showInfo(Article $article)
    {
        return view('web.showInfotbc', ['info' => $article]);
    }

    public function case()
    {
        // jumlah patient tiap status di tiap regency
        $regencies = Regency::count('status')->get();
        return view('web.kasustbc', [
            'regencies' => $regencies,
        ]);
    }

    public function showCase(Regency $regency)
    {
        $regency = Regency::count('detailStatus')->find($regency->id);
        return view('web.showKasustbc', compact('regency'));
    }

    public function article()
    {
        $articles = Article::latest()->category(2)->get()->paginate(12);
        return view('web.artikel', ['articles' => $articles]);
    }

    public function showArticle(Article $article)
    {
        return view('web.showArtikel', [
            'article' => $article
        ]);
    }

    public function action()
    {
        $actions = Article::latest()->category(3)->get()->paginate(12);
        return view('web.kegiatan', ['actions' => $actions]);
    }

    public function showAction(Article $article)
    {
        return view('web.showKegiatan', ['action' => $article]);
    }

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            switch ($request->target) {
                case 'info-tbc':
                    $results = Article::latest()->where('category_id', 1)->where('title', 'like', '%' . $request->search . '%')->get();
                    break;
                case 'artikel':
                    $results = Article::latest()->where('category_id', 2)->where('title', 'like', '%' . $request->search . '%')->get();
                    break;
                case 'kegiatan':
                    $results = Article::latest()->where('category_id', 3)->where('title', 'like', '%' . $request->search . '%')->get();
                    break;
                default:
                    $result = ''; 
            }
            $output = '';

            if (count($results) > 0) {
                $output = '
                <div class="search-list bg-light border px-2">';
                foreach ($results as $result) {
                    $output .= '
                <div class="border-bottom py-3">
                    <a href="' . route('artikel.show', $result) . '" class="text-decoration-none link-dark">' . $result->title . '</a>
                </div>';
                }
                $output .= '</div>';
            } else {
                $output .= '
                <div class="search-list bg-light px-2 border"> 
                    <div class="py-3 text-muted">Data tidak ditemukan</div> 
                </div>';
            }
        }

        return $output;
    }
}
