<?php

namespace App\Http\Controllers;

use App\Helpers\GreekSlugHelper;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate the main sitemap.
     */
    public function index(): Response
    {
        return response()->view('sitemaps.main')->header('Content-Type', 'text/xml');
    }

    /**
     * Generate sitemap for search pages (specialty + city combinations).
     */
    public function searchSitemap(): Response
    {
        $specialties = GreekSlugHelper::getSpecialties();
        $cities = GreekSlugHelper::getCities();

        $urls = [];

        // Add specialty-only pages.
        foreach ($specialties as $slug => $specialty) {
            $urls[] = [
                'loc' => route('find.specialty', ['specialty' => $slug]),
                'lastmod' => now()->toW3cString(),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ];
        }

        // Add specialty + city combination pages.
        foreach ($specialties as $specialtySlug => $specialty) {
            foreach ($cities as $citySlug => $city) {
                $urls[] = [
                    'loc' => route('find.specialty.city', ['specialty' => $specialtySlug, 'city' => $citySlug]),
                    'lastmod' => now()->toW3cString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.9',
                ];
            }
        }

        return response()->view('sitemaps.search', compact('urls'))->header('Content-Type', 'text/xml');
    }

    /**
     * Generate sitemap for professionals.
     */
    public function professionalsSitemap(): Response
    {
        $professionals = User::whereNotNull('idikotita')
            ->select('id', 'name', 'updated_at')
            ->get();

        return response()->view('sitemaps.professionals', compact('professionals'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Generate sitemap for blog posts.
     */
    public function postsSitemap(): Response
    {
        $posts = Post::select('slug', 'updated_at')->get();

        return response()->view('sitemaps.posts', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Generate sitemap for projects.
     */
    public function projectsSitemap(): Response
    {
        $projects = Project::select('id', 'updated_at')->get();

        return response()->view('sitemaps.projects', compact('projects'))
            ->header('Content-Type', 'text/xml');
    }
}
